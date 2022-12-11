<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('backend.setting.admin.admin_profile_view', compact('users'));
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
    public function adminProfileEdit(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $users = User::find($id);

        if ($users->email == $request->email) {
            if ($request->hasfile('profile_photo_path')) {
                $profile_photo_path = $request->profile_photo_path;
                $profile_photo_path_new_name = time().$profile_photo_path->getClientOriginalName();
                $profile_photo_path->move('upload/users', $profile_photo_path_new_name);
                $file = $users->profile_photo_path;
                if ($file) {
                    unlink($users->profile_photo_path);
                }
                $users->profile_photo_path = 'upload/users/'.$profile_photo_path_new_name;
            }
            $users->name = $request->name;

            $users->mobaile   =  $request->mobaile;

            $users->save();
        } else {
            $this->validate($request, [
                'name'               => 'required',

                'mobaile'               => 'required',

                'email'              => 'required|unique:users'
             ]);
        }
        $users->email   =  $request->email;
        $users->save();



        Session::flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChangePassword()
    {
        return view('backend.setting.admin.password_change');
    }
    public function UserPasswordUpdate(Request $request){


        $hashedPassword = User::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
         $admin = User::find(1);
         $admin->password = Hash::make($request->password);
         $admin->save();
         Auth::logout();


         return redirect()->route('logout');
         }else{
            Session::flash('warning', 'Password Does Not Match');
            return redirect()->back();
        }

     }
}
