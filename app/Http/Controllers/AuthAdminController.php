<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\BookCancel;
use App\Models\DateBarber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthAdminController extends Controller
{
    public function login_admin()
    {
        return view('auth.signin');
    }



    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth('web')->attempt($credentials, $request->remember)) {
            Session::flash('error', 'Email or password not found.');
            return redirect()->back()->withInput();
        }

        return view('Dashboard.home');
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('admin.login')->with('success',   ' You have been log out successfully');
    }

    public function cancel_book()
    {
        return view('Dashboard.cancel_book');
    }

    public function fetchData(Request $request)
    {
        try {
            $query = DateBarber::query();

            if ($day = $request->input('day')) {
                $query->where('day', 'LIKE', "%$day%");
            }

            if ($dateRange = $request->input('dateRange')) {
                $dates = explode(' - ', $dateRange);
                $query->whereBetween('date', [$dates[0], $dates[1]]);
            }

            if ($time = $request->input('time')) {
                $query->whereTime('time', $time);
            }

            if ($name = $request->input('name')) {
                $query->where('name', 'LIKE', "%$name%");
            }

            if ($name_customer = $request->input('name_customer')) {
                $query->where('name_customer', 'LIKE', "%$name_customer%");
            }

            $status = $request->input('status');
            if (!is_null($status) && $status !== '') {
                $query->where('status', $status);
            }


            $results = $query->select('id', 'name', 'name_customer', 'date', 'time', 'phone', 'status', 'day', 'month', 'check')->get();

            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request)
    {

        DB::beginTransaction();
        try {
            $ids = $request->input('ids', []);
            $status = $request->input('status');

            if (!empty($ids)) {
                $dateBarbers = DateBarber::whereIn('id', $ids)->get();

                foreach ($dateBarbers as $dateBarber) {
                    $dateBarber->update([
                        'status' => $status,
                        'name_customer' => null,
                        'name' => null,
                        'phone' => null,
                    ]);

                    $book = Booking::where('date_id', $dateBarber->id)->first();

                    if ($book) {
                        BookCancel::create([
                            'first_name' => $book->first_name,
                            'last_name' => $book->last_name,
                            'email' => $book->email,
                            'code' => $book->code,
                            'phone' => $book->phone,
                            'service_name' => $book->service_name,
                            'date' => $book->date,
                            'time' => $book->time,
                            'who_delete' => 'admin',
                        ]);

                        $book->delete();
                    }
                }

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No valid IDs provided.'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating status: ' . $e->getMessage()
            ]);
        }
    }


    public function updateCheck(Request $request)
    {
        try {
            // Get the array of IDs from the request
            $ids = $request->input('ids', []);
            $check = $request->input('check');

            if (!empty($ids)) {
                // Fetch the records with the specified IDs from the DateBarber model
                $dateBarbers = DateBarber::whereIn('id', $ids)->get();

                // Loop through each record and update only the 'check' field
                foreach ($dateBarbers as $dateBarber) {
                    $dateBarber->update([
                        'check' => $check
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Check field updated successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No IDs were provided.'
                ]);
            }
        } catch (\Exception $e) {
            // Catch any errors that occur and return a response with the error message
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating: ' . $e->getMessage()
            ]);
        }
    }
}