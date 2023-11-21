<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subsection;

class HTMLCodeRunner extends Model
{
    use HasFactory;

    public function index(Subsection $subsection)
    {
        $props = [
            'html' => $subsection->code_example
        ];
        return view('htmlLiveEditor', ['props' => $props]);
    }
}
