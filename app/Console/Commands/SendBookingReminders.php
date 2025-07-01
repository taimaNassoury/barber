<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingReminderMail;

class SendBookingReminders extends Command
{
    protected $signature = 'bookings:send-reminders';
    protected $description = 'Send email reminders for bookings happening in 2 hours';

    public function handle()
    {
        // Get current date and time
        $now = Carbon::now();

        // Calculate the time 2 hours from now
        $reminderTime = $now->copy()->addHours(2);

        // Format for comparison (just hour and minute)
        $reminderTimeFormatted = $reminderTime->format('H:i');

        // Get bookings for today happening in exactly 2 hours
        $bookings = Booking::whereDate('date', $now->toDateString())
            ->whereTime('time', $reminderTimeFormatted)
            ->get();

        if ($bookings->isEmpty()) {
            $this->info('No bookings found for reminders.');
            return;
        }

        foreach ($bookings as $booking) {
            try {
                Mail::to($booking->email)->send(new BookingReminderMail($booking));

                // Update the email_sent flag
                $booking->update(['email_sent' => true]);

                $this->info("Reminder sent to: {$booking->email} for booking at {$booking->time}");
            } catch (\Exception $e) {
                $this->error("Failed to send email to {$booking->email}: {$e->getMessage()}");
            }
        }

        $this->info('All reminders sent successfully.');
    }
}