<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {   
        //filtering using the table search box
        //dd(request());
        $users = User::oldest();
        if(request('sort_by_time') == 'latest') {
            $users = User::latest();
        }

        if(request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
        }
        if(request('filter_role')) {
            $users->where('role', 'like', '%' . request('filter_role') . '%');
        }
        $users->where('active', 'like', '%' . request('filter_active') . '%');

        //return view
        $props = [
            'users' => $users->paginate(10)
        ];
        return view('admin.admin-user', ['props' => $props]);
    }

    public function store()
    {   
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
            'role' => 'required',
            'phone' => 'max:10',
            'github' => 'max:50'
        ]);
        
        //check if user already exist
        if(User::where('email', $attributes['email'])->exists()) {
            return redirect('/admin-dashboard/users')->with('failed', 'User already exists');
        } else {
            $attributes['role'] = $attributes['role'] * 1;
            User::create($attributes);
        }
        
        return redirect('/admin-dashboard/users')->with('success', 'New user added');
    }

    public function edit(User $user)
    {
        $props = [
            'user' => $user
        ];
        return view('admin.edit-user', ['props' => $props]);
    }

    public function update(User $user)
    {   
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
            'role' => 'required',
            'phone' => 'max:10',
            'github' => 'max:50',
            'active' => 'max:1'
        ]);
        $attributes['role'] = $attributes['role'] * 1;
        $attributes['active'] = $attributes['active'] * 1;
        //check if there is another user with this email but different id
        if(User::where('email', $attributes['email'])->where('id', '!=', $user->id)->exists()) {
            return redirect("/admin-dashboard/users/$user->id")->with('failed', 'User already exists');
        } else {
            $user->update($attributes);
        }
        
        return redirect("/admin-dashboard/users/$user->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 1) {
            //DB::delete('delete from class_members where user_id=?', [$user->id]);
            $user->delete();
            return redirect('/admin-dashboard/users')->with('success', 'User deleted');
        } else {
            return redirect('/admin-dashboard/users')->with('failed', 'Can\'t delete protected record');
        }
        
    }

    public function destroyAll(Request $request)
    {
        $selectedUsers = $request->input('selected', []);
        
        $users = User::whereIn('id', $selectedUsers)->get();

        $flag = 0;
        foreach ($users as $user) {
            if ($user->id == 1) {
                $flag = 1; continue;
            }
            $user->delete();
        }
        $message = ['success', 'Selected users have been deleted'];
        if ($flag == 1) $message = ['failed', 'Can\'t delete protected record'];
        return redirect('/admin-dashboard/users')->with($message[0],$message[1]);
    }
}
