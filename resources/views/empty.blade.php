<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <title>jim-barbershop.com - Barber Shop</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            overflow-x: hidden;
        }
        .logo {
            position: absolute;
            left: 20px;
            top: 20px; /* Adjusted to prevent overlapping with top edge */
            width: 170px;
            height: auto;
            z-index: 1;
        }
        h3 {
            color: #383838;
            font-family: "Playfair Display", Sans-serif;
            font-weight: 700;
            margin: 10px 0; /* Added margin for spacing */
        }
        .main-image-wrapper {
            width: 100%;
            height: 100vh;
            position: relative;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.8);
            overflow: hidden;
        }
        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }
        .content-section {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .columns {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .column {
            width: 100%;
            max-width: 30%;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s; /* Smooth hover effect */
        }
        .column:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .column img {
            width: 100%;
            height: auto;
        }
        .text p, .text span {
            font-size: 1.3rem;
            position: relative;
            display: inline;
            padding: 0 5px;
            background-color: rgba(0, 0, 0, 0.1);
            color: #000;
        }
        .button {
            display: inline-block;
            font-weight: bold;
            background-color: #ccb869;
            color: #fff;
            font-size: 1rem;
			margin-bottom: 10px;
            padding: 10px 20px;
           
            transition: background-color 0.2s; /* Smooth color transition */
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        a:hover, a:focus {
            text-decoration: underline;
        }
        .button:hover {
            background-color: #000;
        }
        .column p {
            font-weight: bold;
            color: #ccb869;
            font-size: 1.3rem;
            margin: 10px 0; /* Added margin for spacing */
        }
		.opening-hours-section {
          background-color: #f9f9f9; /* Light background for contrast */
          padding: 20px 0;
          margin-top: 40px;
          text-align: center;
        }

       .opening-hours-section .content-section {
          max-width: 1000px; /* Increased width */
          margin: 0 auto;
          padding: 0 20px; /* Add padding to prevent content from touching the screen edges */
        }


        .opening-hours-table {
          width: 100%;
          max-width: 600px;
          margin: 0 auto;
          border-collapse: collapse;
        }



        .opening-hours-table td {
           padding: 12px 0;
            font-size: 1.2rem;
		    background-color: #fff;
			justify-content: space-between;
        }

       .opening-hours-table tr:last-child td {
          background-color: #000;
          color: #fff;
        }
		
        .opening-hours-table td.left {
            padding-left: 10px; /* Reduced padding on the left */
            padding-right: 20px; /* Default padding on the right */
            text-align: left; /* Align text to the left */
        }

        .opening-hours-table td.right {
          padding-left: 20px; /* Default padding on the left */
          padding-right: 10px; /* Reduced padding on the right */
          text-align: right; /* Align text to the right */
        }
        .map-section {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
        }
        .map-section iframe {
            width: 100%;
            height: 450px;
            border: none;
        }
	      
        /* Loader styles */
         /* Preloader styles */
         .preloader-plus {
            background-color: #141414;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure the loader is above everything */
            opacity: 1;
            transition: opacity 1000ms, transform 1000ms, visibility 0s 1000ms;
        }

        .preloader-plus.complete {
            opacity: 0;
            visibility: hidden;
            transform: scale(1);
        }

        .preloader-site-title {
            font-weight: bold;
            font-size: 50px;
            color: #65615F;
            text-transform: none;
            margin-bottom: 20px;
        }

        .preloader-custom-img {
            width: 150px;
            height: 120px;
            animation: rotate 2.5s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
          /* Footer Styles */
          .footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 50px 0;
        }

        .footer img {
            width: 200px; /* Adjust size as needed */
            margin-bottom: 10px;
        }

        .footer .line {
            height: 1px;
            background-color: #141414;
            width: 80%;
            margin: 20px 0;
        }

        .footer .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .footer .social-icons a {
            color: #fff;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer .social-icons a:hover {
            color: #ccc;
        }

        .copyright {
            background-color: #fff;
            text-align: center;
            padding: 10px 0;
            color: #000;
        }
    
       

        /* Responsive styles */
        @media (max-width: 768px) {
            .column {
                max-width: 45%; /* Two columns on tablets */
            }
			.opening-hours-section .content-section {
             max-width: 90%; /* Adjust width for tablets and smaller devices */
              padding: 0 10px; /* Slightly reduce padding */
            }

           .opening-hours-table {
                border-collapse: collapse;
            }
           .opening-hours-table td {
               font-size: 1rem; 
			}/* Reduce font size slightly for smaller screens */
			.opening-hours-table tr:last-child td {
               background-color: #000;
               color: #fff;
            }
            .footer img {
                width: 150px;
            }

            .footer .social-icons a {
                font-size: 20px;
            }

            .map-iframe {
                height: 300px;
            }
            .preloader-site-title {
                font-size: 2rem; /* Smaller font size on tablets */
            }
	
        }
        
        @media (max-width: 480px) {
            .column {
                max-width: 100%; /* Single column on small screens */
            }
            .text p, .text span {
                font-size: 1rem; /* Adjusted font size for smaller screens */
            }
			.logo {
              position: absolute;
               left: -20px; /* Use left property for positioning */
                z-index: 1;
            }
		    .opening-hours-table {
                border-collapse: collapse;
            }
			.opening-hours-table td {
               padding: 8px 5px; /* Reduce padding for small screens */
               font-size: 0.7rem;
             }
	       
            .opening-hours-table td.left {
              text-align: left; /* Keep text left-aligned */
            }
            .footer img {
                width: 200px;
            }

            .footer .social-icons a {
                font-size: 18px;
            }

            .map-iframe {
                height: 200px;
            }

            .opening-hours-table td.right {
               text-align: right; /* Keep text right-aligned */
            }
            .preloader-custom-img {
                width: 60px;
                height: 60px; /* Smaller logo on mobile */
            }
            .preloader-site-title {
                font-size: 1.5rem; /* Smaller font size on mobile */
            }

            
        }
    </style>
</head>
<body>
    <div class="preloader-plus">
        <div class="preloader-site-title">Loading...</div>
        <img src="{{ asset('assets/images/jym-postlol.png') }}" alt="Loading Icon" class="preloader-custom-img"> <!-- Replace with your logo path -->
    </div>
    <!-- Main Image with Logo -->
    <div class="main-image-wrapper">
        <img src="{{ asset('assets/images/IMG_6393.jpg') }}" alt="Main Image" class="main-image">
        <img src="{{ asset('assets/images/jym-postlol.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Content Section -->
    <div class="content-section">
        <div class="text">
            <p>Bij Jim Barbershop draait alles om de kunst van mannenverzorging. Onze barbershop<br>
                biedt een verfijnde en stijlvolle omgeving waar mannen terecht kunnen voor de beste<br>
                knip- en scheerbehandelingen. Wij zijn gespecialiseerd in klassieke en moderne kapsels,<br>
                strakke baardlijnen en ultieme verzorgingsproducten om jou er op je best uit te laten<br>
                <span>zien.</span>
            </p><br><br>
            <span>Plan vandaag nog je afspraak en laat je verwennen door de experts van<br>
                Jim Barbershop.
            </span>
        </div> 
        @foreach ($services->chunk(3) as $chunk)
            <div class="columns">
                @foreach ($chunk as $service)
                    <div class="column">
                        <img src="{{$service->image}}" alt="Service Image">
                        <h3>{{$service->name}}</h3>
                        <p>{{$service->price}}
                            @if (!is_null($service->max_price))
                                - {{$service->max_price}}
                            @endif {{$service->currency}}</p>
                        <a href="{{route('books.show', $service->id)}}" class="button">Bouk Nu</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
	<section class="opening-hours-section">
		<div class="content-section">
			<table class="opening-hours-table">
				<tr>
					<td class="left">Woensdag - Zaterdag</td>
					<td class="right">10:00 – 19:00</td>
				</tr>
				<tr>
					<td class="left">Zondag</td>
					<td class="right">10:00 – 16:00</td>
				</tr>
				<tr>
					<td class="left">Maandag - Dinsdag</td>
					<td class="right">Gesloten</td>
				</tr>
			</table>
		</div>
    </section>
    <div class="map-section">
        <h2>Our Location</h2>
        <!-- Insert the Google Maps iframe embed code here -->
        <iframe loading="lazy" src="https://maps.google.com/maps?q=Stormestraat%20123%2C%20Waregem%208790%2C%20Jim%20barbershop&amp;t=m&amp;z=11&amp;output=embed&amp;iwloc=near" title="Stormestraat 123, Waregem 8790, Jim barbershop" aria-label="Stormestraat 123, Waregem 8790, Jim barbershop"></iframe>        </div>
    </div>
    <div class="footer">
        <img src="{{ asset('assets/images/jym-postlol.png') }}" alt="Logo"> <!-- Replace with your logo path -->
        <div class="line"></div>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    
        <!-- Copyright Section -->
        <div class="copyright">
            &copy;2024 by JIM Barber-shop. Made By Brand Engine
        </div>

    
	

</body>
<script>
    // JavaScript to hide loader after the page loads
    window.addEventListener('load', function() {
        // Hide the loader and show the main content
         document.querySelector('.preloader-plus').classList.add('complete');
         document.querySelector('.main-content').style.display = 'block';
         document.body.style.overflow = 'auto'; // Restore scroll when content is visible
    });
</script>
</html>
