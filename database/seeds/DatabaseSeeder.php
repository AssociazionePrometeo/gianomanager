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
        $admin = new Role(['id' => 'admin', 'name' => 'Administrators']);
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
