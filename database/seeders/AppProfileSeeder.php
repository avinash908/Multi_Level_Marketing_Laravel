<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_profiles')->delete();

        DB::table('app_profiles')->insert([
            'id'=> 1,
            'logo'=> 'logo.png',
            'email'=> strtolower('support@'.str_replace(' ','',config('app.name').'.com')),
            'mobile' => '(234) 56789',
            'world_country' => 12050,
            'total_deposit' => 5500,
            'all_members' => 100,
            'telephone' => '+92 (234) 56789',
            'address' => '70 Clifton Ave, 5th Floor , CA ',
            'facebook' => 'https://www.facebook.com/jhondoe',
            'intro' => 'Lorem Ipsum is simply dummy text of the and typesetting industry Lorem Ipsum is dummy text of the printing',
            'instagram' => 'https://instagram.com/jhondoe',
            'whatsapp' => '+92303242134',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
