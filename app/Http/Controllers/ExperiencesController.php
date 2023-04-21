<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ExperiencesController extends Controller
{
    public function list()
    {
        return view('experiences.list', [
            'experiences' => Experience::all()
        ]);
    }

    public function addForm()
    {
        return view('experiences.add', [
        ]);
    }

    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'content' => 'required',
        ]);

        $experience = new Experience();
        $experience->title = $attributes['title'];
        $experience->company = $attributes['company'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];
        $experience->content = $attributes['content'];
        $experience->user_id = Auth::user()->id;
        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been added!');
    }

    
    public function delete(Experience $experience)
    {
        $experience->delete();
        
        return redirect('/console/experiences/list')
            ->with('message', 'Job Experience has been deleted!');        
    }

    public function imageForm(Experience $experience)
    {
        return view('experiences.image', [
            'experience' => $experience,
        ]);
    }
    

    public function image(Experience $experience)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        !is_null($experience->image) && Storage::delete($experience->image);
        
        $path = request()->file('image')->store('experiences');

        $experience->image = $path;
        $experience->save();
        
        return redirect('/console/experiences/list')
            ->with('message', 'Experience image has been edited!');
    }

    
    public function editForm(Experience $experience)
    {
        return view('experiences.edit', [
            'experience' => $experience,
        ]);
    }

    public function edit(Experience $experience)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'content' => 'required',
        ]);

        $experience->title = $attributes['title'];
        $experience->company = $attributes['company'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];
        $experience->content = $attributes['content'];
        $experience->user_id = Auth::user()->id;
        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been edited!');
    }
}
