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
        $user = User::select('users.*','roles.name as role_name')->join('roles','roles.guard_name','=','users.id')->get();
      
                return view('iotAdmin.userlist',compact('user'));
      }
//below function open the edit tab 
      public function editUser($id){
        $user= User::select('users.*','roles.name as role')->join('roles','roles.guard_name','=','users.id')->where('users.id',$id)->first();;
      
        return view('iotAdmin.editUser',compact('user'));
      }
//below function update the user data
      public function updateUser(Request $request){
        
        $request->validate([
          'name'=>'required' ,
          'email'=>'required|string|',
            
         ]);
       
        $user= User::findorfail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();  
        return redirect('/user')->with('success', 'Updated');
      }
//below function delete the user data
      public function delUser($id){
     
        $user = User::findorfail($id);

        $user->delete();
                return Redirect::back()->with('success', 'Deleted'); 
      }

// below function open the add user page 
      public function addUser(){
       
                return view('iotAdmin.addUser');
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
        $role=Role::create([
            'name' => $request->role,
            'guard_name' => $user->id,
         
          ]);
       
      
       return Redirect::back()->with('success', 'Created'); 
   }

}
