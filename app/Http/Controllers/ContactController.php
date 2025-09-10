<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ContactController extends Controller
{

   


//ContactUs
    public function ContactUs()
{
    return view('/ContactUs.AddNewReview');
}




//Save New Contact
public function SaveContact(Request $request)
{
    $request->validate([
        'user_name'=> 'required|string|max:30',
        'user_email' => [
            'required',
            'string',
            'max:255',
            'unique:reviews,user_email',
            'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
        ],
        'user_phone' => 'required|numeric|digits_between:10,15 |unique:reviews,user_phone',
        'user_message' => 'required|string|min:3|max:1000',
    ]);



    $NewReview = new Review();
    $NewReview->user_name = $request->user_name;
    $NewReview->user_email = $request->user_email;
    $NewReview->user_phone = $request->user_phone;
    $NewReview->user_message = $request->user_message;
    $NewReview->save();
    
return redirect()->route('Home.Index')->with('success', 'Review added successfully!');
    //dd($Result);
}



}
