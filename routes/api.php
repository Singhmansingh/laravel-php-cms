<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Type;
use App\Models\User;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Education;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/types', function(){

    $types = Type::orderBy('title')->get();
    return $types;

});

Route::get('/projects/{user_id?}', function($user_id = null){

    $projects = Project::orderBy('created_at')->with('manySkills')->get();

    if ($user_id) {
        $projects = $projects->where('user_id', $user_id); // Filter by user ID if provided
    }

    foreach($projects as $key => $project)
    {
        $projects[$key]['user'] = User::where('id', $project['user_id'])->first();
        $projects[$key]['type'] = Type::where('id', $project['type_id'])->first();

        if($project['image'])
        {
            $projects[$key]['image'] = env('APP_URL').'storage/'.$project['image'];
        }
    }

    return $projects;

});

// Get skills related to a users if user_id is provided
Route::get('/skills/{user_id?}',function($user_id = null){
    $skills = Skill::orderBy('title')->get();

    foreach($skills as $key => $skill)
    {

        if($skill['image'])
        {
            $skills[$key]['image'] = env('APP_URL').'storage/'.$skill['image'];
        }
    }

    if ($user_id) {
        $userSkills = collect();
        $userSkillIds = collect();
        $projects = Project::orderBy('created_at')->with('manySkills')->get()->where('user_id', $user_id);
        foreach($projects as $project)
        {
            if ($project->manySkills)
            {
                foreach($project->manySkills as $skill)
                {

                    if (!$userSkillIds->contains($skill->id))
                    {
                        $userSkillIds->push($skill->id);
                        $userSkills->push($skill);
                    }
                }
            }
        }

        $skills = $userSkills;
    }

    return $skills;
});


Route::get('/experiences/{user_id?}',function($user_id = null){

    $experience = Experience::orderByDesc('start_date')->get();

    if ($user_id) {
        $experience = $experience->where('user_id', $user_id); // Filter by user ID if provided
    }

    return $experience;
});



Route::get('/projects/profile/{project?}', function(Project $project){

    $project['user'] = User::where('id', $project['user_id'])->first();
    $project['type'] = Type::where('id', $project['type_id'])->first();

    if($project['image'])
    {
        $project['image'] = env('APP_URL').'storage/'.$project['image'];
    }

    return $project;

});

Route::get('/educations/{user_id?}', function($user_id = null){

    $education = Education::orderBy('start_date')->get();

    if ($user_id) {
        $education = $education->where('user_id', $user_id); // Filter by user ID if provided
    }

    return $education;

});

