<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Education;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Type::truncate();
        Project::truncate();
        Experience::truncate();
        Skill::truncate();
        Education::truncate();

        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        $projects = Project::factory()->count(4)->create();
        Experience::factory()->count(3)->create();
        $skills = Skill::factory()->count(3)->create();
        Education::factory()->count(3)->create();

        foreach ($projects as $project) {
            $project->manySkills()->attach($skills->random(3)->pluck('id'));
        }

    }
}
