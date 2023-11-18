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
        $users = User::oldest();
        if(request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
        }
        if(request('role')) {
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
        $attributes['role'] = $attributes['role'] * 1;
        User::create($attributes);
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
            'phone' => 'max:50',
            'github' => 'max:50',
            'active' => 'max:1'
        ]);
        $attributes['role'] = $attributes['role'] * 1;
        $attributes['active'] = $attributes['active'] * 1;
        $user->update($attributes);
        return redirect("/admin-dashboard/users/$user->id")->with('success', 'Your changes have been saved');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 1) {
            //DB::delete('delete from class_members where user_id=?', [$user->id]);
            $user->delete();
            return redirect('/admin-dashboard/users')->with('success', 'User deleted');
        } else {
            return redirect('/admin-dashboard/users')->with('failed', 'Failed to delete user');
        }
        
    }

    public function destroyAll(Request $request)
    {
        $selectedUsers = $request->input('selected', []);
        
        User::whereNotIn('id', [1])->whereIn('id', $selectedUsers)->delete();

        return redirect('/admin-dashboard/users')->with('success', 'Selected users have been deleted');
    }
}
