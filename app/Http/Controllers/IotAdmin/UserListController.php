<?php

namespace App\Http\Controllers\IotAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserListController extends Controller
{
  
  //below function show all data in table 
      public function index(){
        $user = User::all();
                return view('iotAdmin.userlist',compact('user'));
      }
//below function open the edit tab 
      public function editUser($id){
        $user= User::findorfail($id);
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
          'password'=>'required|string'   
         ]);
         $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
       
        ]);
      
       return Redirect::back()->with('success', 'Created'); 
   }

}
