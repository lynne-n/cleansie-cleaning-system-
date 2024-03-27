

<!DOCTYPE html>
<html>
<head>
    <title>Equipment Hiring Services</title>
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
        .equipment {
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
        .equipment img {
            max-width: 100%;
            max-height: 30%;
        }
        .book-now-button{
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
    </style>
</head>
<body>
    <div class="header">
        <h1>EQUIPMENT HIRING</h1>
        
    </div>
    
    <div class="equipment">
        <img src="kimmer.jpg" alt="pool net">
        <h2>SKIMMER NET</h2>
        <p>Used for scooping debris floating on top of the surface of the pool. <br>double layer deep bag, heavy duty aluminium frame </p>
        <P class="price">Ksh. 1500</P>
        <a href="equip_signin.php?service_id=9" class="book-now-button">Book Now</a>
    </div>

    <div class="equipment">
        <img src="nylon.jpg" alt="pool">
        <h2>NYLON BRUSH</h2>
        <p>EcoNour Curved Swimming Pool Brush head.Ideal for in-ground and above ground pools<br>Used to scrub the pool wall and floor and brush away algae.Used for cleaning fiberglass pools,painted concrete and vinyl walls</p>
        <p class="price">Ksh. 1000</p>
        <a href="equip_signin.php?service_id=10" class="book-now-button">Book Now</a>
    </div>

    <div class="equipment">
        <img src="AIPER.jpg" alt="pool-cleaner">
        <h2>ROBOTIC POOL CLEANER</h2>
        <p>AIPER seagull SE Cordless Robotic Pool Cleaner.<br> Lasts 90minutes, LED indicator.<br> Ideal for flat above/in-ground Pools</p>
        <p class="price"> Ksh.10000</p>
        <a href="equip_signin.php?service_id=11" class="book-now-button">Book Now</a>
    </div>
    <div class="equipment">
        <img src="WYBOT 1.jpg" alt="pool-cleaner">
        <h2>ROBOTIC  CLEANER</h2>
        <p>WYBOT Wall climbing Robotic Pool cleaner<br> With App mode, Excellent suction power, 9200mAH Battery</p>
        <p class="price"> Ksh.10000</p>
        <a href="equip_signin.php?service_id=12" class="book-now-button">Book Now</a>
    </div>
    <div class="equipment">
        <img src="telecopic1.jpg"alt="www">
        <h2></h2>
        <p>10.5 foot Aluminium Telecopic Swimming Pool Pole<br> 8 Adjustable Connecting Sections,Expandable Length</p>
        <p class="price">Ksh.1500</p>
        <a href="equip_signin.php?service_id=13" class="book-now-button">Book Now</a>
    </div>
    <div class="equipment">
        <img src="vacuumandbruh.jpg"alt="www">
        <h2>VACUUM HEAD WITH SIDE BRUSH</h2>
        <p>Pool Vacuum for inground pool and above ground<br> Manual Pool Vacuum</p>
        <p class="price">Ksh.3500</p>
        <a href="equip_signin.php?service_id=14" class="book-now-button">Book Now</a>
    </div>
    <div class="equipment">
        <img src="algae.jpg"alt="www">
        <h2>ALGAE BRUSH</h2>
        <p>blue algae brush with black bristles</p>
        <p class="price">Ksh.750</p>
        <a href="equip_signin.php?service_id=15" class="book-now-button">Book Now</a>
    </div> 
    <!-- Add more equipment sections as needed -->
    </body>
</html>

