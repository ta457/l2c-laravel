<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'type',
        'text_content',
        'code_example',
        'link_title',
        'link',
        'img',
        'exercise_id',
        'quiz_id',
        'order'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
