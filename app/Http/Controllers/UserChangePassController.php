<?php

namespace App\Http\Controllers;

use App\User;
use App\UserChangePass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserChangePassController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @param  \App\UserChangePass  $userChangePass
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserChangePass $userChangePass)
    {
        if (\Auth::user()->id === $user->id) {
            return view('user.edit_profile', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @param  \App\UserChangePass  $userChangePass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserChangePass $userChangePass)
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
}
