<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            margin:0px;
            padding: 0px;
        }
        body {
            font-size: 120%;
            background-color: lightskyblue;        
            background-size: cover;
            background-repeat: no-repeat;
        }
        
        .signupBox {
            padding: 40px;
            width: 250px;
            margin: 0 auto;
            background-color: none;
        }

        form {
            width: 200px;
            text-align: center;
            background: transparent;
            border: none;
            font-size: 18px;
            font-weight: 200;
            padding: 10px 0;
            transition: border 0.5s;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #b0c4de;
            background-color: white;
            border-radius: 0px 0px 10px 10px;
        }

        button {
            background-color: aqua;
            color: white;
            border: none;
            border-radius: 0;
            padding: 10px 40px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover{
            background-color: yellow;
        }

        .SignIn {
            text-align: center;
            margin-top: 20px;
        }
        a{
            color:aqua;
        }
        a:hover{
            color:yellow;
        }
    </style>
</head>
<body>
    <div class="signupBox">
        <form action="process_tanksignup.php" method="POST">
            <h1>Sign Up</h1>
            <input type="text" name="full_name" placeholder="Full Name" required><br>           
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="number" name="phone" placeholder="Phone" required><br>
            <input type="text" name="home_address" placeholder="Home Address" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            
            <button type="submit">Sign Up</button>
            <div class="SignIn">
                <p>Already have an account? <a href="tanksignin.php">Sign In</a></p>
            </div>
        </form>
    </div>
</body>
</html>
