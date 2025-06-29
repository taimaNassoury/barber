<?php

namespace App\Http\Controllers;

use App\Models\HomeImg;
use App\Models\Service;
use App\Models\DateBarber;
use App\Models\SchedualDate;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $services = Service::all();
        $home_img = HomeImg::where('status',true)->first();
        $schedual_date = SchedualDate::all();
        return view('index',compact('services','home_img','schedual_date'));
    }

    public function show($id)
    {
        // Get all entries from the DateBarber table
        $days = DateBarber::all();
    
        // Retrieve the service based on the given ID
        $services = Service::findOrFail($id);
    
        // Organize the data by date with associated times and their statuses
        $daysData = $days->groupBy('date')->map(function ($day) {
            return $day->map(function ($entry) {
                return [
                    'time' => $entry->time,
                    'status' => $entry->status
                ];
            });
        });
     
        // Convert the collection to an array for JavaScript
        $daysDataArray = $daysData->toArray();
    
        return view('book', compact('services', 'daysDataArray'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
