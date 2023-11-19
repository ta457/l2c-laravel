<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Http\Request;

class AdminExerciseController extends Controller
{
    public function index()
    {   
        //filtering using the table search box
        $exercises = Exercise::oldest();
        if(request('sort_by_time') == 'latest') {
            $exercises = Exercise::latest();
        }

        if(request('search')) {
            $exercises
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if(request('course_id') && request('course_id') !== 0) {
            $exercises->where('course_id', 'like', '%' . request('course_id') . '%');
        }

        //return view
        $props = [
            'exercises' => $exercises->paginate(10),
            'courses' => Course::all()
        ];
        return view('admin.admin-exercise', ['props' => $props]);
    }

    public function store()
    {   
        //dd(request());
        $attributes = request()->validate([
            'course_id' => 'required',
            'title' => 'required|min:1|max:255',
            'description' => 'required|max:255',
            'text_content' => 'required',
            'answer' => 'required'
        ]);
        $attributes['course_id'] = $attributes['course_id'] * 1;
        Exercise::create($attributes);
        return redirect('/admin-dashboard/exercises')->with('success', 'New exercise added');
    }

    public function edit(Exercise $exercise)
    {
        $props = [
            'exercise' => $exercise,
            'courses' => Course::all()
        ];
        return view('admin.edit-exercise', ['props' => $props]);
    }

    public function update(Exercise $exercise)
    {   
        $attributes = request()->validate([
            'course_id' => 'required',
            'title' => 'required|min:1|max:255',
            'description' => 'required|max:255',
            'text_content' => 'required',
            'answer' => 'required'
        ]);
        $attributes['course_id'] = $attributes['course_id'] * 1;
        $exercise->update($attributes);
        return redirect("/admin-dashboard/exercises/$exercise->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect('/admin-dashboard/exercises')->with('success', 'Exercise deleted');
    }

    public function destroyAll(Request $request)
    {
        $selectedExercises = $request->input('selected', []);
        
        Exercise::whereIn('id', $selectedExercises)->delete();

        return redirect('/admin-dashboard/exercises')->with('success', 'Selected exercises have been deleted');
    }
}
