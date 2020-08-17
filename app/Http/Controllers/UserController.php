<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        if (\Auth::user()->id === $user->id) {
            return view('user.edit_profile', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,' . $user->id],
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->fill($request->all());
        $user->save();

        flash(__('users.updated'))->success();

        return redirect()
            ->route('users.index');
    }

    public function changePasswordEdit(User $user)
    {
        if (\Auth::user()->id === $user->id) {
            return view('user.change_password', compact('user'));
        }
    }

    public function changePassword(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request['password']);
        $user->save();

        flash(__('users.pass_changed'))->success();
        return redirect()
            ->route('users.index');
    }

    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
        }

        flash(__('users.deleted'))->success();
        return redirect()->route('home');
    }
}
