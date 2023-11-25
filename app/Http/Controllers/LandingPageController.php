<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsection;

class LandingPageController extends Controller
{
    public function index()
    {
        $codeSubsection = Subsection::find(8);
        $props = [
            'subsection' => $codeSubsection
        ];
        return view('welcome', ['props' => $props]);
    }
}
