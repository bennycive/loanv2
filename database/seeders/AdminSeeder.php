<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *
     */
    // public function run()
    // {
    //     // Check if an admin with the given email or username already exists
    //     $adminExists = Admin::where('email', 'superadmin@gmail.com')
    //         ->orWhere('username', 'superuser')
    //         ->exists();

    //     // Create a new admin user only if it doesn't already exist
    //     if (!$adminExists) {
    //         Admin::create([
    //             'name' => 'Admin User',
    //             'username' => 'superuser',
    //             'email' => 'superadmin@gmail.com',
    //             'password' => Hash::make('password123'), // Use a secure password hashing method
    //             'role' => 'superadmin',
    //         ]);
    //     } else {
    //         $this->command->info('Admin user already exists.');
    //     }
    // }



    public function run()
    {
        // Array of admin data
        $admins = [
            [
                'name' => 'Isaya Kapama',
                'username' => 'superuser1',
                'email' => 'superadmin1@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'Benjamini Athanas',
                'username' => 'superuser',
                'email' => 'superadmin2@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
                
            ],
            [
                'name' => 'Constantine Boniphace',
                'username' => 'superuser3',
                'email' => 'superadmin3@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
        ];

        // Loop through each admin data and create the admin if not exists
        foreach ($admins as $adminData){

            $adminExists = Admin::where('email', $adminData['email'])
                                ->orWhere('username', $adminData['username'])
                                ->exists();

            if (!$adminExists) {
                Admin::create($adminData);
                $this->command->info('Admin user ' . $adminData['username'] . '  created successful.');
            } else {
                
                $this->command->warn('Admin user ' . $adminData['username'] . ' Skiped already exists.');

            }
            
        }
    }
    
}

