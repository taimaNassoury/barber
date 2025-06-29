<?php

namespace App\Http\Controllers;

use Exception;
use App\Events\MyEvent;
use App\Models\Booking;
use App\Models\BookCancel;
use App\Models\DateBarber;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationAdmin;
use App\Mail\BookingConfirmationYasser;
use App\Models\EmailTable;

class CustomerDetailsController extends Controller
{
    public function store(Request $request)
    {
        $existingBooking = Booking::where('date', $request->input('selected_date'))
            ->where('time', $request->input('selected_time'))
            ->first();
        $notAvilable = DateBarber::where('date', $request->input('selected_date'))
            ->where('time', $request->input('selected_time'))->where('status', 2)
            ->first();

        if ($notAvilable) {
            // If a booking already exists, return back with an error message
            return redirect()->back()->with('error', 'This day not avilable.');
        }

        if ($existingBooking) {
            // If a booking already exists, return back with an error message
            return redirect()->back()->with('error', 'A booking for this date and time already exists.');
        }
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'code' => 'required|string|max:5',
            'phone' => 'required|string|max:20',
            'service_name' => 'required|string|max:255',
            'service_price' => 'required|numeric',
            'service_currency' => 'required|string|max:10',
        ]);

        try {
            $date_id = DateBarber::where('date', $request->selected_date)->where('time', $request->selected_time)->pluck('id')->first();

            // Store the booking in the database
            $booking = Booking::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'code' => $request->input('code'),
                'phone' => $request->input('phone'),
                'service_name' => $request->input('service_name'),
                'service_price' => $request->input('service_price'),
                'date' => $request->input('selected_date'),
                'time' => $request->input('selected_time'),
                'date_id' => $date_id,
                'service_currency' => $request->input('service_currency'),
            ]);
            EmailTable::create([
                'first_name' => $booking->first_name,
                'last_name' => $booking->last_name,
                'email' => $booking->email,
                'code' => $booking->code,
                'phone' => $booking->phone,
                'service_name' => $booking->service_name,
                'time' => $booking->time,
                'date_id' => $date_id,
                'type' => 'book',

            ]);

            $dateBarber = DateBarber::where('date', $request->input('selected_date'))
                ->where('time', $request->input('selected_time'))
                ->first();

            if ($dateBarber) {
                $dateBarber->update([
                    'name' => $request->input('service_name'),
                    'name_customer' => $request->input('first_name') . ' ' . $request->input('last_name'),
                    'status' => 1,
                    'phone' => $request->input('phone'),

                ]);
            }

            Mail::to($request->input('email'))->send(new BookingConfirmation($booking));
            Mail::to('nadeemmassouh@gmail.com')->send(new BookingConfirmationAdmin($booking, 'new_booking'));
            Mail::to('Jameelmassouh2@gmail.com')->send(new BookingConfirmationAdmin($booking, 'new_booking'));
            Mail::to('Yasserkahla8@gmail.com')->send(new BookingConfirmationYasser($booking, 'new_booking'));
            return view('success');
        } catch (Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'An error occurred while creating the booking: ' . $e->getMessage());
        }
    }

    public function show(Request $request, String $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'code' => $request->input('code'),
                'phone' => $request->input('phone'),
                'service_name' => $request->input('service_name'),
                'service_price' => $request->input('service_price'),
                'date' => $request->input('selected_date'),
                'time' => $request->input('selected_time'),
                'service_currency' => $request->input('service_currency'),
            ]);
            $date_id = DateBarber::where('data', $request->input('selected_date'))->value('id');

            EmailTable::create([
                'first_name' => $booking->first_name,
                'last_name' => $booking->last_name,
                'email' => $booking->email,
                'code' => $booking->code,
                'phone' => $booking->phone,
                'service_name' => $booking->service_name,
                'time' => $booking->time,
                'date_id' => $date_id,
                'type' => 'Update book',

            ]);

            $dateBarberold = DateBarber::where('date', $request->input('selected_date_old'))
                ->where('time', $request->input('selected_time_old'))
                ->first();
            if ($dateBarberold) {
                $dateBarberold->update([
                    'status' => 0,
                ]);
            }

            Mail::to($request->input('email'))->send(new BookingConfirmation($booking));
            Mail::to('nadeemmassouh@gmail.com')->send(new BookingConfirmationAdmin($booking, 'new_booking'));
            Mail::to('Jameelmassouh2@gmail.com')->send(new BookingConfirmationAdmin($booking, 'new_booking'));
            Mail::to('Yasserkahla8@gmail.com')->send(new BookingConfirmationYasser($booking, 'new_booking'));

            return view('success');
        } catch (Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'An error occurred while creating the booking: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $dateBarber = DateBarber::where('date', $booking->date)
            ->where('time', $booking->time)
            ->first();
        if ($dateBarber) {
            $dateBarber->update([
                'status' => 0,
                'name' => null,
                'name_customer' => null,
                'phone' => null
            ]);
        }
        BookCancel::create([
            'first_name' => $booking->first_name,
            'last_name' => $booking->last_name,
            'email' => $booking->email,
            'code' => $booking->code,
            'phone' => $booking->phone,
            'service_name' => $booking->service_name,
            'date' => $booking->date,
            'time' => $booking->time,
            'who_delete' => 'user',

        ]);
        $date_id = DateBarber::where('date', $booking->date)->value('id');

        EmailTable::create([
            'first_name' => $booking->first_name,
            'last_name' => $booking->last_name,
            'email' => $booking->email,
            'code' => $booking->code,
            'phone' => $booking->phone,
            'service_name' => $booking->service_name,
            'time' => $booking->time,
            'date_id' => $date_id,
            'type' => 'delete',

        ]);

        $booking->delete();
        Mail::to('nadeemmassouh@gmail.com')->send(new BookingConfirmationAdmin($booking, 'deleted_booking'));
        Mail::to('Jameelmassouh2@gmail.com')->send(new BookingConfirmationAdmin($booking, 'deleted_booking'));
        Mail::to('Yasserkahla8@gmail.com')->send(new BookingConfirmationYasser($booking, 'deleted_booking'));
        return view('deleteSuccess');
    }
    public function showBooking($id)
    {
        $days = DateBarber::all();
        $booking = Booking::findOrFail($id);
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

        $bookingDate = $booking->date;
        $bookingDay = date('d', strtotime($bookingDate)); // Extract day
        $bookingMonth = date('M', strtotime($bookingDate)); // Extract abbreviated month name
        $bookingYear = date('Y', strtotime($bookingDate));
        $bookingHourMinute = $booking->time; // Assuming $booking has a time field
        $bookingTime = substr($bookingHourMinute, 0, 5);


        return view('updateBooking', compact('booking', 'bookingDay', 'bookingMonth', 'bookingYear', 'bookingTime', 'daysDataArray', 'bookingDate', 'bookingTime'));
    }
}