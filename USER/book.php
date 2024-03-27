<!DOCTYPE html>
<html>
<head>
    <title>Book Now - Cleansie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: aqua;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: yellow;
        }
    </style>
</head>
<body>
    
    <p>Please fill out the form below to book your service.</p>
    <form action="process_book.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="full_name">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="">services:</label>
        <input type="text" id="service" name="service" required>

        <label for="alergy">chemical_allergy:</label>
        <textarea id="message" name="message" rows="3" cols="50"></textarea>

        <label for="service_date">Date of Service:</label>
        <input type="date" id="date" name="date" required>

        <input type="submit" value="Book Now">
    </form>
</body>
</html>
