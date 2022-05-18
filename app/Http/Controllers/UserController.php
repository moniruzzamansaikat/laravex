<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $users = [];
        if (auth()->user()->username == 'saikat') {
            $users = User::all();
        }

        return view('front.user.profile', ['users' => $users]);
    }

    public function profileOther($id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->route('user.profile');
        }

        $user = User::find($id);

        return view('front.user.profile-other', ['user' => $user]);
    }

    public function setting()
    {
        $user = auth()->user();
        return view('front.user.setting', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('avatars'), $fileName);
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'semester' => 'required',
            'department' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        ]);

        $user = auth()->user();

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'semester' => $request->semester,
            'department' => $request->department,
        ]);

        if ($fileName) {
            User::where('id', $user->id)->update([
                'avatar' => $fileName,
            ]);
        }

        return redirect()->route('user.profile.setting');
    }

    public function removeUser(User $user)
    {
        $user->delete();
        return back();
    }
}
