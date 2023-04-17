<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Education;

class EducationsController extends Controller
{

    public function list()
    {
        return view('educations.list', [
            'educations' => Education::all()
        ]);
    }

    public function addForm()
    {
        return view('educations.add', [
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'school_name' => 'required',
            'level_of_education' => 'required',
            'field' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $education = new Education();
        $education->school_name = $attributes['school_name'];
        $education->level_of_education = $attributes['level_of_education'];
        $education->field = $attributes['field'];
        $education->location = $attributes['location'];
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];
        $education->user_id = Auth::user()->id;
        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been added!');
    }

    public function editForm(Education $education)
    {
        return view('educations.edit', [
            'education' => $education
        ]);
    }

    public function edit(Education $education)
    {
        $attributes = request()->validate([
            'school_name' => 'required',
            'level_of_education' => 'required',
            'field' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $education->school_name = $attributes['school_name'];
        $education->level_of_education = $attributes['level_of_education'];
        $education->field = $attributes['field'];
        $education->location = $attributes['location'];
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];
        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been edited!');
    }

    public function delete(Education $education)
    {
        $education->delete();
        
        return redirect('/console/educations/list')
            ->with('message', 'Education has been deleted!');        
    }  
}
