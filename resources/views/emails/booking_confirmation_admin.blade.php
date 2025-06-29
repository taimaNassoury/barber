<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>JIM-BarberShop</title>
</head>

<body>
    <h1 style="color: {{ $emailtype === 'new_booking' ? 'green' : 'red' }};">
        {{ $emailtype === 'new_booking' ? 'New Booking' : 'Deleted Booking' }}
    </h1>

    <ul>
        <li>{{ $booking['name_first'] }}</li>
        <li>{{ $booking['email'] }}</li>
        <li>{{ $booking['phone'] }}</li>
        <li>{{ $booking['service_name'] }}</li>
        <li>{{ $booking['service_price'] }} {{ $booking['service_currency'] }}</li>
        <p>
            Deze e-mail wordt u automatisch toegestuurd ter herinnering aan een afspraak die U heeft op
            {{ $booking['date'] }} <span
                style=" font-style: italic;font-weight: bold; font-size:15px;">{{ $booking['time'] }}</span> bij Jim
            barbershop .button

        </p>
        {{-- <a href="{{route('showBooking',$booking['id'])}}">if you want canceld or edit</a> --}}
    </ul>
</body>

</html>
