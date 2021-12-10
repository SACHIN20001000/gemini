<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Profile\updateUserProfile;
class AdminController extends Controller
{
    
    public function viewProfile(){
        return view('admin.Profile.viewProfile');
    }
    public function updateProfile(){
          return view('admin.Profile.editprofile');
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserProfile(UpdateUserProfile $request , $id ){


    $user = User::find($id);

    $inputs = $request->all();
    if($request->password == $user->password){
        $inputs['password'] =  $request->password;
    }else{
        $inputs['password'] =  bcrypt($request->password);
    }
    if($request->hasFile('profile')){
        $path = \Storage::disk('s3')->put('images', $request->profile);
        $path = \Storage::disk('s3')->url($path);
        $inputs['profile']= $path; 
    }
    $user->update($inputs);
    return back()->with('success','User updated successfully!');
       
  }
}
