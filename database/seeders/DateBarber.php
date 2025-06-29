<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DateBarber extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        $startDate = Carbon::create(2024, 8, 5);
        $endDate = Carbon::create(2025, 8, 5);
        
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
        
        while ($startDate->lte($endDate)) {
            // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
            $dayOfWeek = $startDate->dayOfWeek;
            $month = $startDate->month;
        
          
            // Define times based on the day of the week
            if ($dayOfWeek === Carbon::SUNDAY) {
                // Sunday: 10:15 to 15:15
                $times = ['10:15', '10:45', '11:15', '11:45', '12:15', '12:45', '13:15', '13:45', '14:15', '14:45', '15:15'];
            } 
            else {
                // Other days: 10:15 to 18:15
                $times = [
                    '10:15', '10:45', '11:15', '11:45', '12:15', '12:45', '13:15', '13:45', 
                    '14:15', '14:45', '15:15', '15:45', '16:15', '16:45', '17:15', '17:45', '18:15'
                ];
            }
        
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
        
    }

}
