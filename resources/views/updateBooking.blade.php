<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jim-barbershop.com - Barber Shop</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/jym post.svg') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
         
        }
        .details {
      margin: 20px auto; /* Center horizontally with auto margins and 20px top and bottom margin */
      padding: 10px; /* Add padding for spacing */
      width: 80%; /* Adjust the width as needed, e.g., 80% for responsiveness */
      max-width: 600px; /* Set a maximum width for larger screens */
      box-sizing: border-box; /* Include padding and borders in the element's width */
      text-align: center; /* Center text inside */
      font-size: 25px;
      font-weight: bold;
      color: #444;
    }
    .details p {
        word-wrap: break-word; /* Ensure long text wraps within the container */
        margin: 0; /* Remove any additional margins */
    }
    .details p:nth-child(2) {
        margin-left: 0; /* Adjust or reset margin-left */
    }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }
          /* Calendar Header */
        .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
       padding: 10px;
        background-color: #000;
        color: white;
        border-radius: 20px;
       }
     .calendar-body {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        padding: 10px;
        border: 1px solid #000;
        border-radius: 20px;
    }
   .calendar-header button {
       background: none;
       border: none;
       color: white;
      font-size: 20px;
       cursor: pointer;
    }

    /* Calendar Days */
    .calendar-day {
       position: relative;
       display: inline-block;
       width: 40px;
       height: 40px;
       text-align: center;
      line-height: 40px;
      margin: 2px;
      border-radius: 50%;
      cursor: pointer;
      border: 1px solid transparent;
     transition: background-color 0.3s, color 0.3s;
   }

   .calendar-day.selected,
   .calendar-day:hover {
      background-color: #333;
      color: white;
      border-color: #333;
     }

    .timepicker {
            grid-column: 2;
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
            height: 300px;
            margin-top: 40px;
        }

        .timepicker div {
            width: 100px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000;
            border-radius: 20px;
            cursor: pointer;
            margin: 0;
        }
     .timepicker div:hover,
     .timepicker div.selected {
       background-color: #333;
       color: white;
    }

    .highlight {
      background-color: #e0e0e0;
       color: #666;
      cursor: not-allowed;
    }

   /* Disabled Styles */
    .disabled {
       background-color: #f5f5f5;
       color: #b0b0b0;
       cursor: not-allowed;
    }

   .show-all {
       width: 100%;
       padding: 10px;
       background-color: #000;
       color: white;
       border: none;
       border-radius: 5px;
       cursor: pointer;
       transition: background-color 0.3s;
    }

    .show-all:hover {
       background-color: #444;
    }



      
    .calendar-day.outside {
         color: #ccc;
    }

    .calendar-weekdays {
        display: grid;
         grid-template-columns: repeat(7, 1fr);
        color: #000;
         padding: 10px;
        font-weight: bold;
            
    }

    .calendar-weekdays div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .booking-info {
         grid-column: 3 / 4;
        display: flex;
         flex-direction: column;
         justify-content: center;
         margin-top: -200px;
    }

    .booking-info span {
        display: block;
         margin-bottom: 5px;
    }

        
    .design-placeholder{
        grid-column: 2 / 3;
        display: inline;
         flex-direction: column;
         justify-content: center;
         margin-top: -100px;
     }

      

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }
        

        .button.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #fff;
            position: relative;
        }
      
        .center-content {
            text-align: center;
            flex-grow: 1;
        }

         .logo h1 {
            font-size: 36px;
            line-height: 1.2;
            margin: 0;
        }
        .logo svg{
            width:200px;
            height: 150px;
            padding-top: 20px;
        }

        .logo p {
            font-size: 14px;
            margin: 0;
            color: #666;
            letter-spacing: 1px;
        }
        .nav-links {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            font-weight: 400;
        }

        .header-icons {
            position: absolute;
            right: 40px;
            display: flex;
            margin-right: -120px;
            align-items: center;
            gap: 20px;
        }

        .header-icons a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-size: 16px;
        }

        .header-icons img {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .header-icons span {
            font-weight: 400;
        }
        .form-container {
          display: flex;
          width: 350px;
         margin: 0 ;
         font-family: Arial, sans-serif;
         padding: 20px;
         background-color: #fff;

        }

    .line-1  {
       width: 2px;
       background-color: #000;
       margin-right: 20px;
       margin-left: -35px;

    }

    .form-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .container-19 {
       display: flex;
      flex-direction: column;
      gap: 20px;
      }

        .naam,
        .emailadres,
        .telefoonnummer {
           font-size: 16px;
           font-weight: bold;
            margin-bottom: 5px;
        }

        .container-13 {
           display: flex;
           gap: 10px;
        }

        .rectangle-12,
        .rectangle-17,
        .rectangle-13,
        .rectangle-14 {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
             box-sizing: border-box;
        }

        .rectangle-12,
        .rectangle-17 {
         flex: 1;
        }

        .container-20 {
          display: flex;
          gap: 10px;
          align-items: center;
        }



        .container-11 {
          font-weight: bold;
        }

         .container-7 {
           text-align: right;
           margin-top: 20px;
        }

       .volgende {
          background-color:#ff4d4d;;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 20px;
          cursor: pointer;
          font-size: 16px;
          transition: background-color 0.3s ease; /* Smooth transition for color change */

        }

       .volgende:hover {
        background-color: #cc0000;
        }
       select{
          width: 100px;
         background-color: #f0f0f0;
         padding: 10px;
         border-radius: 20px;            
          
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
            z-index: 9999; /* Ensure the loader is above everything */
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
            margin-left:-180px;
             
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
            0%,60%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
               transform: translateY(-15px);
             }
        }
        .calendar-header .preMo {
          text-align: right; /* Right align */
          margin-right: auto; /* Push to the right */
        }

       .calendar-header .nextMo {
         text-align: left; /* Left align */
        margin-left: auto; /* Push to the left */
       }
       
