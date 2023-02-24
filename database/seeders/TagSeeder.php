<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "JS",
            "slug" => "js"
        ]);
        Tag::create([
            "name" => "React",
            "slug" => "react"
        ]);
        Tag::create([
            "name" => "SQL",
            "slug" => "sql"
        ]);
        Tag::create([
            "name" => "JQuery",
            "slug" => "jquery"
        ]);
        Tag::create([
            "name" => "MongoDB",
            "slug" => "mongodb"
        ]);
    }
}
