<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ContactAdminController extends Controller
{
    public function GetAllContacts(){
       
        $Result= Review::all();
         //dd($Result);
         return view('Admin.Review.List', ['Review'=> $Result]);
     }
     public function Delete($Rev_Id=null)
     {
         $CurrentReview = Review::findOrFail($Rev_Id);
         $CurrentReview->delete();
         return redirect()->route(route: 'Review.GetAll', parameters: $Rev_Id);
     }
    
}
