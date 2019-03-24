<?php

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
        $user = App\User::create(array(
            'name' => 'admin',
            'email' => 'admin@admin.hr',
            'password' => bcrypt('123'),
            'admin' => 1
        ));

        App\Profile::create(array(
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar.jpg',
            'about' => 'I am admin',
            'facebook' => 'https://www.facebook.com/',
            'youtube' => 'https://www.youtube.com/?hl=hr&gl=HR'
        ));
    }
}
