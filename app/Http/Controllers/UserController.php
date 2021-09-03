<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()
        ->except(Auth::id());
        $usersGroup = User::groupBy('group')->pluck('group');
        return view('pages.user.index-user', compact('users', 'usersGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('orders.status');
        return view('pages.user.show-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if($request->hasFile('cover')){
            $img = $request->file('cover');
            $nameImg = $img->hashName();

            $img = Image::make($img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save('storage/users/'. $nameImg);
            $user->update([
                'picture' => $nameImg,
            ]);
        }

        if($request->firstname){
            $user->update([
                'firstname' => $request->firstname,
            ]);
        }
        if($request->name){
            $user->update([
                'name' => $request->name
            ]);
        }
        if($request->email){
            $user->update([
                'email' => $request->email,
            ]);
        }
        if($request->group){
            $user->update([
                'group' => $request->group
            ]);
        }



        return redirect()->route('user.show', ['user' => $user->slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'new_confirm_password' => ['required', 'min:8'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        Auth::logout();

        return view('auth.login');
    }
}
