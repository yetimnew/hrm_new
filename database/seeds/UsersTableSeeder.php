<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;


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
            'name' => 'Yetimesht Tadesse',
            'email' => 'yetimnew@gmail.com',
            'password' => bcrypt('password'),
            'active' => 1,
            'admin' => 1,
        ]);

        // how is how

        Profile::create([
            'user_id' => $user->id,
            'image' => 'uploads/avatar.jpg',
            'about' => 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff',
        ]);
    }
}
