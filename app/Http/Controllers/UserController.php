<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function GetAllUsers()
    {
        $Result= User::all();
         return view('Admin.User.List', ['User'=> $Result]);
     }
     public function Delete($User_Id=null)
     {
         $DUser = User::findOrFail($User_Id);
         $DUser->delete();
         return redirect()->route(route: 'User.GetAll', parameters: $User_Id);
     }
}
