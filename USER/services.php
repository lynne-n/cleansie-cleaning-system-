<!DOCTYPE html>
<html>
<head>
    <title>Our Services</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
            text-align: center;
            font-size: large;
            font-weight: bold;
            color: blue;
        }

        .slideshow {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            perspective: 1200px; /* Perspective for 3D effect */
        }

        .slideshow img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform-origin: right center;
            transform: rotateX('0deg')
            transition; transform: 5s ease-in-out;
             /* Adjust the transition duration as needed */
        }

        .menu {
            text-align: center;
            padding: 1em;
            background-color: none;
        }

        .menu a {
            color: black;
            text-decoration: dashed;
            margin: 0 1em;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        header {
            text-align: center;
            padding: 100px 0;
            color: black;
        }
    </style>
</head>
<body>
    <div class="slideshow">
        
       
        <img src="poolnet.jpg"alt="Slide 2">
        <img src="pillow1.jpg"alt="Slide 3">
        <img src="gunite1.jpg"alt="Slide 1">
    </imgsrc>
        
        
        
    </div>

    <header>
        <h1>Our Services</h1>
        
    </header>

    <nav class="menu">
        <a href="tankcleaning.php">TANK CLEANING</a>
        <a href="poolcleaning.php">POOL CLEANING</a>
        <a href="equipmenthiring.php">EQUIPMENT HIRING</a>
    </nav>

    <main>
        <!-- Your service content here -->
    </main>

    <script>
        // JavaScript code for slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll(".slideshow img");

        function nextSlide() {
            slides[currentSlide].style.transform = "rotateZ(-180deg)";
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].style.transform = "rotateZ(0deg)";
        }

        setInterval(nextSlide, 2000); // Change slide every 2 seconds (adjust as needed)
    </script>
</body>
</html>
