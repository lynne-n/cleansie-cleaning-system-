<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
         *{
            margin:0px;
            padding: 0px;
        }
        body {
            font-size: 120%;
            background-color: lightskyblue;
            font-family: Arial, sans-serif;
        }

        .signinBox {
            width: 300px;
            margin: 100px auto;
            background-color: none;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        form {
            width: 300px;
            text-align: center;
            background: transparent;
            border: none;
            font-size: 18px;
            font-weight: 200;
            padding: 10px 0;
            transition: border 0.5s;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            margin-bottom:20px;
            border: 1px solid #b0c4de;
            background-color: white;
            border-radius: 0px 0px 10px 10px;
        }

        button {
            background-color: darkblue;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 3px;
            cursor: pointer;
            margin-top:10px;
        }
        button:hover{
            background-color:aqua;
        }
        a {
            text-align: center;
            margin-top: 20px;
            color: aqua;
        }
        a:hover{
            color:yellow;
        }
    </style>
</head>
<body>
    <div class="signinBox">
        <h2>Sign In</h2>
        <form action="process_login.php" method="POST">

        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">


        <br>
            <button type="submit">Sign In</button><br><br>
            <p> Don't have an an account?</p><a href="officialsignup.php"> SIGN UP
        </form>
        
    </div>
</body>
</html>
