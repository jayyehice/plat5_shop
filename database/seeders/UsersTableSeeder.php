<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [
                'name' => 'test01',
                'email' => 'test01@gmail.com',
                'password' => password_hash('test01', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'test02',
                'email' => 'test02@gmail.com',
                'password' => password_hash('test02', PASSWORD_DEFAULT)
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
