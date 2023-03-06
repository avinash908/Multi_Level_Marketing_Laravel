<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.users');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $title = "Users";
        $users = User::whereHas('roles', function ($q) {
            $q->where('slug', '!=', 'admin');
        })->get();

        return view('admin.users.index', compact('users', 'title'));
    }
    public function create()
    {
        $roles = config('roles.models.role')::where('slug', '!=', 'admin')->get();

        $title = "Users Create";
        return view('admin.users.create', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|max:255',
            'user_email' => 'required|email|unique:users,email|max:255',
            'user_password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->input('user_name'),
            'email' => $request->input('user_email'),
            'is_manager' => $request->input('is_manager'),
            'image' => 'no-image.jpg',
            'password' => Hash::make($request->input('user_password')),
            'current_level' => 1,
            'current_rank' => 'normal_user',
            'phone' => '',
            'referral_link' => Hash::make($request->input('user_email')),
        ]);

        $role_slug = $request->input('role');

        if ($role_slug != 'admin') {
            $role = config('roles.models.role')::where('slug', '=', $role_slug)->first();
            $user->attachRole($role);
        }

        return redirect()->route('users.index')->with('success', 'User has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Users show";
        $user = User::findOrfail($id);
        $by  = User::where('referral_link',$user->referral_by)->first();

        $users = $this->referral_tree($user);

        return view('admin.users.show', compact('user','by','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Users edit";
        $user = User::findOrfail($id);
        $roles = config('roles.models.role')::where('slug', '!=', 'admin')->get();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required|max:255',
            'user_email' => 'required|email|unique:users,email,' . $id . '|max:255',
        ]);

        $user = User::findOrfail($id);

        $user->update([
            'name' => $request->input('user_name'),
            'email' => $request->input('user_email'),
            'is_manager' => $request->input('is_manager'),
        ]);

        // $role_slug = $request->input('role');

        // if($role_slug != 'admin'){
        //     $role = config('roles.models.role')::where('slug', '=', $role_slug)->first();
        //     $user->attachRole($role);
        // }

        return redirect()->route('users.index')->with('success', 'User has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User has been deleted');
    }

    public function referral_tree($user)
    {
        // $user = Auth::user();
        
        $level_1_users = User::where('referral_by','=',$user->referral_link)->latest()->get();

        $users = [];
        // $users = $level_1_users->toArray();

        foreach($level_1_users as $level_1_user){

            $level_1_user['level'] = 1;
            array_push($users,$level_1_user);
            
            $level_2_users = User::where('referral_by','=',$level_1_user->referral_link)->latest()->get();
            
            // $users = array_merge($users,$level_2_users->toArray());

            foreach($level_2_users as $level_2_user){

                $level_3_users = User::where('referral_by','=',$level_2_user->referral_link)->latest()->get();

                $level_2_user['level'] = 2;
                array_push($users,$level_2_user);

                // $level_2_user['level'] = 2;
                
                // $users->push($level_3_users);
                
                // $users = array_merge($users,$level_3_users->toArray());

                foreach($level_3_users as $level_3_user){

                    // $level_3_user['level'] = 3;

                    $level_4_users = User::where('referral_by','=',$level_3_user->referral_link)->latest()->get();

                    $level_3_user['level'] = 3;
                    array_push($users,$level_3_user);

                    // $users->push($level_4_users);
                    
                    foreach($level_4_users as $level_4_user){

                        // $level_4_user['level'] = 4;

                        $level_5_users = User::where('referral_by','=',$level_4_user->referral_link)->latest()->get();
                                
                        $level_4_user['level'] = 4;
                        array_push($users,$level_4_user);

                        // $users->push($level_5_users);

                        foreach($level_5_users as $level_5_user){

                            // $level_5_user['level'] = 5;

                            $level_6_users = User::where('referral_by','=',$level_5_user->referral_link)->latest()->get();
                            
                            $level_5_user['level'] = 5;
                            array_push($users,$level_5_user);

                            // $users->push($level_6_users);

                            foreach($level_6_users as $level_6_user){

                                // $level_5_user['level'] = 5;
    
                                $level_6_user['level'] = 6;
                                array_push($users,$level_6_user);
    
                                // $users->push($level_6_users);
    
                            }
                        }
                    }
                }
            }

        }

        return $users;
    }
}