/* For devices with a max width of 768px */
@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr 1fr; /* Two columns layout */
    }

    .calendar-header {
        flex-direction: column;
        align-items: center;
    }

    .calendar-body,
    .calendar-weekdays {
        grid-template-columns: repeat(4, 1fr); /* Adjust grid for tablets */
    }

    .button {
        padding: 12px 24px;
        font-size: 16px;
    }

    .form-container {
        padding: 15px;
    }
    .preloader-site-title {
                font-size: 2rem; /* Smaller font size on tablets */
            }
}
@media (max-width: 480px) {   
        
    .preloader-plus {
        display: flex;
        flex-direction: column; /* Stack elements vertically */
        align-items: center; /* Center align elements horizontally */
        justify-content: center; /* Center align elements vertically */
        height: 100vh; /* Ensure it takes up the full screen height */
        padding: 20px; /* Add padding for spacing */
        box-sizing: border-box; /* Ensure padding is included in the height and width calculations */
    }

    .dots {
        display: flex;
        justify-content: center; /* Center the dots horizontally */
        margin-bottom: 20px; /* Add space between the dots and the image */
    }

    .preloader-custom-img {
        width: 120px; /* Adjust width for small screens */
        height: 60px; /* Adjust height for small screens */
        margin: 0; /* Remove any additional margins */
    }

    .dot {
        width: 15px;
        height: 15px;
        margin: 0 5px;
        background-color: #333;
        border-radius: 50%;
        animation: bounce 1s infinite;
    }   
    .container {
        display: flex;
        flex-direction: column;
        gap: 20px; 
        overflow: visible; /* Allow overflow to be visible */
        padding-bottom: 20px; 
    }

    .calendar {
        width: 100%; /* Full width for the calendar */
        max-width: 320px; /* Set a maximum width to prevent it from being too wide */
        margin: 0 auto; /* Center align the calendar within the container */
        padding-right: 15px; /* Add padding to the right side */
        grid-column: 1 / -1; /* Span full width */
    }

    .calendar-body {
        grid-template-columns: repeat(7, 1fr); /* Ensure 7 columns */
        gap: 5px; /* Small gap between days */
        padding: 10px; /* Decrease padding for the calendar body to fit better on small screens */
    }

    .calendar-weekdays {
        grid-template-columns: repeat(7, 1fr); /* Ensure 7 columns */
        padding: 8px 0; /* Adjust padding for weekdays */
        border-radius: 10px; /* Add border-radius */
    }

    .calendar-weekdays div {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px 0; /* Adjust padding inside each weekday cell */
    }

    .calendar-day {
        width: auto; /* Adjust width to auto for responsiveness */
        height: 40px; /* Adjust height to maintain a square shape */
        padding: 5px; /* Add padding for better spacing */
        font-size: 12px; /* Adjust font size for readability */
        text-align: center; /* Center text */
        border-radius: 50%; /* Keep the circular shape */
        box-sizing: border-box; /* Include padding and border in element's width and height */
    }

    .disabled {
        background-color: #f5f5f5;
        color: #b0b0b0;
        cursor: not-allowed;
        width: 100%; /* Ensure it takes the full width of its container */
        height: 100%; /* Ensure it fills the height */
    }
    .selected {
       background-color: #333;
       color: white;
       width: 100%; /* Ensure it takes the full width of its container */
        height: 100%; 
    }
    .timepicker {
        width: 100%; /* Full width for timepicker */
        max-width: 320px; /* Set a maximum width to prevent it from being too wide */
        margin: 0 auto; /* Center align the timepicker within the container */
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Space between time slots */
        justify-content: center; /* Center the time slots */
    }

    .form-container {
        width: 100%; /* Full width for form container */
        max-width: 320px; /* Set a maximum width to prevent it from being too wide */
        margin: 0 auto; /* Center align the form within the container */
    }
    .logo {
       display: flex;
       justify-content: center; /* Center horizontally */
       align-items: center; /* Center vertically if needed */
       margin: 20px 0; /* Add vertical margin if needed */
    }

    /* Logo styling */
    .logo svg {
       width: 150px; /* Adjust width */
       height: 80px; /* Adjust height */
       margin: 0; /* Reset margin if needed */
    }
    

    .details {
      margin: 20px auto; /* Center horizontally with auto margins and 20px top and bottom margin */
      padding: 10px; /* Add padding for spacing */
      width: 80%; /* Adjust the width as needed, e.g., 80% for responsiveness */
      max-width: 600px; /* Set a maximum width for larger screens */
      box-sizing: border-box; /* Include padding and borders in the element's width */
      text-align: center; /* Center text inside */
    }
    .details p {
        word-wrap: break-word; /* Ensure long text wraps within the container */
        margin: 0; /* Remove any additional margins */
    }
    .details p:nth-child(2) {
        margin-left: 0; /* Adjust or reset margin-left */
    }
    .calendar-header {
        flex-direction: column; /* Stack items vertically on small screens */
        align-items: center; /* Center align items */
        padding: 15px; /* Increase padding for better spacing */
        border-radius: 10px; /* Adjust border radius for smaller screens */
    }
    
    .calendar-header .preMo {
          text-align: right; /* Right align */
          margin-right: auto; /* Push to the right */
          margin-bottom: -18px;
        }

    .calendar-header .nextMo {
         text-align: left; /* Left align */
         margin-left: auto; /* Push to the left */
         margin-top: -18px;
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
                <img src="{{ asset('assets/images/jym-postlol.png') }}" alt="Loading Icon" class="preloader-custom-img">
                
            </div>
        <header>
            <div class="header-container">
                <div class="center-content">
                    <div class="logo">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080 1080">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #1d1c1a;
                                    }
                                  </style>
                                </defs>
                                <path class="cls-1" d="M185.21,783.04v-3.02h6.34c5.64,0,11.33-1.71,17.07-5.14,5.74-3.43,10.52-9.02,14.35-16.77,3.82-7.76,5.74-18.28,5.74-31.57v-211.8c0-4.43-.66-7.86-1.97-10.27-1.31-2.42-2.98-4.13-4.99-5.14-2.01-1.01-4.13-1.51-6.35-1.51h-14.8v-3.02h110.88v3.02h-14.5c-2.22,0-4.38,.51-6.5,1.51-2.12,1.01-3.83,2.77-5.14,5.29-1.31,2.52-1.97,6.09-1.97,10.72v195.18c0,13.7-2.42,25.18-7.25,34.44-4.83,9.26-11.33,16.67-19.49,22.21-8.15,5.54-17.27,9.57-27.34,12.09-10.08,2.52-20.45,3.78-31.12,3.78h-12.99Z"/>
                                <path class="cls-1" d="M324.19,783.04v-4.03h17.36c4.57,0,8.34-.61,11.3-1.82,2.96-1.21,5.18-3.43,6.67-6.66,1.47-3.23,2.22-7.8,2.22-13.72v-234.55c0-6.46-.75-11.3-2.22-14.53-1.48-3.23-3.71-5.51-6.67-6.86-2.96-1.34-6.73-2.02-11.3-2.02h-17.36v-4.04h148.15v4.04h-17.76c-4.31,0-7.94,.68-10.91,2.02-2.96,1.35-5.18,3.63-6.66,6.86-1.48,3.23-2.22,8.21-2.22,14.94v233.74c0,5.92,.74,10.57,2.22,13.93,1.48,3.37,3.7,5.65,6.66,6.86,2.96,1.21,6.59,1.82,10.91,1.82h17.76v4.03h-148.15Z"/>
                                <path class="cls-1" d="M491.73,783.04v-4.03h27.45c4.3,0,8.14-.67,11.51-2.02,3.36-1.34,5.98-3.69,7.87-7.06,1.88-3.36,2.83-8,2.83-13.93v-233.74c0-6.19-.88-10.96-2.63-14.33-1.75-3.36-4.03-5.72-6.86-7.07-2.83-1.34-5.99-2.02-9.49-2.02h-30.68v-4.04h123.12l72.27,205.08,62.97-205.08h109v4.04h-19.37c-2.97,0-5.86,.68-8.68,2.02-2.83,1.35-5.05,3.63-6.66,6.86-1.62,3.23-2.42,7.81-2.42,13.73v235.35c0,5.65,.74,10.09,2.22,13.32,1.48,3.23,3.77,5.52,6.86,6.86,3.09,1.35,6.66,2.02,10.7,2.02h17.36v4.03h-138.06v-4.03h5.25c5.65,0,10.23-.67,13.72-2.02,3.5-1.34,6.06-3.77,7.67-7.26,1.62-3.49,2.42-8.34,2.42-14.53v-246.26l-84.37,274.11h-26.24l-94.06-268.46v239.39c0,7.27,1.22,12.72,3.63,16.35,2.42,3.63,5.86,5.99,10.29,7.07,4.45,1.08,9.89,1.61,16.35,1.61h18.98v4.03h-102.94Z"/>
                                <path class="cls-1" d="M84,875.95c3.91-.82,10.07-1.43,16.33-1.43,8.94,0,14.69,1.54,19.01,5.03,3.6,2.67,5.75,6.78,5.75,12.22,0,6.68-4.42,12.54-11.71,15.21v.21c6.58,1.64,14.28,7.09,14.28,17.36,0,5.96-2.37,10.48-5.86,13.87-4.83,4.42-12.63,6.47-23.93,6.47-6.16,0-10.89-.41-13.87-.82v-68.11Zm8.94,28.36h8.11c9.45,0,15-4.94,15-11.61,0-8.11-6.16-11.3-15.21-11.3-4.11,0-6.47,.31-7.91,.62v22.3Zm0,33.18c1.75,.3,4.31,.41,7.5,.41,9.25,0,17.77-3.39,17.77-13.45,0-9.46-8.12-13.36-17.88-13.36h-7.39v26.4Z"/>
                                <path class="cls-1" d="M183.26,922.49l-7.19,21.78h-9.25l23.53-69.24h10.79l23.63,69.24h-9.55l-7.39-21.78h-24.56Zm22.71-6.99l-6.78-19.93c-1.54-4.52-2.57-8.63-3.6-12.64h-.21c-1.03,4.11-2.16,8.32-3.49,12.53l-6.78,20.04h20.86Z"/>
                                <path class="cls-1" d="M267.33,875.95c4.52-.92,11-1.43,17.16-1.43,9.55,0,15.72,1.75,20.03,5.65,3.49,3.08,5.44,7.8,5.44,13.15,0,9.14-5.75,15.2-13.05,17.66v.31c5.34,1.85,8.53,6.77,10.17,13.97,2.26,9.66,3.91,16.34,5.34,19.01h-9.25c-1.13-1.95-2.67-7.91-4.62-16.54-2.06-9.56-5.75-13.15-13.87-13.46h-8.42v30h-8.94v-68.32Zm8.94,31.54h9.14c9.55,0,15.62-5.24,15.62-13.15,0-8.94-6.47-12.84-15.93-12.94-4.31,0-7.39,.41-8.83,.82v25.27Z"/>
                                <path class="cls-1" d="M354.98,875.95c3.91-.82,10.07-1.43,16.33-1.43,8.94,0,14.69,1.54,19.01,5.03,3.6,2.67,5.75,6.78,5.75,12.22,0,6.68-4.42,12.54-11.71,15.21v.21c6.58,1.64,14.28,7.09,14.28,17.36,0,5.96-2.37,10.48-5.86,13.87-4.83,4.42-12.63,6.47-23.93,6.47-6.16,0-10.89-.41-13.87-.82v-68.11Zm8.94,28.36h8.11c9.45,0,15-4.94,15-11.61,0-8.11-6.16-11.3-15.21-11.3-4.11,0-6.47,.31-7.91,.62v22.3Zm0,33.18c1.75,.3,4.31,.41,7.5,.41,9.25,0,17.77-3.39,17.77-13.45,0-9.46-8.12-13.36-17.88-13.36h-7.39v26.4Z"/>
                                <polygon class="cls-1" points="478.9 911.8 451.99 911.8 451.99 936.77 481.99 936.77 481.99 944.27 443.05 944.27 443.05 875.03 480.44 875.03 480.44 882.52 451.99 882.52 451.99 904.41 478.9 904.41 478.9 911.8"/>
                                <path class="cls-1" d="M525.98,875.95c4.52-.92,11-1.43,17.16-1.43,9.55,0,15.72,1.75,20.03,5.65,3.49,3.08,5.44,7.8,5.44,13.15,0,9.14-5.75,15.2-13.05,17.66v.31c5.34,1.85,8.53,6.77,10.17,13.97,2.26,9.66,3.91,16.34,5.34,19.01h-9.25c-1.13-1.95-2.67-7.91-4.62-16.54-2.06-9.56-5.75-13.15-13.87-13.46h-8.42v30h-8.94v-68.32Zm8.94,31.54h9.14c9.55,0,15.62-5.24,15.62-13.15,0-8.94-6.47-12.84-15.93-12.94-4.31,0-7.39,.41-8.83,.82v25.27Z"/>
                                <path class="cls-1" d="M666.56,933.38c4.01,2.47,9.86,4.52,16.02,4.52,9.15,0,14.48-4.83,14.48-11.81,0-6.47-3.69-10.17-13.05-13.77-11.3-4-18.29-9.86-18.29-19.62,0-10.79,8.94-18.8,22.4-18.8,7.09,0,12.22,1.64,15.31,3.39l-2.47,7.3c-2.26-1.24-6.88-3.29-13.15-3.29-9.45,0-13.05,5.64-13.05,10.37,0,6.48,4.21,9.66,13.77,13.36,11.71,4.52,17.67,10.17,17.67,20.34,0,10.68-7.91,19.93-24.24,19.93-6.68,0-13.97-1.95-17.67-4.42l2.26-7.51Z"/>
                                <polygon class="cls-1" points="759.76 875.03 759.76 903.99 793.25 903.99 793.25 875.03 802.29 875.03 802.29 944.27 793.25 944.27 793.25 911.8 759.76 911.8 759.76 944.27 750.82 944.27 750.82 875.03 759.76 875.03"/>
                                <path class="cls-1" d="M909.37,908.93c0,23.83-14.48,36.47-32.15,36.47s-31.13-14.18-31.13-35.13c0-21.98,13.66-36.37,32.15-36.37s31.13,14.48,31.13,35.03m-53.73,1.13c0,14.79,8.01,28.05,22.09,28.05s22.19-13.05,22.19-28.76c0-13.77-7.19-28.15-22.09-28.15s-22.19,13.67-22.19,28.87"/>
                                <path class="cls-1" d="M953.37,875.85c4.32-.72,9.97-1.34,17.16-1.34,8.83,0,15.31,2.05,19.41,5.75,3.8,3.29,6.06,8.32,6.06,14.48s-1.85,11.2-5.34,14.8c-4.73,5.03-12.43,7.6-21.17,7.6-2.67,0-5.13-.1-7.19-.62v27.74h-8.94v-68.42Zm8.94,33.38c1.95,.51,4.42,.72,7.39,.72,10.79,0,17.36-5.23,17.36-14.79s-6.47-13.56-16.33-13.56c-3.91,0-6.88,.3-8.42,.72v26.92Z"/>
                                <path class="cls-1" d="M533.34,282.09c32.1,42.17,64.13,84.26,96.17,126.34-.13,.44-.25,.89-.38,1.33-1.7,0-3.46,.27-5.1-.04-13.45-2.59-23.58-10.68-31.91-20.81-13.49-16.4-26.32-33.34-39.42-50.06-11.46-14.63-22.92-29.27-35.11-44.85,0,1.65-.2,2.32,.03,2.53,3.86,3.61,2.22,6.59-.53,10.09-16.75,21.26-33.2,42.76-50.02,63.97-7.3,9.21-14.87,18.27-22.98,26.76-6.2,6.49-14.21,10.6-23.1,12.54-1.82,.4-3.8,.06-5.7,.06-.17-.41-.33-.82-.5-1.22,15.71-20.66,31.2-41.5,47.21-61.94,15.87-20.26,30.52-41.5,47.81-61.76-2.08-4.21-4.7-9.82-7.59-15.29-5.21-9.88-10.03-20.02-15.98-29.43-9.8-15.49-22.86-28.17-37.08-39.63-4.74-3.82-10.25-6.82-14.4-11.17-7.87-8.24-12.71-18.4-12.33-29.92,.2-6.03,2.57-12.09,4.59-17.93,.95-2.77,1.07-4.43-.66-7.06-2.87-4.38-5.52-9.22-6.74-14.24-.63-2.59,1.58-6.27,3.37-8.87,.73-1.06,3.74-.55,5.71-.76-.47,1.6-.45,3.76-1.51,4.68-3.2,2.76-2.96,6.36-1.7,9.22,1.38,3.13,4.21,5.7,6.71,8.21,.45,.45,2.56-.24,3.56-.92,13.94-9.49,27.87-7.37,40.92,1.17,15.5,10.15,22.84,25.06,20.75,43.68-1.38,12.37-8.14,21.22-20.2,25.46-5.65,1.98-6.71,4.62-2.74,9.29,7.34,8.62,15.28,16.73,22.61,25.36,7.9,9.3,15.35,18.98,23.07,28.44,2.14,2.63,4.52,5.06,7.34,7.24-.26-.59-.36-1.35-.8-1.75-3.63-3.26-2.51-6.5,.13-9.55,11.91-13.75,23.9-27.42,35.83-41.15,2.77-3.19,5.56-6.37,8.11-9.72,2.63-3.46,2.08-5.45-1.87-6.94-9.33-3.52-16.18-9.46-19.91-18.94-3.18-8.1-3.28-16.48-.97-24.44,3.66-12.6,11.48-22.52,23.27-28.74,12.65-6.67,25.3-8.3,37.84,.72,1.21,.87,4.39,.47,5.73-.55,5.93-4.55,6.33-10.6,1.87-16.64-.75-1.01-.48-2.77-.68-4.18,1.97,.15,4.53-.43,5.8,.59,3.91,3.13,4.84,10.27,2.22,14.86-1.79,3.14-4.31,5.87-6,9.06-.86,1.63-1.53,4.42-.73,5.72,12.35,19.79,.37,45.87-17.71,57.53-7.62,4.91-14.46,11.19-21.06,17.48-15.06,14.34-26.09,31.54-34.36,50.56-1.73,3.99-3.51,7.99-5.67,11.74-.82,1.42-2.81,2.18-5.2,3.92m45-85.5c19.49,1.16,39.19-21.17,35.69-42.79-2.79-17.25-21.15-24.45-36.12-17.74-12.75,5.71-20.17,15.83-23.28,29.64-3,13.34,5.15,32.1,23.71,30.89m-112.1,.13c13.66,.87,24.54-10.62,24.32-25.53-.22-14.84-11.49-30.45-25.56-35.53-14.7-5.3-29.87,.04-33.79,15.61-5.86,23.25,14.94,46.42,35.03,45.45"/>
                              </svg>
                        
                    </div>
                    
                </div>
    
               
            </div>
        </header>
        <div class="details">
                <p class="name">{{$booking->service_name}}</p>
                <p class="name"> {{$booking->service_price}} {{$booking->service_currency}}</p>
                
        </div>
    
        <div class="container">
            <div class="calendar">
                <div class="calendar-header">
                    <button class="preMo" id="prevMonth">&lt;</button>
                    <div id="currentMonth">Augustus 2024</div>
                    <button class="nextMo" id="nextMonth">&gt;</button>
                </div>
                <div class="calendar-weekdays">
                    <div>Ma</div>
                    <div>Di</div>
                    <div>Wo</div>
                    <div>Do</div>
                    <div>Vr</div>
                    <div>Za</div>
                    <div>Zo</div>
                </div>
                <div class="calendar-body" id="calendarBody">
                    <!-- Calendar days will be populated here -->
                </div>
                <div>
                    <p><strong>Geselecteerde datum:</strong> <span id="displayedDate">{{ $bookingDay }} {{ $bookingMonth }} {{ $bookingYear }}</span></p>
                    <p><strong>Geselecteerde tijd:</strong> <span id="displayedTime">{{$booking->time}}</span></p>
                </div>
                    
            </div>
   
        <div class="timepicker" id="timepicker">
            <!-- Time slots will be populated here -->
        </div>
        {{-- <div class="design-placeholder" id="design_placeholder">
            <span><strong id="placeholder-date">{{$booking->date}}</strong></span>
           <span>{{$booking->time}}</span>
        </div> --}}
  
        
        <div class="form-container">
            <div class="line-1"></div>
           
            <form id="bookingForm" action="" method="PUT">
                @csrf
                <input type="hidden" name="selected_date" id="hidden-date">
                 <input type="hidden" name="selected_time" id="hidden-time">
                 <input type="hidden" name="service_name" value="{{$booking->service_name}}">
                 <input type="hidden" name="service_price" value="{{$booking->service_price}}">
                 <input type="hidden" name="service_currency" value="{{$booking->service_currency}}">
                <div class="form-content">
                    <div class="container-19">
                        <div class="naam">Naam</div>
                        <div class="container-13">
                            <input type="first_name" name="first_name" class="rectangle-12" placeholder="Voornaam" readonly value="{{$booking->first_name}}">
                            <input type="last_name" name="last_name" class="rectangle-17" placeholder="Achternaam" readonly value="{{$booking->last_name}}">
                        </div>
                        <div class="emailadres">E-mailadres</div>
                        <input type="email" name="email" class="rectangle-13" placeholder="E-mailadres" readonly value="{{$booking->email}}">
                        <div class="telefoonnummer">Telefoonnummer</div>
                        <div class="container-20">
                            <div class="country-code">
                                    <select id="code" name="code" readonly>
                                            <option value="+1">+1 (United States)</option>
                                            <option value="+7">+7 (Russia)</option>
                                            <option value="+20">+20 (Egypt)</option>
                                            <option value="+27">+27 (South Africa)</option>
                                            <option value="+30">+30 (Greece)</option>
                                            <option value="+31">+31 (Netherlands)</option>
                                            <option value="+32" selected>+32 (Belgium)</option>
                                            <option value="+33">+33 (France)</option>
                                            <option value="+34">+34 (Spain)</option>
                                            <option value="+39">+39 (Italy)</option>
                                            <option value="+44">+44 (United Kingdom)</option>
                                            <option value="+49">+49 (Germany)</option>
                                            <option value="+52">+52 (Mexico)</option>
                                            <option value="+55">+55 (Brazil)</option>
                                            <option value="+61">+61 (Australia)</option>
                                            <option value="+62">+62 (Indonesia)</option>
                                            <option value="+64">+64 (New Zealand)</option>
                                            <option value="+65">+65 (Singapore)</option>
                                            <option value="+81">+81 (Japan)</option>
                                            <option value="+82">+82 (South Korea)</option>
                                            <option value="+86">+86 (China)</option>
                                            <option value="+91">+91 (India)</option>
                                            <option value="+92">+92 (Pakistan)</option>
                                            <option value="+93">+93 (Afghanistan)</option>
                                            <option value="+94">+94 (Sri Lanka)</option>
                                            <option value="+95">+95 (Myanmar)</option>
                                            <option value="+98">+98 (Iran)</option>
                                            <option value="+211">+211 (South Sudan)</option>
                                            <option value="+212">+212 (Morocco)</option>
                                            <option value="+213">+213 (Algeria)</option>
                                            <option value="+216">+216 (Tunisia)</option>
                                            <option value="+218">+218 (Libya)</option>
                                            <option value="+220">+220 (Gambia)</option>
                                            <option value="+221">+221 (Senegal)</option>
                                            <option value="+222">+222 (Mauritania)</option>
                                            <option value="+223">+223 (Mali)</option>
                                            <option value="+224">+224 (Guinea)</option>
                                            <option value="+225">+225 (Ivory Coast)</option>
                                            <option value="+226">+226 (Burkina Faso)</option>
                                            <option value="+227">+227 (Niger)</option>
                                            <option value="+228">+228 (Togo)</option>
                                            <option value="+229">+229 (Benin)</option>
                                            <option value="+230">+230 (Mauritius)</option>
                                            <option value="+231">+231 (Liberia)</option>
                                            <option value="+232">+232 (Sierra Leone)</option>
                                            <option value="+233">+233 (Ghana)</option>
                                            <option value="+234">+234 (Nigeria)</option>
                                            <option value="+235">+235 (Chad)</option>
                                            <option value="+236">+236 (Central African Republic)</option>
                                            <option value="+237">+237 (Cameroon)</option>
                                            <option value="+238">+238 (Cape Verde)</option>
                                            <option value="+239">+239 (Sأ£o Tomأ© and Prأ­ncipe)</option>
                                            <option value="+240">+240 (Equatorial Guinea)</option>
                                            <option value="+241">+241 (Gabon)</option>
                                            <option value="+242">+242 (Republic of the Congo)</option>
                                            <option value="+243">+243 (Democratic Republic of the Congo)</option>
                                            <option value="+244">+244 (Angola)</option>
                                            <option value="+245">+245 (Guinea-Bissau)</option>
                                            <option value="+246">+246 (British Indian Ocean Territory)</option>
                                            <option value="+248">+248 (Seychelles)</option>
                                            <option value="+249">+249 (Sudan)</option>
                                            <option value="+250">+250 (Rwanda)</option>
                                            <option value="+251">+251 (Ethiopia)</option>
                                            <option value="+252">+252 (Somalia)</option>
                                            <option value="+253">+253 (Djibouti)</option>
                                            <option value="+254">+254 (Kenya)</option>
                                            <option value="+255">+255 (Tanzania)</option>
                                            <option value="+256">+256 (Uganda)</option>
                                            <option value="+257">+257 (Burundi)</option>
                                            <option value="+258">+258 (Mozambique)</option>
                                            <option value="+260">+260 (Zambia)</option>
                                            <option value="+261">+261 (Madagascar)</option>
                                            <option value="+262">+262 (Rأ©union)</option>
                                            <option value="+263">+263 (Zimbabwe)</option>
                                            <option value="+264">+264 (Namibia)</option>
                                            <option value="+265">+265 (Malawi)</option>
                                            <option value="+266">+266 (Lesotho)</option>
                                            <option value="+267">+267 (Botswana)</option>
                                            <option value="+268">+268 (Eswatini)</option>
                                            <option value="+269">+269 (Comoros)</option>
                                            <option value="+290">+290 (Saint Helena)</option>
                                            <option value="+291">+291 (Eritrea)</option>
                                            <option value="+297">+297 (Aruba)</option>
                                            <option value="+298">+298 (Faroe Islands)</option>
                                            <option value="+299">+299 (Greenland)</option>
                                            <option value="+350">+350 (Gibraltar)</option>
                                            <option value="+351">+351 (Portugal)</option>
                                            <option value="+352">+352 (Luxembourg)</option>
                                            <option value="+353">+353 (Ireland)</option>
                                            <option value="+354">+354 (Iceland)</option>
                                            <option value="+355">+355 (Albania)</option>
                                            <option value="+356">+356 (Malta)</option>
                                            <option value="+357">+357 (Cyprus)</option>
                                            <option value="+358">+358 (Finland)</option>
                                            <option value="+359">+359 (Bulgaria)</option>
                                            <option value="+370">+370 (Lithuania)</option>
                                            <option value="+371">+371 (Latvia)</option>
                                            <option value="+372">+372 (Estonia)</option>
                                            <option value="+373">+373 (Moldova)</option>
                                            <option value="+374">+374 (Armenia)</option>
                                            <option value="+375">+375 (Belarus)</option>
                                            <option value="+376">+376 (Andorra)</option>
                                            <option value="+377">+377 (Monaco)</option>
                                            <option value="+378">+378 (San Marino)</option>
                                            <option value="+380">+380 (Ukraine)</option>
                                            <option value="+381">+381 (Serbia)</option>
                                            <option value="+382">+382 (Montenegro)</option>
                                            <option value="+383">+383 (Kosovo)</option>
                                            <option value="+385">+385 (Croatia)</option>
                                            <option value="+386">+386 (Slovenia)</option>
                                            <option value="+387">+387 (Bosnia and Herzegovina)</option>
                                            <option value="+389">+389 (North Macedonia)</option>
                                            <option value="+420">+420 (Czech Republic)</option>
                                            <option value="+421">+421 (Slovakia)</option>
                                            <option value="+423">+423 (Liechtenstein)</option>
                                            <option value="+500">+500 (Falkland Islands)</option>
                                            <option value="+501">+501 (Belize)</option>
                                            <option value="+502">+502 (Guatemala)</option>
                                            <option value="+503">+503 (El Salvador)</option>
                                            <option value="+504">+504 (Honduras)</option>
                                            <option value="+505">+505 (Nicaragua)</option>
                                            <option value="+506">+506 (Costa Rica)</option>
                                            <option value="+507">+507 (Panama)</option>
                                            <option value="+508">+508 (Saint Pierre and Miquelon)</option>
                                            <option value="+509">+509 (Haiti)</option>
                                            <option value="+590">+590 (Guadeloupe)</option>
                                            <option value="+591">+591 (Bolivia)</option>
                                            <option value="+592">+592 (Guyana)</option>
                                            <option value="+593">+593 (Ecuador)</option>
                                            <option value="+594">+594 (French Guiana)</option>
                                            <option value="+595">+595 (Paraguay)</option>
                                            <option value="+596">+596 (Martinique)</option>
                                            <option value="+597">+597 (Suriname)</option>
                                            <option value="+598">+598 (Uruguay)</option>
                                            <option value="+599">+599 (Curaأ§ao)</option>
                                            <option value="+670">+670 (East Timor)</option>
                                            <option value="+672">+672 (Norfolk Island)</option>
                                            <option value="+673">+673 (Brunei)</option>
                                            <option value="+674">+674 (Nauru)</option>
                                            <option value="+675">+675 (Papua New Guinea)</option>
                                            <option value="+676">+676 (Tonga)</option>
                                            <option value="+677">+677 (Solomon Islands)</option>
                                            <option value="+678">+678 (Vanuatu)</option>
                                            <option value="+679">+679 (Fiji)</option>
                                            <option value="+680">+680 (Palau)</option>
                                            <option value="+681">+681 (Wallis and Futuna)</option>
                                            <option value="+682">+682 (Cook Islands)</option>
                                            <option value="+683">+683 (Niue)</option>
                                            <option value="+685">+685 (Samoa)</option>
                                            <option value="+686">+686 (Kiribati)</option>
                                            <option value="+687">+687 (New Caledonia)</option>
                                            <option value="+688">+688 (Tuvalu)</option>
                                            <option value="+689">+689 (French Polynesia)</option>
                                            <option value="+690">+690 (Tokelau)</option>
                                            <option value="+691">+691 (Micronesia)</option>
                                            <option value="+692">+692 (Marshall Islands)</option>
                                            <option value="+850">+850 (North Korea)</option>
                                            <option value="+852">+852 (Hong Kong)</option>
                                            <option value="+853">+853 (Macau)</option>
                                            <option value="+855">+855 (Cambodia)</option>
                                            <option value="+856">+856 (Laos)</option>
                                            <option value="+880">+880 (Bangladesh)</option>
                                            <option value="+886">+886 (Taiwan)</option>
                                            <option value="+960">+960 (Maldives)</option>
                                            <option value="+961">+961 (Lebanon)</option>
                                            <option value="+962">+962 (Jordan)</option>
                                            <option value="+963">+963 (Syria)</option>
                                            <option value="+964">+964 (Iraq)</option>
                                            <option value="+965">+965 (Kuwait)</option>
                                            <option value="+966">+966 (Saudi Arabia)</option>
                                            <option value="+967">+967 (Yemen)</option>
                                            <option value="+968">+968 (Oman)</option>
                                            <option value="+970">+970 (Palestine)</option>
                                            <option value="+971">+971 (United Arab Emirates)</option>
                                            <option value="+972">+972 (Israel)</option>
                                            <option value="+973">+973 (Bahrain)</option>
                                            <option value="+974">+974 (Qatar)</option>
                                            <option value="+975">+975 (Bhutan)</option>
                                            <option value="+976">+976 (Mongolia)</option>
                                            <option value="+977">+977 (Nepal)</option>
                                            <option value="+992">+992 (Tajikistan)</option>
                                            <option value="+993">+993 (Turkmenistan)</option>
                                            <option value="+994">+994 (Azerbaijan)</option>
                                            <option value="+995">+995 (Georgia)</option>
                                            <option value="+996">+996 (Kyrgyzstan)</option>
                                            <option value="+998">+998 (Uzbekistan)</option>
                                        </select>
                                        
                            </div>
                            <input type="tel" id="phone" name="phone" class="rectangle-14" placeholder="Telefoonnummer" readonly value="{{$booking->phone}}">
                        </div>
                    </div>
                    <div class="container-7">
                    </div>
                </div>
               
                <a href="#" id="delete-button" class="volgende">Verwijderen</a>


            </form>
            <form id="deleteForm" action="{{route('booking.destroy',$booking->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
            </form>
        </div>
    </div>
       
        

        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
              // JavaScript to hide loader after the page loads
    window.addEventListener('load', function() {
        // Hide the loader and show the main content
         document.querySelector('.preloader-plus').classList.add('complete');
         document.querySelector('.main-content').style.display = 'block';
         document.body.style.overflow = 'auto'; // Restore scroll when content is visible
    });
        const calendarDays = document.getElementById('calendarBody');
    const timepicker = document.getElementById('timepicker');
    const nextButton = document.getElementById('next-button');
    const currentMonthLabel = document.getElementById('currentMonth');
    const designPlaceholder = document.getElementById('design_placeholder');
    const placeholderDateInfo = document.getElementById('placeholder-date');
    const deleteButton = document.getElementById('delete-button');

    const hiddenDate = document.getElementById('hidden-date');
    const hiddenTime = document.getElementById('hidden-time');

    // Pass days data to JavaScript
    const daysData = @json($daysDataArray);

    // Set default date and time from the booking
    let defaultDate = new Date(@json($bookingDate));
    let defaultTime = @json($bookingTime);

    // Initialize currentDate to defaultDate
    let currentDate = new Date(defaultDate.getFullYear(), defaultDate.getMonth(), defaultDate.getDate());
    function populateTimeSlots(date) {
       timepicker.innerHTML = '';

       const maxVisibleSlots = 9; // Number of slots to show initially
       let isExpanded = false; // Track if all slots are shown

    // Get the times for the selected date
       const dayTimes = daysData[date] || [];

    // Function to render time slots based on visibility
      function renderTimeSlots() {
        timepicker.innerHTML = '';

        const slotsToShow = isExpanded ? dayTimes.length : Math.min(dayTimes.length, maxVisibleSlots);

        dayTimes.slice(0, slotsToShow).forEach(({ time, status }) => {
            const slotDiv = document.createElement('div');
            const formattedTime = time.slice(0, 5);

            slotDiv.textContent = formattedTime;
            if (status === 1) {
                if (formattedTime === defaultTime) {
                    slotDiv.classList.add('selected');
                    hiddenTime.value = slotDiv.textContent;
                }
                slotDiv.classList.add('highlight', 'disabled'); // Add custom class for highlighted slots when status is 1 and disable it
            } else {
                slotDiv.addEventListener('click', () => {
                    // Remove 'selected' class from all time slots
                    document.querySelectorAll('.timepicker div.selected').forEach(el => el.classList.remove('selected'));
                    // Add 'selected' class to the clicked time slot
                    slotDiv.classList.add('selected');

                    // Set hidden time value
                    hiddenTime.value = slotDiv.textContent; // This line sets the hidden time
                    console.log(`Selected time: ${slotDiv.textContent}`); // Debugging log
                });
                if (formattedTime === defaultTime) {
                    slotDiv.classList.add('selected');
                    hiddenTime.value = slotDiv.textContent;
                    // document.getElementById('displayedTime').textContent = slotDiv.textContent;
                }
                // Automatically select the default time if it matches
                
            }
            timepicker.appendChild(slotDiv);
        });

        if (dayTimes.length > maxVisibleSlots) {
            const showAllButton = document.createElement('button');
            showAllButton.classList.add('show-all');
            showAllButton.textContent = isExpanded ? 'Show Less' : 'Show All';
            showAllButton.addEventListener('click', () => {
                isExpanded = !isExpanded;
                renderTimeSlots();
            });
            timepicker.appendChild(showAllButton);
        }
    }

    renderTimeSlots();
}

// Function to handle selecting a date (modified to show designPlaceholder with formatted date)
function selectDate(dayDiv, isDisabledDay) {
    if (isDisabledDay) {
        return; // Do nothing if the day is disabled
    }

    // Get the date string from the data attribute
    const dateString = dayDiv.getAttribute('data-date');

    // Parse the date string to a JavaScript Date object
    const date = new Date(dateString);

    if (isNaN(date.getTime())) {
        console.error('Invalid date format:', dateString);
        return; // Exit if the date is invalid
    }

    // Update hiddenDate with the selected day
    hiddenDate.value = dateString;

    // Format the date to "weekday, day month year"
    const formattedDate = date.toLocaleDateString('nl-NL', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    // Update the displayed date in the UI
    // document.getElementById('displayedDate').textContent = formattedDate;

    populateTimeSlots(dateString);

    // If there's a default time, show it in the designPlaceholder
    if (hiddenTime.value) {
        document.getElementById('displayedTime').textContent = hiddenTime.value;
    }

    document.querySelector('.calendar-day.selected')?.classList.remove('selected');
    dayDiv.classList.add('selected');

    // Show design-placeholder with the selected date and time, and hide timepicker
    // designPlaceholder.style.display = 'flex';
    // placeholderDateInfo.textContent = `${formattedDate}, ${hiddenTime.value || ''}`;
    timepicker.style.display = 'none';
}

// Function to update the calendar and add event listeners to each day
function updateCalendar() {
    calendarDays.innerHTML = '';
    currentMonthLabel.textContent = currentDate.toLocaleDateString('nl-NL', {
        month: 'long',
        year: 'numeric'
    });

    const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

    // Start day of the week (0 for Sunday, 1 for Monday, etc.)
    const startDay = (firstDayOfMonth.getDay() + 6) % 7; // Adjusting to start week on Monday

    // Populate previous month's trailing days
    for (let i = 0; i < startDay; i++) {
        const emptyDiv = document.createElement('div');
        emptyDiv.className = 'calendar-day outside';
        calendarDays.appendChild(emptyDiv);
    }

    // Populate current month's days
    for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
        const dayDiv = document.createElement('div');
        dayDiv.className = 'calendar-day';
        dayDiv.textContent = day;

        // Use local date instead of UTC to avoid off-by-one errors
        const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
        const dateString = date.toLocaleDateString('en-CA'); // Format as "YYYY-MM-DD"

        // Disable all days except the defaultDate
        if (date.toDateString() === defaultDate.toDateString()) {
            dayDiv.classList.add('selected');
            selectDate(dayDiv, false); // Automatically select the default date
        } else {
            dayDiv.classList.add('disabled');
        }

        dayDiv.setAttribute('data-date', dateString);

        calendarDays.appendChild(dayDiv);
    }
}

// Initialization
document.addEventListener('DOMContentLoaded', function() {
    updateCalendar();

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });
    
    deleteButton.addEventListener('click', (e) => {
        document.getElementById('deleteForm').submit();
    });
    
    const calendarBody = document.getElementById('calendarBody');
    calendarBody.style.gridTemplateColumns = 'repeat(7, 1fr)';
});


            </script>
            
        
</body>

</html>