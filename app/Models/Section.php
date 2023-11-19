<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'title',
        'text_content',
        'code_example',
        'link_title',
        'link',
        'img',
        'exercise_id',
        'quiz_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
