<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
           // dashboard
            [
            'name'        => 'Can View Dashboard',
            'slug'        => 'view.dashboard',
            'description' => 'Can view dashboard',
            'model'       => 'Permission',
            ],

            // users permissions
            [
                'name'        => 'Can Manage Users',
                'slug'        => 'manage.users',
                'description' => 'Can Manage users',
                'model'       => 'Permission',
            ],

             // packages permissions
             [
                'name'        => 'Can Manage packages',
                'slug'        => 'manage.packages',
                'description' => 'Can Manage packages',
                'model'       => 'Permission',
            ],

            // user registration request permissions
            [
                'name'        => 'Can Manage user registration request',
                'slug'        => 'manage.subscribe.requests',
                'description' => 'Can Manage User Registration Request',
                'model'       => 'Permission',
            ],

            // deposits permissions
            [
                'name'        => 'Can Manage Deposits',
                'slug'        => 'manage.deposits',
                'description' => 'Can Manage Deposits',
                'model'       => 'Permission',
            ],

             // withdraws permissions
             [
                'name'        => 'Can Manage Withdraws',
                'slug'        => 'manage.withdraws',
                'description' => 'Can Manage withdraws',
                'model'       => 'Permission',
            ],

             // transactions permissions
             [
                'name'        => 'Can Manage Transactions',
                'slug'        => 'manage.transactions',
                'description' => 'Can Manage transactions',
                'model'       => 'Permission',
            ],
            
             // payment_accounts permissions
             [
                'name'        => 'Can Manage Payment Accounts',
                'slug'        => 'manage.paymentaccounts',
                'description' => 'Can Manage Payment_accounts',
                'model'       => 'Permission',
            ],

             // referrals permissions
             [
                'name'        => 'Can Manage Referrals',
                'slug'        => 'manage.referrals',
                'description' => 'Can Manage referrals',
                'model'       => 'Permission',
            ],

             // announcements permissions
             [
                'name'        => 'Can Manage Annoucements',
                'slug'        => 'manage.annoucements',
                'description' => 'Can Manage annoucements',
                'model'       => 'Permission',
            ],

             // testimonials permissions
             [
                'name'        => 'Can Manage Testimonials',
                'slug'        => 'manage.testimonials',
                'description' => 'Can Manage testimonials',
                'model'       => 'Permission',
            ],

            // news permissions
            [
                'name'        => 'Can Manage News',
                'slug'        => 'manage.news',
                'description' => 'Can Manage news',
                'model'       => 'Permission',
            ],

            // Faqs permissions
            [
                'name'        => 'Can Manage Faqs',
                'slug'        => 'manage.faqs',
                'description' => 'Can Manage Faqs',
                'model'       => 'Permission',
            ],

            // Contact permissions
            [
                'name'        => 'Can Manage Contact Messages',
                'slug'        => 'manage.contactmessages',
                'description' => 'Can Manage Contact Messages',
                'model'       => 'Permission',
            ],
             // Subscriptions permissions
             [
                'name'        => 'Can Manage Subscriptions',
                'slug'        => 'manage.subscriptions',
                'description' => 'Can Manage subscriptions',
                'model'       => 'Permission',
            ],

            // Site Info permissions
            [
                'name'        => 'Can Manage Site Info',
                'slug'        => 'manage.siteinfo',
                'description' => 'Can Manage Site Info',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
