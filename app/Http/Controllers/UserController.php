<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return the view to the form register
     *
     * @return void
     */
    public function index()
    {
        return view('auth.register');
    }


    /**
     * Display the specified ressource
     *
     * @return void
     */
    public function show()
    {
        $users = User::all();
        return view('user.list', ['users' => $users]);
    }

    /**
     * Edit the specified ressource
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user_list');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('user_list');
    }
}
