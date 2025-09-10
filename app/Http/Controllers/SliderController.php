<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;

class SliderController extends Controller
{




    public function ListSlider()
    {
        $Result = Slider::all();
        //dd($Result);
        return view('Admin.Slider.List', ['Slider' => $Result]);
    }
    //Add New Slider
    public function AddNewSlider()
    {
        return view('Admin.Slider.AddNew');
        //dd($Result);
    }

    //Edit
    public function Edit($id)
    {
        $Slider = Slider::findOrFail($id);
        return view('Admin.Slider.Update', compact('Slider'));
    }




    //Save New Slider
    public function Save(Request $request)
    {
        $request->validate([
            'Title' => ['nullable', 'max:100'],
            'title_ar' => ['nullable', 'max:100'],
            'subtitle' => ['nullable', 'max:100'],
            'subtitle_ar' => ['nullable', 'max:100'],
            'Slider_Image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],

        ]);

        //Update Slider State
        if ($request->id) {
            // dd($request->all());
            $CurrentSlider = Slider::find($request->id);
            $CurrentSlider->Title = $request->Title;
            $CurrentSlider->title_ar = $request->title_ar;
            $CurrentSlider->subtitle = $request->subtitle;
            $CurrentSlider->subtitle_ar = $request->subtitle_ar;
            if ($request->hasFile('Slider_Image')) {
                $image = $request->file('Slider_Image');
                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Move the image to public/assets/img/Sliders/
                $image->move(public_path('Uploads/sliders/'), $imageName);
                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/sliders/' . $imageName;
                $CurrentSlider->Slider_Image = $imagePath;
            }
            $CurrentSlider->Save();
            return redirect()->route('Admin.GetSlider')->with('success', 'SliderPhoto Updated Successfully!');
        }

        //Save Slider State
        else {
            $imagePath = '';
            // Check if an image is uploaded
            if ($request->hasFile('Slider_Image')) {
                $image = $request->file('Slider_Image');

                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/sliders/'), $imageName);

                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/sliders/' . $imageName;
            }

            $NewSlider = new Slider();
            $NewSlider->Title = $request->Title;
            $NewSlider->title_ar = $request->title_ar;
            $NewSlider->subtitle = $request->subtitle;
            $NewSlider->subtitle_ar = $request->subtitle_ar;
            $NewSlider->Slider_Image = $imagePath;
            $NewSlider->save();

            return redirect()->route('Admin.GetSlider')->with('success', 'SliderPhoto added successfully!');
            //dd($Result);
        }
    }
    public function Delete($Slider_Id = null)
    {
        $CurrentSlider = Slider::findOrFail($Slider_Id);
        $CurrentSlider->delete();
        return redirect()->route(route: 'Admin.GetSlider', parameters: $Slider_Id);
    }
}
