<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
    public function index()
    {   
        //filtering using the table search box
        $groups = Group::oldest();
        if(request('sort_by_time') == 'latest') {
            $groups = Group::latest();
        }

        if(request('search')) {
            $groups->where('name', 'like', '%' . request('search') . '%');
        }

        //return view
        $props = [
            'groups' => $groups->paginate(10)
        ];
        return view('admin.admin-group', ['props' => $props]);
    }

    public function store()
    {   
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        Group::create($attributes);
        return redirect('/admin-dashboard/groups')->with('success', 'New group added');
    }

    public function edit(Group $group)
    {
        $props = [
            'group' => $group
        ];
        return view('admin.edit-group', ['props' => $props]);
    }

    public function update(Group $group)
    {   
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $group->update($attributes);
        return redirect("/admin-dashboard/groups/$group->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(Group $group)
    {
        if ($group->id == 1) {
            return redirect('/admin-dashboard/groups')->with('failed', 'Can\'t delete protected record');
        } else {
            $this->reassignCourses($group);
            $group->delete();
            return redirect('/admin-dashboard/groups')->with('success', 'Group deleted');
        }
        
    }

    public function destroyAll(Request $request)
    {
        $selectedGroups = $request->input('selected', []);
        
        $groups = Group::whereIn('id', $selectedGroups)->get();
        $flag = 0;
        foreach ($groups as $group) {
            if ($group->id == 1) {
                $flag = 1; continue;
            }
            $this->reassignCourses($group);
            $group->delete();
        }
        $message = ['success', 'Selected groups have been deleted'];
        if ($flag == 1) $message = ['failed', 'Can\'t delete protected record'];
        return redirect('/admin-dashboard/groups')->with($message[0],$message[1]);
    }

    private function reassignCourses(Group $group)
    {
        foreach ($group->courses as $course) {
            $course->update([
                'group_id' => 1
            ]);
        }
    }
}
