<?php

namespace App\Http\Controllers;

use App\Models\SchedualDate;
use Illuminate\Http\Request;

class SchedualDateController extends Controller
{

    
    public function index(){
        $schedual_date = SchedualDate::all();
        return view('Dashboard.schedual.index',compact('schedual_date'));
    }


    public function create(){
        return view('Dashboard.schedual.create');
    }
    
    public function store(Request $request){
              
            $existDate = SchedualDate::where('day',$request->input('day'))->where('time',$request->input('time'))->exists();
            if ($existDate) {
                return redirect()->route('admin.date.index')->with('error', 'An date with the same day and time already exists.');
            }
              $request->validate([
                'day' => 'required|string|max:255',
                'time' => 'required|string',
            ]);

            SchedualDate::create([
                'day' =>$request->input('day'),
                'time' =>$request->input('time')

            ]);
            return redirect()->route('admin.date.index')->with('success', 'An scheduale date created successfully.');

    
    }

    public function edit($id){
        $schedual_date = SchedualDate::findOrFail($id);
        return view('Dashboard.schedual.update',compact('schedual_date'));
    }



    public function update(Request $request, $id){
              
          $request->validate([
            'day' => 'nullable|string|max:255',
            'time' => 'nullable|string|max:255',
        ]);
        $existDate = SchedualDate::where('day',$request->input('day'))->where('time',$request->input('time'))->exists();
            if ($existDate) {
                return redirect()->route('admin.date.index')->with('error', 'An date with the same day and time already exists.');
            }

         $schedual_date = SchedualDate::findOrFail($id);

         $schedual_date->update([
            'day' =>$request->input('day'),
            'time' =>$request->input('time')

        ]);
        return redirect()->route('admin.date.index')->with('warning', 'An scheduale date updated successfully.');


    }


    public function delete(String $id){
        SchedualDate::find($id)->delete();
        return redirect()->route('admin.date.index')->with('delete', 'An scheduale date deleted successfully.');

    }


}
