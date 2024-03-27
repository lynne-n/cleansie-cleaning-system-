<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTL Cleaning Service FAQs</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: lightskyblue;">

    <div style="max-width: 800px; margin: 0 auto; padding: 40px; background-color: lightskyblue; border-radius: 10px; box-shadow: 0 2px 4px aqua; background-image: url(inert.jpg); background-size: cover;">

        <h1 style="text-align: center; background-color:;border-radius:  300px;border-width: 200px; color: aqua; font-size: 30px;">FREQUENTLY ASKED QUESTIONS</h1>

        <style>
            .faq-item {
                cursor: pointer;
                margin-bottom: 20px;
                padding-left: 25px;
                position: relative;
            }

            .faq-item .question {
                color: black;
                margin: 0;
                font-size: 24px;
                transition: color 0.3s;
            }

            .faq-item .answer {
                font-size: 18px;
                color: white;
                margin-top: 10px;
                display: none;
            }

            .faq-item.active .answer {
                display: block;
            }

            .faq-item::before {
                content: "\2022"; /* Bullet point character */
                position: absolute;
                left: 0;
                top: 0;
                font-size: 24px;
                line-height: 1;
                color: aqua;
            }
        </style>

        <script>
            function toggleAnswer(event) {
                const faqItem = event.currentTarget;
                const answer = faqItem.querySelector('.answer');
                faqItem.classList.toggle('active');
            }
        </script>

        <div class="faq-item" onclick="toggleAnswer(event)">
            <h2 class="question">What services does Cleansie offer?</h2>
            <p class="answer">Cleansie Cleaning Services offers tank cleaning, pool cleaning and equipment hiring.</p>
        </div>

        <div class="faq-item" onclick="toggleAnswer(event)">
            <h2 class="question">How can I request a cleaning service?</h2>
            <p class="answer">By cliking on the Book Now button found under each service. You will then be required to login in or sign up if you dont have an account, then you can place your order.</p>
        </div>

        <div class="faq-item" onclick="toggleAnswer(event)">
            <h2 class="question">How can I request a cleaning service as a new client?</h2>
            <p class="answer">By cliking on the sign up button found on our homepage. You will then be redirected to the service page where you can book your service of choice by clicking the Book Now button.</p>
        </div>

        <div class="faq-item" onclick="toggleAnswer(event)">
            <h2 class="question">Are your cleaning products safe?</h2>
            <p class="answer">Yes, we use environmentally friendly and safe cleaning products to ensure the well-being of our clients and the environment. clients can also state their allergy and dislike preferences for cutomized cleaning solutions</p>
        </div>
        <div class="faq-item"onclick="toggleAnswer(event)">
            <h2 class="question">How much do you charge for your services?</h2>
            <p class="answer">Estimates for each cleaning service are given on the service page.</p>
        </div>
        <div class="faq-item" onclick="toggleAnswer(event)">
            <h2 class="question"> What do I do if my tank or pool is full of water yet I need it cleaned?</h2>
            <p class="answer">The water may be used to clean the tank or you may book the service after you've used the water.</p>
        </div>

        

    </div>

</body>
</html>
