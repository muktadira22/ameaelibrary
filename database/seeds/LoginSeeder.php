<?php

use Illuminate\Database\Seeder;

use App\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Muhammad Aria Muktadir";
        $user->username = "admin";
        $user->password = bcrypt("admin");
        $user->level = "superuser";
        $user->api_token = str_random(100);
        $user->save();

    }
}
