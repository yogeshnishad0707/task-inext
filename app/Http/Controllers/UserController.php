<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;die;
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[^a-zA-Z0-9]/',
            ],
        ]);
        $count = User::where('email', $request->email)->count();
        if ($count > 0) {
            return redirect()->back()->with('error', 'Warning! The value you entered is already in the list email id.');
        }
        $count = User::where('phone', $request->phone)->count();
        if ($count > 0) {
            return redirect()->back()->with('error', 'Warning! The value you entered is already in the list phone number.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photoimg = time() . rand(1000, 9999) . '.' . $file->extension();
            $file->move(public_path('photoimage/'), $photoimg);

            $pimage = array_merge($request->except('_token', '_method', 'photo'), ['photo' => $photoimg]);
        }
        try {
            User::create($pimage);
            return redirect()->back()->with('success', 'register successfully!!');
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->back()->with('error', 'register failed!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::orderBy('id', 'asc')->get();
        $edit = User::where('id', $user->id)->first();
        // return $edit;
        return view('home', compact('users', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|digits:10|unique:users,phone,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/', // at least one lowercase letter
                'regex:/[A-Z]/', // at least one uppercase letter
                'regex:/[^a-zA-Z0-9]/', // at least one special character
            ],
        ]);

        // Handle photo update
        $userimg = $user->photo;
        if ($request->hasFile('photo')) {
            if ($userimg && file_exists(public_path('photoimage/' . $userimg))) {
                unlink(public_path('photoimage/' . $userimg));
            }
            $file = $request->file('photo');
            $user_img = time() . rand(1000, 9999) . '.' . $file->extension();
            $file->move(public_path('photoimage/'), $user_img);
        } else {
            $user_img = $userimg;
        }

        try {
            $updateData = $request->except('_token', '_method', 'photo', 'password');
            $updateData['photo'] = $user_img;
            $updateData['password'] = Hash::make($request->password);

            $user->update($updateData);

            return redirect()->route('user.index')->with('update', 'User Updated Successfully!!');
        } catch (\Exception $ex) {
            return redirect()->route('user.index')->with('error', 'User Not Updated!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $userimg =  User::where('id',$user->id)->pluck('photo')->first();
        if(file_exists(public_path('photoimage/'.$userimg))){
            unlink(public_path('photoimage/'.$userimg));
        }
        try {
            User::where('id',$user->id)->delete();
            return redirect()->route('user.index')->with('delete', 'User Deleted Successfully!!');
        } catch (\Exception $ex) {
            //return $ex;
            return redirect()->route('user.index')->with('error', 'User Not Deleted!!');
        }
    }


}
