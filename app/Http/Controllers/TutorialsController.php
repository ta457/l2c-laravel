<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class TutorialsController extends Controller
{
    public function index()
    {
        $props = [
            'groups' => Group::where('id', '!=', 1)->get()
        ];
        return view('user.tutorials', ['props' => $props]);
    }
}
