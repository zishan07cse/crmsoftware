<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        //


    }

    public function userlist()
    {
        $userlist = User::select('id', 'name', 'email', 'type')->get();
        return view('admin.alluserlist', compact('userlist'));

    }
    /**git
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.createuser');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'type' => 'required',
            'section' => 'required'
        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => $request['type']
        ]);
        return redirect('/admin/user/userlist')->with('success', 'User has been added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // echo "in user  show function";
        dd();
        //
        // $manageruserlist = User::select('id', 'name', 'email', 'type')->where('type', '2')->get();
        // return view('managerusers.show', compact('manageruserlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $userinfo = User::find($id);
        return view('admin.updateuser', compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|',
            'password' => 'required|min:6|confirmed',

        ]);

        $user = User::find($request->userid);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->type = $request->type;
        $user->save();
        return redirect('/admin/user/userlist')->with('success', 'User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userlist = User::select('id', 'name', 'email', 'type')->get();
        $response = User::destroy($id);
        return redirect('/admin/user/userlist')->with('success', 'User has been deleted successfully');
    }
}