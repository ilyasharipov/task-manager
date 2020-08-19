<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordController extends Controller
{
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('user.change_password', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
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
