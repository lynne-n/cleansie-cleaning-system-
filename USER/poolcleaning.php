<!DOCTYPE html>
<html>
<head>
    <title>Pool Cleaning Services</title>
    <!-- Add your CSS styles here -->
    
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
        
        .book-now-button:hover {
            background-color: yellow;
        }
        
        .pool {
            width: 60%;
            margin: 20px;
            padding: 30px;
            background-color: rgba(175, 138, 175, 0.533);
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 400px;
        }
        
        .pool img {
            max-width: 100%;
            max-height: auto;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <h1>POOL CLEANING</h1>
    </div>
    <div class="pool">
        <div class="slideshow-container">
            <img class="pool-image" src="tilecleaning.jpg" alt="Pool Type 3">
            <!-- Add more images for slideshow -->
        </div>
        <h2>TILE CLEANING</h2>
        <p>we drain the pool and the tiles are cleaned either using a pressure washer or by scrubbing using a brush with stiff bristles.<br> Vinegar may be used.</p>
        <p class="price">Ksh. 20000</p>
        <a href="booking.php?service_name=tile cleaning" class="book-now-button">Book Now</a>
    </div>
    <div class="pool">
        <div class="slideshow-container">
            <img class="pool-image" src="poolcleaning.jpg" alt="Pool Type 3">
            <!-- Add more images for slideshow -->
        </div>
        <h2>POOL WALL CLEANING</h2>
        <p>The pool is drained and bleach is applied on the pool walls <br>the walls are scrubbed using a pool brush . the walls are rinsed with clean water.</p>
        <p class="price">Ksh. 10000</p>
        <a href="officialsignin.php?service_name=pool wall cleaning" class="book-now-button">Book Now</a>
    </div>
    <div class="pool">
        <div class="slideshow-container">
            <img class="pool-image" src="fiberpool1.jpg" alt="Pool Type 1">            
            <!-- Add more images for slideshow -->
        </div>
        <h2>POOL VACUUMING</h2>
        <p> this is done using an automatic pool vacuum or a manual pool vacuum.</p>
        <p class="price">Ksh. 10000</p>
        <a href="officialsignin.php?service_name=pool vacuuming" class="book-now-button">Book Now</a>
    </div>
    
    <div class="pool">
        <div class="slideshow-container">
            <img class="pool-image" src="pool2_1.jpg" alt="Pool Type 3">
            <img class="pool-image" src="pool2_2.jpg" alt="Pool Type 3">
            <!-- Add more images for slideshow -->
        </div>
        <h2>FILTER CLEANING</h2>
        <p>The pump is turned off and the filter is removed.the filter is fluhed using water and submerged in TSP solution or dishwasher according to client preference. if filters are covered in algae, calcium bicarbornate is used to clean them.the filters are rinsed and reinstalled.</p>
        <p class="price">Ksh. 20000</p>
        <a href="officialsignin.php?service_name=filter cleaning" class="book-now-button">Book Now</a>
    </div>

    <!-- Add more pool sections as needed -->
</body>
</html>
