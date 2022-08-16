<?php
require_once('bootstrap.php');
require_once('includes/header.inc.php');
session_start();

$chatMessages = Chat::selectMessages();
$show = stream::showTitle();


//var_dump($_SESSION['username']);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightpath</title>
    <link rel="stylesheet" href="css/style.css">
<<<<<<< HEAD
    <nav>
        <a href="startpagina.php">LightPath</a>
        <a href="">Home</a>
        <a href="live.php">Live</a>
        <a href="posts.php">Gemeenschap</a>
        <a href="">Kalender</a>
        <a href="">Contacten</a>
        <a href="profile.php">Profiel</a>
    </nav>
</head>
<body>
        <div class="video">
        <?php foreach ($show as $sh):?>
        <h2><?php echo $sh['title'] . " " . $sh['date']?></h2>
        <?php endforeach ;?>
                <video src=""autoplay controls>

                </video>
                <a class="chatClose">❌</a>
                <div class="chat"> 
                <h3>Chat</h3>

                <ul class="chatMessages">
                    <?php foreach($chatMessages as $c):?>
                    <li><span id="naam"> <?php echo $c['username'];?> </span> <?php echo $c['tekst']?></li>
                    <?php endforeach;?>


                </ul>
                <?php if (!empty($_SESSION['username'])) :?>

                <form action="" method="post">
                <input class="message"type="text" placeholder="Typ een chat bericht" name="message">
                <input class="chatButton" type="submit" value="Chat" name="button" data-username = "<?php echo $_SESSION['username']?> ">
                </form>
                <?php endif;?>
                </div>
            
    </div>
        <div class="oudeStreams">
            <h3>Eerdere streams</h3>
            <button class="rechts">Links</button>
<div class="archief">
        <div class="stream-stream">

                    <img src="./binnen.jpg" alt="">

                    <h4>Eucharistie <span> 09/07/2022 10:00 tot 12:00 </span></h4>
        </div>

        <div class="stream-stream">

            <img src="./binnen.jpg" alt="">

            <h4>Eucharistie <span>10/07/2022 10:00 tot 12:00 </span></h4>


        </div>
        <div class="stream-stream">

            <img src="./binnen.jpg" alt="">

            <h4>Eucharistie <span> 16/07/2022 10:00 tot 12:00 </span></h4>

        </div>

        <div class="stream-stream">

            <img src="/binnen.jpg" alt="">
            <h4>Eucharistie <span> 17/07/2022 10:00 tot 12:00 </span></h4>


        </div>

        <div class="stream-stream">

            <img src="./binnen.jpg" alt="">

            <h4>Eucharistie <span>23/07/2022 10:00 tot 12:00 </span></h4>


        </div>
<


</div>




        </div>
        <button class="rechts">Rechts</button>







    <script src="./JS/script.js"></script>
</body>
</html>