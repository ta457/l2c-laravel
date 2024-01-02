<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminQuizController extends Controller
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
        $quizzes = Quiz::with('course');
        if(request('sort_by_time') == 'latest') {
            $quizzes = Quiz::latest();
        }

        if(request('search')) {
            $quizzes->where('text_content', 'like', '%' . request('search') . '%');
        }
        if(request('course_id') && request('course_id') !== 0) {
            $quizzes->where('course_id', 'like', '%' . request('course_id') . '%');
        }

        //return view
        $props = [
            'quizzes' => $quizzes->paginate(10),
            'courses' => Course::all()
        ];
        return view('admin.admin-quiz', ['props' => $props]);
    }

    public function store()
    {   
        //dd(request());
        $attributes = request()->validate([
            'course_id' => 'required',
            'text_content' => 'required|max:255',
            'choice_1' => 'required|max:255',
            'choice_2' => 'required|max:255',
            'choice_3' => 'required|max:255',
            'answer' => 'required'
        ]);
        
        //check if quiz already exists
        if(Quiz::where('text_content', $attributes['text_content'])->exists()) {
            return redirect($this->getDashboardUrl() . '/quizzes')->with('failed', 'Quiz already exists');
        } else {
            $attributes['course_id'] = $attributes['course_id'] * 1;
            Quiz::create($attributes);
        }
        
        return redirect($this->getDashboardUrl() . '/quizzes')->with('success', 'New quiz added');
    }

    public function edit(Quiz $quiz)
    {
        $props = [
            'quiz' => $quiz,
            'courses' => Course::all()
        ];
        return view('admin.edit-quiz', ['props' => $props]);
    }

    public function update(Quiz $quiz)
    {   
        $attributes = request()->validate([
            'course_id' => 'required',
            'text_content' => 'required|max:255',
            'choice_1' => 'required|max:255',
            'choice_2' => 'required|max:255',
            'choice_3' => 'required|max:255',
            'answer' => 'required'
        ]);
        //check if there is another quiz with this text content but different id
        if(Quiz::where('text_content', $attributes['text_content'])->where('id', '!=', $quiz->id)->get()->count() > 0) {
            return redirect($this->getDashboardUrl() . "/quizzes/$quiz->id")->with('failed', 'Quiz already exists');
        } else {
            $attributes['course_id'] = $attributes['course_id'] * 1;
            $quiz->update($attributes);
        }
        
        return redirect($this->getDashboardUrl() . "/quizzes/$quiz->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect($this->getDashboardUrl() . '/quizzes')->with('success', 'Quiz deleted');
    }

    public function destroyAll(Request $request)
    {
        $selectedQuizzes = $request->input('selected', []);
        
        Quiz::whereIn('id', $selectedQuizzes)->delete();

        return redirect($this->getDashboardUrl() . '/quizzes')->with('success', 'Selected quizzes have been deleted');
    }
}
