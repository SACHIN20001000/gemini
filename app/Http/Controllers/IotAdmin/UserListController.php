<?php

namespace App\Http\Controllers\IotAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Validator;
class UserListController extends Controller
{

  //below function show all data in table
      public function index(){
        $data = User::with('roles')->get();
      
        return view('iotAdmin.userlist',compact('data'));
      }
//below function open the edit tab
      public function editUser($id){
        $user= User::with('roles')->where('id',$id)->first();
        $role = Role::all();
        return view('iotAdmin.editUser',compact('user','role'));
      }
//below function update the user data
      public function updateUser(Request $request){

        $request->validate([
          'name'=>'required' ,
          'email'=>'required|string|',

         ]);
         $role = $request->role;
        $user= User::findorfail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
       
        $user->save();
        $user->assignRole($role);
       
        return redirect('iot-admin/user')->with('success', 'Updated');
      }
//below function delete the user data
      public function delUser($id){

        $user = User::findorfail($id);

        $user->delete();
                return Redirect::back()->with('success', 'Deleted');
      }

// below function open the add user page
      public function addUser(){
        $role = Role::all();
                return view('iotAdmin.addUser',compact('role'));
      }

// below function store user data in db
      public function addNewUser(Request $request){

         $request->validate([
          'name'=>'required' ,
          'email'=>'required|string|email|unique:users',
          'password'=>'required|string',
          'role'  =>'required'
         ]);
         $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),

        ]);
        $role = $request->role;
        $user->assignRole($role);


       return Redirect::back()->with('success', 'Created');
   }

}
