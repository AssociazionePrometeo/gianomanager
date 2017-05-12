<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default roles
        $admin = new Role(['id' => 'admin', 'name' => 'Administrators', 'permissions' => '{"card-view":true,"card-create":true,"card-update":true,"card-delete":true,"resource-view":true,"resource-create":true,"resource-update":true,"resource-delete":true,"reservation-view":true,"reservation-create":true,"reservation-update":true,"reservation-delete":true,"user-view":true,"user-create":true,"user-update":true,"user-delete":true,"role-view":true,"role-create":true,"role-update":true,"role-delete":true}']);
        $admin->protected = true;
        $admin->permissions = ['admin' => true];
        $admin->save();

        $default = new Role(['id' => 'default', 'name' => 'Default']);
        $default->protected = true;
        $default->permissions = ['admin' => false];
        $default->save();

        $user = User::create([
            'name' => 'Administrator',
            'password' => bcrypt('giano'),
            'email' => 'admin@example.com',
            'active' => true,
            'email_verified' => true,
        ]);

        $user->roles()->attach($admin);
    }
}
