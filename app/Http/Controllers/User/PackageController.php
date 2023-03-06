<?php

namespace App\Http\Controllers\User;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Controllers\Controller;
use App\Models\PaymentAccount;
use App\Models\User;
use App\Models\UserPackage;
use App\Notifications\UserSubscribeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{

    public function __construct()
    {
        // $this->middleware('check_user_is_registered');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('status', '=', 1)->latest()->get();
        $payment_accounts = PaymentAccount::where('status', '=', 1)->latest()->get();
        return view('user.packages.index', compact('packages','payment_accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id'=> 'required|int',
            'proof'=> 'required|image'
        ]);

        $package = Package::findOrFail($request->input('package_id'));

        $already_package = UserPackage::where('user_id','=',auth()->user()->id)->where('package_id', '=', $package->id)->first();
        
        if (!empty($already_package)) {
            return redirect()->back()->with('success', 'Already Purchased This Plan');
        }

        $image = '';

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $image = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/proofs/'), $image);
        }

        UserPackage::create([
            'user_id' => auth()->user()->id,
            'package_id' => $package->id,
            'amount' => $package->price,
            'proof' => $image,
            'status' => 'processing',
        ]);
        
        $data = ['name'  => auth()->user()->name];

        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $admin->notify(new UserSubscribeNotification($data));

        return redirect()->route('user_packages.index')->with('success', __('Purchase request has been submited to admin please wait for approval'));
    }

    public function show($id)
    {
        $Package = Package::findOrFail($id);
        return view('user.Packages.show', compact('Package'));
    }

    public function user_Packages()
    {
        $Packages = UserPackage::where('user_id', '=', auth()->user()->id)->latest()->get();
        return view('packages.user_packages', compact('Packages'));
    }

    public function done(Request $request, $id)
    {
        $request->validate(['proof'=>'required']);

        $user_sruvey = UserPackage::where('user_id', '=', auth()->user()->id)->where('id', '=', $id)->firstOrFail();

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $proof = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/Package_proof/'), $proof);
        } else {
            $proof =  '';
        }

        $user_sruvey->update([
            'status' => 'done',
            'proof' => $proof
        ]);

        return redirect('user_packages')->with('success', __('Package has been done! Please wait it is under admin review'));
    }
}
