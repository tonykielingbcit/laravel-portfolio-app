<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Explicitly attach tags to projects
        $portfolioProject = Project::find(1);
        $portfolioProject->tags()->attach([1,2,3]);

        // Explicitly attach tags to projects
        $portfolioProject = Project::find(2);
        $portfolioProject->tags()->attach([1, 5]);

        // Explicitly attach tags to projects
        $portfolioProject = Project::find(3);
        $portfolioProject->tags()->attach([3,4,5]);

        // Explicitly attach tags to projects
        $portfolioProject = Project::find(4);
        $portfolioProject->tags()->attach([2,4]);

        // Explicitly attach tags to projects
        $portfolioProject = Project::find(5);
        $portfolioProject->tags()->attach([1,5]);
    }
}
