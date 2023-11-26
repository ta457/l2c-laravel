<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Course;
use Illuminate\Http\Request;

class TutorialsController extends Controller
{

    public function index()
    {
        $groups = Group::with(['courses.articles'])->get();
        $props = [
            'groups' => $groups->where('id', '!=', 1)
        ];

        return view('user.tutorials', ['props' => $props]);
    }
}
