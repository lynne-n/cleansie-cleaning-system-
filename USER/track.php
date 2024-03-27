<!DOCTYPE html>
<html>
    <head>
    <title>TRACK</title>
</head>
<body>
    <h1>Track your Order</h1>
    <label for="order-id">Enter Order ID:</label>
    <input type="text" id="order-id">
    <button onclick="sendIdentityConfirmation()">Confirm Identity</button>
    <div id="result"></div>
    <script>
        function trackorder() {
            const orderid = document.getElementById('order-id').value;
            fetch('/track-order/${orderId}')
            .then(response => response.json())
            .then(data =>{
                document.getElementById('result').innerHTML = JSON.stringify(data);
            });
        }
        function sendIdentityConfirmation(){
            fetch('/send-identity-confirmation')
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML= data.message;
            });
        }
    </script>
</body>
</html>