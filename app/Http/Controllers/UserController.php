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
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['name'])
            ->toSql();
        dd($users);
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
        $typeEdit = $request['type'];

        switch ($typeEdit) {
            case 'edit_profile':
                return view('user.edit_profile', compact('user'));
            break;
            case 'change_password':
                return view('user.change_password', compact('user'));
            break;
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
        $typeUpdate = $request['type'];
        switch ($typeUpdate) {
            case 'update_profile':
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

                flash('Update sucessful!')->success();

                return redirect()
                    ->route('users.index');
                break;
            case 'change_password':
                $this->validate($request, [
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                $user->password = Hash::make($request['password']);
                $user->save();

                flash('Change password sucessful!')->success();
                return redirect()
                ->route('users.index');
                break;
        }
    }

    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
        }

        flash('Delete sucessful!')->success();
        return redirect()->route('home');
    }
}
