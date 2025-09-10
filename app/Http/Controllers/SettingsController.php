<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
     public function __construct()
    {
        // Share the setting data with all views
        View::composer('Shared_Layout.Shared', function ($view) {
            $setting = Setting::first(); // You can adjust this if you're expecting multiple records
            $view->with('setting', $setting);
        });
    }

    public function ListSettings()
    {
       
        $Result = setting::latest()->get();
        //dd($Result);
        return view('Admin.Settings.List', ['Settings' => $Result]);
    }
    //Add New Settings
    public function AddNewSettings()
    {
        
        return view('Admin.Settings.AddNew');
        //dd($Result);
    }

     //Edit
     public function Edit($id)
     {
         $Settings = setting::findOrFail($id);
        
         return view('Admin.Settings.Update', compact('Settings'));
     }






      //Save New Product
    public function Save(Request $request)
    {
        $request->validate([
            'address' => ['max:50'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'phone' => ['max:13'],
            'facebook_url' => ['max:100'],
            'twitter_url' => ['max:100'],
            'instagram_url' => ['max:100'], 
            'linkedin_url' => ['max:100'],
            'AboutUs' => ['max:500'], // Add about_us validation
            'email' => ['nullable', 'email', 'max:255'], // Add email validation
            
        ]);

        //Update Category State
        if ($request->id) {
            // dd($request->all());
            $CurrentSsetting = setting::find($request->id);
            $CurrentSsetting->address = $request->address;
            $CurrentSsetting->address_ar = $request->address_ar;
            $CurrentSsetting->phone = $request->phone;
            $CurrentSsetting->facebook_url = $request->facebook_url;
            $CurrentSsetting->twitter_url = $request->twitter_url;
            $CurrentSsetting->instagram_url = $request->instagram_url;
            $CurrentSsetting->linkedin_url = $request->linkedin_url;
            $CurrentSsetting->email = $request->email; 
            $CurrentSsetting->AboutUs = $request->AboutUs; // Update about_us field
            $CurrentSsetting->AboutUs_ar = $request->AboutUs_ar; // Update about_us_ar field
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/Settings/'), $imageName);
                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/Settings/' . $imageName;
                $CurrentSsetting->logo = $imagePath;
            }
            $CurrentSsetting->Save();
            return redirect()->route('Admin.GetSettings')->with('success', 'Settings Updated Successfully!');
        }

        //Save product State
        else {
            $imagePath ='';
            // Check if an image is uploaded
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');

                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/Settings/'), $imageName);

                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/Settings/' . $imageName;
            } 

            $NewSetting = new setting();
            $NewSetting->address = $request->address;
            $NewSetting->address_ar = $request->address_ar; // Add Arabic address field
            $NewSetting->phone = $request->phone;
            $NewSetting->facebook_url = $request->facebook_url;
            $NewSetting->twitter_url = $request->twitter_url;
            $NewSetting->instagram_url = $request->instagram_url;
            $NewSetting->linkedin_url = $request->linkedin_url;
            $NewSetting->email = $request->email;
            $NewSetting->AboutUs = $request->AboutUs; // Add about_us field
            $NewSetting->AboutUs_ar = $request->AboutUs_ar; // Add Arabic about_us field
            $NewSetting->logo = $imagePath;
            $NewSetting->save();

            return redirect()->route('Admin.GetSettings')->with('success', 'Settings added successfully!');
            //dd($Result);
        }
        
    }
    public function Delete($setting_Id)
    {
        $Currentsetting = setting::findOrFail($setting_Id);
        $Currentsetting->delete();
        return redirect()->route(route: 'Admin.GetSettings', parameters: $setting_Id);
    }
}
