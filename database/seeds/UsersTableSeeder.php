<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Creating seed
     * php artisan make:seeder UsersTableSeeder
     *
     * Run the database seeds.
     * php artisan migrate:refresh --seed
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'username',
            'email' => 'user@laravel.api',
            'api_token' => str_random(64),
            'password' => bcrypt('password'),
        ]);
    }
}
