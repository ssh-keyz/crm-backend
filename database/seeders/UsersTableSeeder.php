<?php
namespace Database\Seeders;

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
        \App\User::create([
            'name' => 'Tech',
            'email' => 'tech@tungstenroyce.com',
            'password' => bcrypt('secret'),
            'api_token' => 'str_random(60)'
        ]);
    }
}
