<!DOCTYPE>
<html>
    <head></head>
    <body>
        <style>
            .form{
                align-items:center;
                background-color:#f8f8;
                padding-left:400px;
                padding-top:50px;
            }
        </style>
    </body>
<div class="form">
<form action="addclient.php" method="POST"><br><br>
<input type="text" name="full_name" placeholder="Full Name" required><br><br>           
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="number" name="phone" placeholder="Phone" required><br><br>
            <input type="text" name="home_address" placeholder="Home Address" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            
    <button type="submit">Add Client</button>
</form>