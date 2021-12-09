<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Profile\updateUserProfile;
class AdminController extends Controller
{
    
    public function viewProfile(){
        return view('admin.profile.viewProfile');
    }
    public function updateProfile(){
          return view('admin.profile.editprofile');
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
    if($request->profile != null){
        
            $imageName =$request->file('profile')->getClientOriginalName(); 
             $request->profile->move(public_path('images/profile'), $imageName);
             $inputs['profile'] = $imageName;
            }
    $user->update($inputs);
    return back()->with('success','User updated successfully!');
       
  }
}
