<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppProfile;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Services\UploadImage;

class AppProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.siteinfo');
    }

    public function profile_setting()
    {
        $profile  = AppProfile::where('id', 1)->first();
        return view('admin.app_profile', compact('profile'));
    }
    public function profile_update(Request $request)
    {
        $profile = AppProfile::where('id', 1)->first();

        $profile->update($request->all());

        return redirect()->back()->with('success', 'Profile has been updated');
    }
    
    public function states_edit()
    {
        $state = AppProfile::where('id', 1)->first();
        return view ('admin.states.edit',compact('state'));
    }

    public function states_update(Request $request)
    {
        $state = AppProfile::where('id', 1)->first();

        $state->update($request->all());

        return redirect()->back()->with('success', 'States has been updated');
    }
}
