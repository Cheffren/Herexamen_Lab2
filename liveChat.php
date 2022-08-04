<?php
include_once(__DIR__."/Classes/Chat.php");
include_once(__DIR__."/Classes/stream.php");
require_once('includes/header.inc.php');

$chatMessages = Chat::selectMessages();
$show = stream::showTitle();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightpath</title>
    <link rel="stylesheet" href="css/style.css">
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
                <form action="" method="post">
                <input class="message"type="text" placeholder="Typ een chat bericht" name="message">
                <input class="chatButton" type="submit" value="Chat" name="button" data-username ="<?php echo $_SESSION['username']?>">
                </form>
                </div>
    

            <button class="stop">Stop uitzending</button>
    </div>
    <script src="./JS/script.js"></script>
</body>
</html>