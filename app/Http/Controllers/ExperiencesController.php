<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperiencesController extends Controller
{
    public function list()
    {
        return view('experiences.list', [
            'experiences' => Experience::all()
        ]);
    }
}
