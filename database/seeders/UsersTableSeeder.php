<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'admin',
            'phone' => '',
            'email' => 'admin@admin.com',
            'wallet' => 0,
            'password' => Hash::make('password'),
            'referral_link' => Hash::make('admin@admin.com'),
            'referral_by' => '',
            'email_verified_at' => now()
        ]);

        $role = config('roles.models.role')::where('name', '=', 'admin')->first();  //choose the default role upon user creation.
        $user->attachRole($role);
    }
}
