<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminExerciseController extends Controller
{
    public function getDashboardUrl() {
        $dashboardUrl = '';
        if(Auth::user()->role == 1) {
            $dashboardUrl = '/admin-dashboard';
        } else if(Auth::user()->role == 2) {
            $dashboardUrl = '/editor-dashboard';
        }
        return $dashboardUrl;
    }

    public function index()
    {   
        //filtering using the table search box
        $exercises = Exercise::with('course');
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'text_content' => 'required|max:255',
            'answer' => 'required|max:255'
        ]);
        $attributes['course_id'] = $attributes['course_id'] * 1;
        if (!(Exercise::where('title', $attributes['title'])->get()->count() > 0)) {
            Exercise::create($attributes);
            return redirect($this->getDashboardUrl() . '/exercises')->with('success', 'New exercise added');
        } else {
            return redirect($this->getDashboardUrl() . '/exercises')->with('failed', 'Exercise title added');
        } 
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'text_content' => 'required|max:255',
            'answer' => 'required|max:255'
        ]);
        //check if there is another exercise with this name but different id
        if(Exercise::where('title', $attributes['title'])->where('id', '!=', $exercise->id)->get()->count() > 0) {
            return redirect($this->getDashboardUrl() . "/exercises/$exercise->id")->with('failed', 'Exercise title already exist');
        } else {
            $attributes['course_id'] = $attributes['course_id'] * 1;
            $exercise->update($attributes);
        }
        
        return redirect($this->getDashboardUrl() . "/exercises/$exercise->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect($this->getDashboardUrl() . '/exercises')->with('success', 'Exercise deleted');
    }

    public function destroyAll(Request $request)
    {
        $selectedExercises = $request->input('selected', []);
        
        Exercise::whereIn('id', $selectedExercises)->delete();

        return redirect($this->getDashboardUrl() . '/exercises')->with('success', 'Selected exercises have been deleted');
    }
}
