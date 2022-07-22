<?php 
date_default_timezone_set("Europe/Brussels");
include_once(__DIR__."/Classes/stream.php");

if(!empty($_POST)) {

$stream = new stream();
$stream->setTitle($_POST['titel']);
$s = $stream->saveTitle();


}
$show = stream::showTitle();



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <nav>
        <a href="">LightPath</a>
        <a href="">Home</a>
        <a href="">Viering</a>
        <a href="">Gemeenschap</a>
        <a href="">Kalender</a>
        <a href="">Contact</a>
        <a href="">Profiel</a>
    </nav>

</head>
<body>
    <div class="background">




    </div>
    <div class="screen">
        <?php foreach ($show as $sh):?>
        <h2><?php echo $sh['title'] . " " . $sh['date']?></h2>
        <?php endforeach ;?>
        <video src="" controls></video></div>

    <div class="formStream">
    <form action="" method="post">

        <label for="Geef de titel in"> Titel:</label>
        <input class="titel" type="text" required placeholder="Geef titel in" name="titel">
        <span class="error"><?php  if(empty($_POST['titel'])) {echo "Je uitzending moet een titel hebben";}?></span>
        <input class="start" type="submit" value = "Start viering" name="start">

    </form>




    </div>

    
</body>
</html>