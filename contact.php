<?php
require_once('bootstrap.php');
require_once('includes/header.inc.php');


?><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <a href="contact.php" class="vragen">Hulp</a> <a href="contact2.php" class="sacramentForm">Aanvraag sacrament</a>


    <form action="" method="post" class="contactForm">  
        <div class="info">

        <img src="./uploads/20220806125714_RobloxScreenShot20210925_191516341.png" alt="Foto van de secretariaat medewerker">
        <p>Tel nr: +32 000 000 000</p>
        <p>E-mail: example@example.be</p>
        <p>Adres: Kerkstraat 1, Hoogstraten</p>
        </div>

            <div class="hulp">
            <h3>Heb je een vraag? Aarzel dan niet om ons te contacteren</h3>

            <label for="naam">Naam:</label>
            <input type="text" name="naam" required class="formInputHelp">

            <label for="Email">E-mail:</label>
            <input type="email" name="email" required class="formInputHelp">

            <label for="question">Vraag:</label>
            <input name="vraag" class="vraag" cols="30" rows="10"></input>

            <input type="submit" name="submit" id="" hidden>
            </div>

            



    </form>
    <div class="triangle"></div>
    <iframe class="map"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.133591342758!2d4.801250015970948!3d51.474062120960824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6a690af427099%3A0xa1a3fc5bd76b8b79!2sKerkstraat%201%2C%202328%20Hoogstraten!5e0!3m2!1snl!2sbe!4v1660726453243!5m2!1snl!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>












<script src="JS/contact.js"></script>
</body>

</html>