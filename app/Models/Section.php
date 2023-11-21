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
        'order'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function subsections()
    {
        return $this->hasMany(Subsection::class)->orderBy('order');
    }

}
