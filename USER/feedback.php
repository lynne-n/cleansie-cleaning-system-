<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <style>
        body {
            font-size: 120%;
            background-color: #F8f8;        
            background-size: cover;
            background-repeat: no-repeat;   
              
        }
        .feedback-form {
            width: 200px;
            text-align: center;
            background: none;
            border: none;
            font-size: 25px;
            font-weight: 200%;
            padding: 10px 250px;
            transition: border 0.5s;
        }
        p{
            text-align: center;
            font-size: 1.4em;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            align-items: center;
            width: 250%;
            margin: 15px 0;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid white;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: aqua;
            color: white;
            padding: 20px 20px;
            border: none;
            border-radius: 70px;
            cursor: pointer;
            font-size: 18px;
        }

        button[type="submit"]:hover {
            background-color: yellow;
        }     
        .confirmation-message {
            color: green;
        }
    </style>
</head>
<body>
    <header>
        <p>YOUR FEEDBACK</p>
        </header>

            
        <div class="feedback-form">    
    <!-- Form to submit feedback -->
    <form method="POST" action="store_feedback.php">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br><br>

    <label for="feedback">Feedback:</label><br>
    <textarea id="feedback" name="feedback" rows="5" cols="1" required></textarea><br>

    <button type="submit">Submit Feedback</button>
</form>
    

    <!-- Display area for feedback -->
    <div id="feedback-display">
        <h2></h2>
        <ul id="feedback-list">
            <!-- Feedback items will be displayed here -->
        </ul>
    </div>

    <!-- Confirmation message -->
    <div id="confirmation-message"></div>

    <script>
        // JavaScript code for handling form submission and displaying feedback

        // Function to handle form submission
        document.getElementById("feedback-form").addEventListener("submit", function (event) {
            event.preventDefault();

            // Get input values
            const name = document.getElementById("name").value;
            const feedbackText = document.getElementById("feedback").value;

            // Create a new feedback item
            const feedbackItem = document.createElement("li");
            feedbackItem.innerHTML = `<strong>${name}:</strong> ${feedbackText}`;

            // Add the feedback item to the list
            document.getElementById("feedback-list").appendChild(feedbackItem);

            // Clear the form inputs
            document.getElementById("name").value = "";
            document.getElementById("feedback").value = "";

            // Display a confirmation message
            const confirmationMessage = document.getElementById("confirmation-message");
            confirmationMessage.textContent = "Feedback submitted successfully.";
        });
    </script>
</body>
</html>
