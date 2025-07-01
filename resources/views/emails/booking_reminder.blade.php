<!DOCTYPE html>
<html>

<head>
    <title>Afspraak Herinnering - Jim Barbershop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .header {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .address {
            margin: 15px 0;
            font-style: italic;
        }

        .signature {
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">Beste klant,</div>

    <p>We herinneren je aan je afspraak bij Jim Barbershop om
        <strong>{{ date('H:i', strtotime($booking->time)) }}</strong>
    </p>

    <div class="address">
        in Stormstraat 123, 8790 Waregem.
    </div>

    <p>Tot dan!</p>

    <div class="signature">
        Jim Barbershop
    </div>
</body>

</html>
