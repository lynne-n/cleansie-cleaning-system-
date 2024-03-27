<!DOCTYPE html>
<html>
<head>
    <title>Tank Cleaning Services</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: lightskyblue;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .header {
            width: 100%;
            background-color: none;
            color: black;
            text-align: center;
            padding: 0px 0;
        }
        .book-now-button {
            background-color: aqua;
            color: white;
            border-radius: 0;
            padding: 10px 40px;
            text-align: center;
            margin-top: 0px;
            cursor: pointer;
        }
        .book-now-button:hover{
            background-color:yellow;
        }
        .tank {
            width: 60%;
            margin: 20px;
            padding: 30px;
            background-color:rgba(175, 138, 175, 0.533);
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 400px;
        }
        .tank img {
            max-width: 100%;
            height: 60%;
            padding: 0px;
        }
        .tank.price {
            font-weight: bold;
            margin-top: 10px;
        }
        
        </style>
</head>
<body>
    <div class="header">
        <h1>TANK CLEANING</h1>
    </div>

    <div class="tank">
        <div class="slideshow-container">
            <img class="tank-image" src="images (1).jpg" alt="Tank Type 1">
           
            <!-- Add more images for slideshow -->
        </div>
        <h2>WATER TANK Cleaning</h2>
        <p>Cleaning involves: first we drain the tank, the external part of the tank is cleaned using soapy water then the tank is flushed then bleached using chlorine</p>
        <p class="price">Ksh. 5000</p>
        <a href="tanksignin.php?service_id=5" class="book-now-button">Book Now</a>
    </div>

    <div class="tank">
        <div class="slideshow-container">
            <img class="tank-image" src="OIL.jpg" alt="Tank Type 2">
            
            <!-- Add more images for slideshow -->
        </div>
        <h2>OIL TANK Cleaning</h2>
        <p>The tank is drained then the inside of the tank is cleaned using hot water and detergent. A bristle brush is used to clean the tank; depending on the size of the tank, a power washer may be used. The tank is rinsed and disinfected using chlorine.</p>
        <p class="price">Starting from Ksh. 15000</p>
        <a href="tanksignin.php?service_id=6" class="book-now-button">Book Now</a>
    </div>

    <div class="tank">
        <div class="slideshow-container">
            
            <img class="tank-image" src="chemical2.jpg" alt="Tank Type 3">
            <!-- Add more images for slideshow -->
        </div>
        <h2>CHEMICAL TANK Cleaning</h2>
        <p>These tanks are commonly found in chemical plants. Our team follows strict safety protocols to clean these tanks...</p>
        <p class="price">Starting price of Ksh. 10000</p>
        <a href="tanksignin.php?service_id=7" class="book-now-button">Book Now</a>
    </div>
    <div class="tank">
        <div class="slideshow-container">
            <img class="tank-image" src="food1.jpg" alt="Tank Type 3">
           
            <!-- Add more images for slideshow -->
        </div>
        <h2>FOOD AND BEVERAGE TANK Cleaning</h2>
        <p></p>
        <p class="price">Starting price of Ksh. 10000</p>
        <a href="tanksignin.php?service_id=8" class="book-now-button">Book Now</a>
    </div>

    <!-- Add more tank sections as needed -->
</body>
</html>
