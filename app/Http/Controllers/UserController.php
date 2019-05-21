<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('modules.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $username = str_random(8);
        $user = new User;
        $request->request->add(['username' => $username]);
        $request->request->add(['password' => bcrypt($username)]);
        $request->request->add(['status' => 'Active']);
        $user->fill($request->all())->save();
        $user->roles()->attach($request->role);
        Session::flash('flash_message', 'The user was successfully added. Username/Password: ' . $username);
        return redirect()->route('get.user-management');
    }

    public function manageRole(Request $request)
    {
        $user = User::find($request->user);
        if (!empty($user->roles()->find($request->role))) {
            $user->roles()->detach($request->role);
            Session::flash('flash_message', 'The Role was successfully removed to user!');
            return back();
        } else {
            $user->roles()->attach($request->role);
            Session::flash('flash_message', 'The Role was successfully added to user!');
            return back();
        }
    }

    public function show(Request $request)
    {
        if (!empty($request->role)) {
            $role = Role::where('id', $request->role)->first();
            if (!empty($role)) {
                $users = $role->users()->get();
                $roles = Role::all();
                return view('modules.user.user-list', compact('users', 'roles'));
            } else {
                $users = User::all();
                $roles = Role::all();
                return view('modules.user.user-list', compact('users', 'roles'));
            }
        } else {
            $users = User::all();
            $roles = Role::all();
            return view('modules.user.user-list', compact('users', 'roles'));
        }
    }
}
