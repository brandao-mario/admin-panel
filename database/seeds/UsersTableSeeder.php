<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
            'role_id' => 1,
            'isSuperAdmin' => true
        ]);

        factory(User::class, 4)->create();
    }
}
