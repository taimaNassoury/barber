<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('Dashboard.services.index',compact('services'));
    }


    public function edit(String $id){
        $services = Service::find($id);
        return view('Dashboard.services.update',compact('services'));
    }

    public function create(){
      
        return view('Dashboard.services.create');
    }



    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'currency' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image file
        ]);
        $existingService = Service::where('name', $request->input('name'))
        ->first();

        if ($existingService) {
            // If a booking already exists, return back with an error message
            return redirect()->back()->with('error', 'A service for this name already exists.');
        }

        $originalImageName = $request->file('image')->getClientOriginalName();

        // Check if the same image name exists in the database
        $imageExistsInDatabase = Service::where('image', 'assets/images/' . $originalImageName)->exists();
    
        // Check if the same image exists in the public path
        $imageExistsInPublicPath = file_exists(public_path('assets/images/' . $originalImageName));
    
        // If the image exists either in the database or in the public path, return an error
        if ($imageExistsInDatabase || $imageExistsInPublicPath) {
            return redirect()->route('admin.service.create')->with('error', 'An image with the same name already exists.');
        }
        // Store the image in the public path
        $request->file('image')->move(public_path('assets/images'), $originalImageName);

        // Create the service with the provided data and the stored image path
        Service::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'currency' => $request->input('currency'),
            'image' => 'assets/images/' . $originalImageName,
        ]);

        return redirect()->route('admin.service.create')->with('success', 'Service created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'currency' => 'required|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image file
        ]);

   
        // Find the existing service
        $service = Service::findOrFail($id);
    
        // Update service details
        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->min_price = $request->input('min_price');
        $service->max_price = $request->input('max_price');
        $service->currency = $request->input('currency');
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image and get the path
            $originalImageName = $request->file('image')->getClientOriginalName();

            if (file_exists(public_path('assets/images/' . $originalImageName))) {
                $originalImageName = time() . '_' . $originalImageName;
            }

            $request->image->move(public_path('assets/images'), $originalImageName);

            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
         
    
            // Update the image path in the service record
            $service->image = 'assets/images/' . $originalImageName;

        }
    
        // Save the updated service
        $service->save();
    
        // Redirect back with a success message
        return redirect()->route('index')->with('success', 'Service updated successfully');
    }
    

    public function delete($id)
    {
        $service = Service::findOrFail($id);
    
        if ($service->image && file_exists(public_path($service->image))) {
            try {
                unlink(public_path($service->image));
            } catch (\Exception $e) {
                return redirect()->route('index')->with('error', 'Error deleting the image');
            }
        }
    
        $service->delete();
    
        return redirect()->route('index')->with('delete', 'Service deleted successfully');
    }


 

 

}
