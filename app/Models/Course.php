<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'name',
        'description',
        'slug'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getGroupNameAttribute()
    {
        return $this->group->name;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
