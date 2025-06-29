<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIM-BarberShop</title>
</head>
<body>
    <ul>
        <li>{{ $booking['name_first'] }}</li>
        <li>{{ $booking['email'] }}</li>
        <li>{{ $booking['service_name'] }}</li>
        <p>Deze e-mail wordt u automatisch toegestuurd ter herinnering aan een afspraak die U heeft op {{ $booking['date'] }} <span style=" font-style: italic;font-weight: bold; font-size:15px; ">{{ $booking['time'] }}</span> bij Jim barbershop .
            <br>
            Indien U deze afspraak wenst te wijzigen of te annuleren, kan u dit doen tot 24 uur voor de geplande afspraak.</p>
        <a href="{{route('showBooking',$booking['id'])}}">https://jim-barbershop.com/Verwijderen</a>
    </ul>
  
</body>
</html>
