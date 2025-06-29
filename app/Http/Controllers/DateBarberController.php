<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DateBarber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateBarberController extends Controller
{
    public function index(){
        $today = Carbon::today(); // Get today's date
        $date_barbers = DateBarber::where('date', '>=', $today)->get(); // Get records where date is today or in the future
        return view('Dashboard.date_barber.index', compact('date_barbers'));
    }

    public function create(){
        return view('Dashboard.date_barber.create');
    }


    public function store(Request $request)
    {
        if (Carbon::parse($request->input('end_date'))->lt(Carbon::parse($request->input('start_date')))) {
            return redirect()->back()->with('error', 'The end date cannot be earlier than the start date.');
        }
    
        // Validate the request input
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // Check if the date already exists
        $exsist = DateBarber::whereBetween('date', [$validated['start_date'], $validated['end_date']])->first();
    
        if ($exsist) {
            return redirect()->back()->with('error', 'This day already exists');
        }

        // Parse the dates from the request
        $startDate = Carbon::createFromFormat('Y-m-d', $validated['start_date']);
        $endDate = Carbon::createFromFormat('Y-m-d', $validated['end_date']);

        // Arrays for month and day names in Dutch
        $monthsInDutch = [
            1 => 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 
            'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'
        ];

        $daysInDutch = [
            Carbon::SUNDAY => 'ZON',
            Carbon::MONDAY => 'MAA',
            Carbon::TUESDAY => 'DIN',
            Carbon::WEDNESDAY => 'WOE',
            Carbon::THURSDAY => 'DON',
            Carbon::FRIDAY => 'VRI',
            Carbon::SATURDAY => 'ZAT'
        ];

        // Insert dates and times into the database
        while ($startDate->lte($endDate)) {
            $dayOfWeek = $startDate->dayOfWeek;
            $month = $startDate->month;

            // Define times based on the day of the week
            $times = $dayOfWeek === Carbon::SUNDAY 
                ? ['10:15', '10:45', '11:15', '11:45', '12:15', '12:45', '13:15', '13:45', '14:15', '14:45', '15:15']
                : ['10:15', '10:45', '11:15', '11:45', '12:15', '12:45', '13:15', '13:45', '14:15', '14:45', '15:15', '15:45', '16:15', '16:45', '17:15', '17:45', '18:15'];

            foreach ($times as $time) {
                DB::table('date_barbers')->insert([
                    'date' => $startDate->toDateString(),
                    'time' => $time,
                    'name' => null,
                    'name_customer' => null,
                    'status' => 0,
                    'month' => $monthsInDutch[$month],
                    'day' => $daysInDutch[$dayOfWeek],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $startDate->addDay();
        }

        return redirect()->back()->with('success', 'The date has been added successfully!');
    }


    public function delete(Request $request){
        try {
            $ids = $request->input('ids');
            
            if (!empty($ids)) {
                DateBarber::whereIn('id', $ids)->delete();
                return response()->json(['success' => 'Selected items deleted successfully.']);
            } else {
                return response()->json(['error' => 'No items selected for deletion.'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function filterDateBarber(Request $request)
    {
        try {
            $query = DateBarber::query();

            // Extract start and end dates from the date range
            if ($dateRange = $request->input('dateRange')) {
               $dates = explode(' - ', $dateRange);
               $query->whereBetween('date', [$dates[0], $dates[1]]);
            }

           // Select the fields you need, including the ID for delete functionality
           $results = $query->select('id','date', 'time')->get();

           return response()->json($results);
        } catch (\Exception $e) {
           return response()->json(['error' => $e->getMessage()], 500);
        }
    }



   


    

}
