<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Exercise;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{
    public function index(Article $article)
    {   
        $sections = $article->sections;
        $exercises = Exercise::all();
        $quizzes = Quiz::all();

        $props = [
            'sections' => $sections,
            'article' => $article,
            'exercises' => $exercises,
            'quizzes' => $quizzes
        ];
        return view('admin.admin-sections', ['props' => $props]);
    }

    public function edit(Section $section)
    {
        $exercises = Exercise::all();
        $quizzes = Quiz::all();
        $props = [
            'section' => $section,
            'exercises' => $exercises,
            'quizzes' => $quizzes
        ];
        return view('admin.edit-section', ['props' => $props]);
    }

    public function update(Section $section)
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'img' => 'nullable|max:255',
            'exercise_id' => 'nullable|numeric|min:1',
            'quiz_id' => 'nullable|numeric|min:1',
            'link' => 'nullable|max:255',
            'link_title' => 'nullable|max:255',
            'text_content' => 'nullable',
            'code_example' => 'nullable'
        ]);
        if($attributes['img'] == null) {
            $attributes['img'] = $section->img;
        }
        $section->update($attributes);
        return redirect("/admin-dashboard/sections/$section->id/edit")->with('success', 'Your changes have been saved');
    }
}
