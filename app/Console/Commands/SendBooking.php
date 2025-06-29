<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendBooking extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:send-booking';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $yesterday = Carbon::yesterday()->toDateString();

    // Fetch bookings for yesterday's date
    $bookings = DB::table('bookings')
      ->where('date', $yesterday)
      ->get();

    // Fetch date_barbers for yesterday's date
    $date_barbers = DB::table('date_barbers')
      ->where('date', $yesterday)
      ->get();

    // Fetch book_cancels for yesterday's date
    $book_cancels = DB::table('book_cancels')
      ->where('date', $yesterday)
      ->get();



    foreach ($bookings as $booking) {

      $data = [
        'date_id' => $booking->date_id,
        'first_name' => $booking->first_name,
        'last_name'  => $booking->last_name,
        'date'  => $booking->date,
        'time'  => $booking->time,
        'email'  => $booking->email,
        'code'  => $booking->code,
        'code'  => $booking->code,
        'phone'  => $booking->phone,
        'service_name'  => $booking->service_name,
        'service_price'  => $booking->service_price,
        'service_currency'  => $booking->service_currency,
      ];

      // Send the data to Zapier webhook
      $client = new \GuzzleHttp\Client();
      $client->post('https://hooks.zapier.com/hooks/catch/17823706/21csvom/', [
        'json' => $data,
      ]);
      DB::table('bookings')->where('id', $booking->id)->delete();
    }

    foreach ($date_barbers as $date_barber) {

      $data = [
        'name' => $date_barber->name,
        'status' => $date_barber->status,
        'day'  => $date_barber->day,
        'date'  => $date_barber->date,
        'time'  => $date_barber->time,
        'month'  => $date_barber->month,
        'name_customer'  => $date_barber->name_customer,
        'check'  => $date_barber->check,
        'phone'  => $date_barber->phone,

      ];

      // Send the data to Zapier webhook
      $client = new \GuzzleHttp\Client();
      try {
        $client->post('https://hooks.zapier.com/hooks/catch/17823706/21c8wu8/', [
          'json' => $data,
        ]);
      } catch (\GuzzleHttp\Exception\ClientException $e) {
        // Log error details

        Log::error('Zapier webhook failed: ' . $e->getMessage());
      }
      DB::table('date_barbers')->where('id', $date_barber->id)->delete();
    }

    foreach ($book_cancels as $book_cancel) {

      DB::table('book_cancels')->where('id', $book_cancel->id)->delete();
    }

    $this->info('Bookings processed successfully');
  }
}
