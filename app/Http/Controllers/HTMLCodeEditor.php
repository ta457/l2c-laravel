<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;

class HTMLCodeEditor extends Controller
{
    public function index()
    {
        return view('htmlLiveEditor');
    }

    public function show(Subsection $subsection)
    {
        $props = [
            'subsection' => $subsection
        ];
        return view('htmlLiveEditor', ['props' => $props]);
    }
}
