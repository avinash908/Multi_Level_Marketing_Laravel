<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppProfile;
use App\Models\MoneyTransfer;
use Illuminate\Http\Request;

class TransferMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfer_money_status = AppProfile::where('id',1)->first();
        $transfered_money = MoneyTransfer::latest()->get();
        return view('admin.tranfer_money.index', compact('transfered_money','transfer_money_status'));
    }

    public function change_status(Request $request)
    {
        $transfer_money_status = AppProfile::where('id',1)->update(['internal_money_transfer'=>$request->input('status')]);
        return redirect('tansfer_money')->with('success','Internal Transfer status has been changed');
    }

}

