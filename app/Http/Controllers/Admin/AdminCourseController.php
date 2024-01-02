<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCourseController extends Controller
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
        $courses = Course::with('group');
        if(request('sort_by_time') == 'latest') {
            $courses = Course::latest();
        }

        if(request('search')) {
            $courses
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if(request('group_id') && request('group_id') !== 0) {
            $courses->where('group_id', 'like', '%' . request('group_id') . '%');
        }

        //return view
        $props = [
            'courses' => $courses->paginate(10),
            'groups' => Group::all()
        ];
        return view('admin.admin-course', ['props' => $props]);
    }

    public function store()
    {   
        $attributes = request()->validate([
            'group_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required'
        ]);
        $attributes['group_id'] = $attributes['group_id'] * 1;
        if(!(Course::where('name', $attributes['name'])->get()->count() > 0)) {
            Course::create($attributes);
            return redirect($this->getDashboardUrl() . '/courses')->with('success', 'New course added');
        } else {
            return redirect($this->getDashboardUrl() . '/courses')->with('failed', 'Course name existed');
        }
        
    }

    public function edit(Course $course)
    {
        $props = [
            'course' => $course,
            'groups' => Group::all()
        ];
        return view('admin.edit-course', ['props' => $props]);
    }

    public function update(Course $course)
    {   
        $attributes = request()->validate([
            'group_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required'
        ]);
        $course->update($attributes);
        return redirect($this->getDashboardUrl() . "/courses/$course->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Course $course)
    {
        if ($course->id == 1) {
            return redirect($this->getDashboardUrl() . '/courses')->with('failed', 'Can\'t delete protected record');
        } else {
            $this->reassignRelatedRecords($course);
            $course->delete();
            return redirect($this->getDashboardUrl() . '/courses')->with('success', 'Course deleted');
        }
    }

    public function destroyAll(Request $request)
    {
        $selectedCourses = $request->input('selected', []);
        
        //Course::whereIn('id', $selectedCourses)->delete();

        //return redirect($this->getDashboardUrl() . '/courses')->with('success', 'Selected courses have been deleted');

        $courses = Course::whereIn('id', $selectedCourses)->get();
        $flag = 0;
        foreach ($courses as $course) {
            if ($course->id == 1) {
                $flag = 1; continue;
            }
            $this->reassignRelatedRecords($course);
            $course->delete();
        }
        $message = ['success', 'Selected courses have been deleted'];
        if ($flag == 1) $message = ['failed', 'Can\'t delete protected record'];
        return redirect($this->getDashboardUrl() . '/courses')->with($message[0],$message[1]);
    }

    private function reassignRelatedRecords(Course $course)
    {
        foreach ($course->exercises as $exercise) {
            $exercise->update([
                'course_id' => 1
            ]);
        }
        foreach ($course->quizzes as $quiz) {
            $quiz->update([
                'course_id' => 1
            ]);
        }
        foreach ($course->articles as $article) {
            $article->update([
                'course_id' => 1
            ]);
        }
    }
}
