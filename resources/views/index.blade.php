<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        rel="stylesheet"
    />
    <title>jim-barbershop.com - Barber Shop</title>
    <link
        type="image/x-icon"
        href="{{ asset('assets/images/jym post.svg') }}"
        rel="icon"
    >

    <style>
        body,
        html {
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
            top: 20px;
            /* Adjusted to prevent overlapping with top edge */
            width: 170px;
            height: auto;
            z-index: 1;
        }

        h3 {
            color: #383838;
            font-family: "Playfair Display", Sans-serif;
            font-weight: 700;
            margin: 10px 0;
            /* Added margin for spacing */
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
            transition: transform 0.2s;
            /* Smooth hover effect */
        }

        .column:hover {
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }

        .column img {
            width: 100%;
            height: auto;
        }

        .text {
            overflow: hidden;
            position: relative;
            width: 400;
            font-size: 18px;
        }

        .line {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
            /* Add scale effect */
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .line.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            /* Reset scale */
        }


        /* Optional: Add some spacing between lines */
        .line+.line {
            margin-top: 10px;
        }

        .line:nth-child(1) {
            transition-delay: 0.3s;
        }

        .line:nth-child(2) {
            transition-delay: 0.5s;
        }


        .button {
            display: inline-block;
            font-weight: bold;
            background-color: #ccb869;
            color: #fff;
            font-size: 1rem;
            margin-bottom: 10px;
            padding: 10px 20px;

            transition: background-color 0.2s;
            /* Smooth color transition */
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover,
        a:focus {
            text-decoration: underline;
        }

        .button:hover {
            background-color: #000;
        }

        .column p {
            font-weight: bold;
            color: #ccb869;
            font-size: 1.3rem;
            margin: 10px 0;
            /* Added margin for spacing */
        }

        .opening-hours-section {
            background-color: #f9f9f9;
            /* Light background for contrast */
            padding: 20px 0;
            margin-top: 40px;
            text-align: center;
        }

        .opening-hours-section .content-section {
            max-width: 1000px;
            /* Increased width */
            margin: 0 auto;
            padding: 0 20px;
            /* Add padding to prevent content from touching the screen edges */
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
            padding-left: 10px;
            /* Reduced padding on the left */
            padding-right: 20px;
            /* Default padding on the right */
            text-align: left;
            /* Align text to the left */
        }

        .opening-hours-table td.right {
            padding-left: 20px;
            /* Default padding on the left */
            padding-right: 10px;
            /* Reduced padding on the right */
            text-align: right;
            /* Align text to the right */
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
            padding-left: 30px;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensure the loader is above everything */
            opacity: 1;
            transition: opacity 1000ms, transform 1000ms, visibility 0s 1000ms;
        }

        .preloader-plus.complete {
            opacity: 0;
            visibility: hidden;
            transform: scale(1);
        }


        .preloader-custom-img {
            width: 250px;
            height: 150px;
            margin-top: 160px;
            margin-left: -180px;

        }


        /* Footer Styles */
        .footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 50px 0;
        }

        .footer img {
            width: 200px;
            /* Adjust size as needed */
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

        .dots {
            display: flex;
            justify-content: center;
            padding: 10px;
            margin-top: -20px;
        }

        .dot {
            width: 15px;
            height: 15px;
            margin: 0 5px;
            background-color: #333;
            border-radius: 50%;
            animation: bounce 1s infinite;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        .dot:nth-child(4) {
            animation-delay: 0.6s;
        }

        @keyframes bounce {

            0%,
            60%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-15px);
            }
        }

        .testimonial-container {
            position: relative;
            max-width: 1000px;
            margin: auto;
            background-color: #1d1d1d;
            border-radius: 15px;
            padding: 20px;
            color: #ffffff;
        }

        .testimonial-container h3 {
            color: #ffffff;

        }

        .testimonial-content {
            display: flex;
            align-items: center;
        }



        .testimonial-img2 {

            margin-left: -10px;
            width: 220px;
            height: 150px;
        }

        .testimonial-text {
            margin-left: 80px;
            flex: 1;
        }

        .stars {
            color: #f4c150;
            margin-bottom: 10px;

        }

        .dots2 {
            text-align: center;
            margin-top: 15px;
            margin-left: 200px;
        }

        .dot2 {
            height: 8px;
            width: 8px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
        }

        .dot2.active {
            background-color: #f4c150;
        }





        /* Responsive styles */
        @media (max-width: 768px) {
            .column {
                max-width: 45%;
                /* Two columns on tablets */
            }

            .opening-hours-section .content-section {
                max-width: 90%;
                /* Adjust width for tablets and smaller devices */
                padding: 0 10px;
                /* Slightly reduce padding */
            }

            .opening-hours-table {
                border-collapse: collapse;
            }

            .opening-hours-table td {
                font-size: 1rem;
            }

            /* Reduce font size slightly for smaller screens */
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
                font-size: 2rem;
                /* Smaller font size on tablets */
            }

            .text {
                overflow: hidden;
                position: relative;
                width: 300;
            }

            .line {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
                /* Add scale effect */
                transition: opacity 1.5s ease-out, transform 1.5s ease-out;
            }

            .line.visible {
                opacity: 1;
                transform: translateY(0) scale(1);
                /* Reset scale */
            }


            /* Optional: Add some spacing between lines */
            .line+.line {
                margin-top: 10px;
            }

            .line:nth-child(1) {
                transition-delay: 0.5s;
            }

            .line:nth-child(2) {
                transition-delay: 1s;
            }

        }

        /* Optional: For devices greater than 760px */
        @media (min-width: 761px) {

            /* Adjust or disable animations for larger screens */
            .line.animate-row {
                opacity: 1;
                transform: translateY(0);
            }

            .line span.animate-char {
                opacity: 1;
            }
        }

        @media (max-width: 480px) {
            .column {
                max-width: 100%;
                /* Single column on small screens */
            }

            .line.animate-row {
                opacity: 1;
                transform: translateY(0);
            }

            .text {
                overflow: hidden;
                position: relative;
                width: 500;
            }

            .line {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
                /* Add scale effect */
                transition: opacity 1.5s ease-out, transform 1.5s ease-out;
            }

            .line.visible {
                opacity: 1;
                transform: translateY(0) scale(1);
                /* Reset scale */
            }


            /* Optional: Add some spacing between lines */
            .line+.line {
                margin-top: 10px;
            }

            .line:nth-child(1) {
                transition-delay: 0.5s;
            }

            .line:nth-child(2) {
                transition-delay: 1s;
            }

            .logo {
                position: absolute;
                left: -20px;
                /* Use left property for positioning */
                z-index: 1;
            }

            .opening-hours-table {
                border-collapse: collapse;
            }

            .opening-hours-table td {
                padding: 8px 5px;
                /* Reduce padding for small screens */
                font-size: 0.7rem;
            }

            .opening-hours-table td.left {
                text-align: left;
                /* Keep text left-aligned */
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
                text-align: right;
                /* Keep text right-aligned */
            }

            .preloader-plus {
                display: flex;
                flex-direction: column;
                /* Stack elements vertically */
                align-items: center;
                /* Center align elements horizontally */
                justify-content: center;
                /* Center align elements vertically */
                height: 100vh;
                /* Ensure it takes up the full screen height */
                padding: 20px;
                /* Add padding for spacing */
                box-sizing: border-box;
                /* Ensure padding is included in the height and width calculations */
            }

            .dots {
                display: flex;
                justify-content: center;
                /* Center the dots horizontally */
                margin-bottom: 20px;
                /* Add space between the dots and the image */
            }

            .preloader-custom-img {
                width: 120px;
                /* Adjust width for small screens */
                height: 60px;
                /* Adjust height for small screens */
                margin: 0px;
                /* Remove any additional margins */
            }

            .dot {
                width: 15px;
                height: 15px;
                margin: 0 5px;
                background-color: #333;
                border-radius: 50%;
                animation: bounce 1s infinite;
            }

            .testimonial-container {
                padding: 10px;
                border-radius: 10px;
            }

            .testimonial-content {
                flex-direction: column;
                /* Stack the image and text vertically */
                align-items: center;
                /* Center align the items */
                text-align: center;
                /* Center align text */
            }

            .testimonial-img2 {
                margin: 0 auto 20px auto;
                /* Center the image and add some margin at the bottom */
                width: 100px;
                /* Adjust the image size for small screens */
                height: auto;
                /* Maintain aspect ratio */
            }

            .testimonial-text {
                margin-left: 0;
                font-size: 14px;
                /* Adjust font size for readability on smaller screens */
            }

            .stars {
                font-size: 16px;
                /* Adjust star size */
            }

            .dots2 {
                margin-left: 0;
                /* Center the dots under the testimonial */
            }

            .dot2 {
                width: 10px;
                /* Smaller dots */
                height: 10px;
            }



        }

        @media (max-width: 479px) {

            /* You can adjust the animation timing or disable it for smaller screens if desired */
            .line.animate-row {
                opacity: 1;
                transform: translateY(0);
            }

            .line span.animate-char {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="preloader-plus">
        <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <img
            class="preloader-custom-img"
            src="{{ asset('assets/images/jym-postlol.png') }}"
            alt="Loading Icon"
        >

    </div>
    <!-- Main Image with Logo -->
    <div class="main-image-wrapper">
        @if ($home_img)
            <img
                class="main-image"
                src="{{ asset($home_img->image) }}"
                alt="Main Image"
            >
        @endif
        <img
            class="logo"
            src="{{ asset('assets/images/jym-postlol.png') }}"
            alt="Logo"
        >
    </div>

    <!-- Content Section -->
    <div class="content-section">
        <div class="text">
            <p class="line">Bij Jim Barbershop draait alles om de kunst van mannenverzorging. Onze barbershop biedt
                een verfijnde en stijlvolle omgeving waar mannen terecht kunnen voor de beste knip- en
                scheerbehandelingen. Wij zijn gespecialiseerd in klassieke en moderne kapsels, strakke baardlijnen en
                ultieme verzorgingsproducten om jou er op je best uit te laten zien.</p>
            <br>

            <p class="line">Plan vandaag nog je afspraak en laat je verwennen door de experts van Jim Barbershop.</p>
        </div>
        <h2> onze diensten</h2>
        @foreach ($services->chunk(3) as $chunk)
            <div class="columns">
                @foreach ($chunk as $service)
                    <div class="column">
                        <img
                            src="{{ $service->image }}"
                            alt="Service Image"
                        >
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->price }}
                            @if (!is_null($service->max_price))
                                - {{ $service->max_price }}
                            @endif {{ $service->currency }}
                        </p>
                        <a
                            class="button"
                            href="{{ route('books.show', $service->id) }}"
                        >Bouk Nu</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <section class="opening-hours-section">
        <div class="content-section">
            <table class="opening-hours-table">
                @foreach ($schedual_date as $date)
                    <tr>
                        <td class="left"> {{ $date->day }}</td>
                        <td class="right">{{ $date->day }}</td>
                    </tr>
                @endforeach


            </table>
        </div>
    </section>
    <div class="testimonial-container">
        <div class="testimonial">
            <div class="testimonial-content">
                <img
                    class="testimonial-img2"
                    src="{{ asset('assets/images/Untitled-1.png') }}"
                    alt="Person 2"
                >
                <div class="testimonial-text">
                    <h3 id="testimonial-name">tymen vererfven</h3>
                    <div class="stars">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <p id="testimonial-review">Vriendelijke kappers en een vlotte service! Ze hebben er alvast 1 extra
                        tevreden klant bij.</p>
                </div>
            </div>
        </div>
        <div class="dots2">
            <span
                class="dot2"
                onclick="showSlide(1)"
            ></span>
            <span
                class="dot2"
                onclick="showSlide(2)"
            ></span>
            <span
                class="dot2"
                onclick="showSlide(3)"
            ></span>
        </div>
    </div>

    <div class="map-section">
        <!-- Insert the Google Maps iframe embed code here -->
        <iframe
            src="https://maps.google.com/maps?q=Stormestraat%20123%2C%20Waregem%208790%2C%20Jim%20barbershop&amp;t=m&amp;z=11&amp;output=embed&amp;iwloc=near"
            title="Stormestraat 123, Waregem 8790, Jim barbershop"
            aria-label="Stormestraat 123, Waregem 8790, Jim barbershop"
            loading="lazy"
        ></iframe>
    </div>
    </div>
    <div class="footer">
        <img
            src="{{ asset('assets/images/jym-postlol.png') }}"
            alt="Logo"
        > <!-- Replace with your logo path -->
        <div class="line"></div>
        <div class="social-icons">
            <a
                href="https://www.facebook.com/profile.php?id=100092536564619&mibextid=ZbWKwL"
                target="_blank"
            ><i class="fab fa-facebook"></i></a>
            <a
                href="https://www.instagram.com/jim_barber_shop__/"
                target="_blank"
            ><i class="fab fa-instagram"></i></a>
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

    function showSlide(index) {
        // Data arrays for different slides
        const names = ["Mat Esuz", "Leman Aäron", "tymen vererfven"]; // Replace with actual names
        const reviews = [
            "volledige service!",
            "Heel vriendelijke en goede bediening! Perfect voor haar en baard!",
            "Vriendelijke kappers en een vlotte service! Ze hebben er alvast 1 extra tevreden klant bij.",


        ]; // Replace with actual reviews

        // Update content based on the index
        document.getElementById("testimonial-name").textContent = names[index - 1];
        document.getElementById("testimonial-review").textContent = reviews[index - 1];

        // Update dot active class
        const dots = document.getElementsByClassName("dot2");
        for (let i = 0; i < dots.length; i++) {
            dots[i].classList.remove("active"); // Remove the active class from all dots
        }
        dots[index - 1].classList.add("active");
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lines = document.querySelectorAll('.line');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, {
            threshold: 0.3
        }); /* Adjust threshold */

        lines.forEach(line => {
            observer.observe(line);
        });


        let startX = 0;
        let endX = 0;
        const testimonialContainer = document.querySelector('.testimonial-container');
        const totalSlides = 3; // Update this based on the total number of slides

        testimonialContainer.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
        });

        testimonialContainer.addEventListener('touchmove', function(e) {
            endX = e.touches[0].clientX;
        });

        testimonialContainer.addEventListener('touchend', function() {
            let index = Array.from(document.getElementsByClassName('dot2')).findIndex(dot => dot
                .classList.contains('active')) + 1;

            if (startX > endX + 50) { // Swipe left
                index = index === totalSlides ? 1 : index + 1;
            } else if (startX < endX - 50) { // Swipe right
                index = index === 1 ? totalSlides : index - 1;
            }

            showSlide(index);
        });
    });
</script>

</html>
