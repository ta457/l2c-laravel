<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class HTMLCodeRunner extends Model
{
    use HasFactory;

    public function index(Section $section)
    {
        $props = [
            'html' => $section->code_example
        ];
        return view('htmlLiveEditor', ['props' => $props]);
    }
}
