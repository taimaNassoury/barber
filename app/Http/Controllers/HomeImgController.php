<?php

namespace App\Http\Controllers;

use App\Models\HomeImg;
use Illuminate\Http\Request;

class HomeImgController extends Controller
{

    public function index(){
        $home_imgs = HomeImg::all();
        return view('Dashboard.home_image.index',compact('home_imgs'));
    }

    public function create(){
        return view('Dashboard.home_image.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image file
        ]);
        $originalImageName = $request->file('image')->getClientOriginalName();

        // Check if the same image name exists in the database
        $imageExistsInDatabase = HomeImg::where('image', 'assets/images/' . $originalImageName)->exists();
    
        // Check if the same image exists in the public path
        $imageExistsInPublicPath = file_exists(public_path('assets/images/' . $originalImageName));
    
        // If the image exists either in the database or in the public path, return an error
        if ($imageExistsInDatabase || $imageExistsInPublicPath) {
            return redirect()->route('admin.img.index')->with('error', 'An image with the same name already exists.');
        }
        // Store the image in the public path
        $request->file('image')->move(public_path('assets/images'), $originalImageName);

        HomeImg::create([
            'image' =>'assets/images/'. $originalImageName,
            'status'=>false,
        ]);
        return redirect()->route('admin.img.index')->with('success', 'An image created successfully.');

    }

    public function update($id){
        HomeImg::where('status',true)->update([
            'status' => false,
        ]);

        $home_img = HomeImg::find($id);
        if($home_img){
            $home_img->update([
                'status' => true,
            ]);
        }
       
        return redirect()->route('admin.img.index')->with('warning', 'An image selected successfully.');

    }

    public function delete($id){
       HomeImg::find($id)->delete();
       
        return redirect()->route('admin.img.index')->with('delete', 'An image deleted successfully.');

    }
}
