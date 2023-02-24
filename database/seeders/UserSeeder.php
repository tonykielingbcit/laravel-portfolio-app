<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Tony Kieling",
            "email" => "tk@tk.ca",
            "password" => "P@ssw0rd1" 
        ]);
        User::create([
            "name" => "TK",
            "email" => "tony.kieling@gmail.com",
            "password" => "P@ssw0rd1" 
        ]);
        User::create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
            "password" => "P@ssw0rd1" 
        ]);
        User::create([
            "name" => "Bob",
            "email" => "bob@email.ca",
            "password" => "P@ssw0rd1" 
        ]);
    }
}
