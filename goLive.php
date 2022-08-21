<?php 
require_once('bootstrap.php');
session_start();
require_once('includes/header.inc.php');
$checkAdmin = new CheckAdminLogIn;
if($checkAdmin->checkAdmin()){
    header('Location: __DIR__ . /../live.php');
}

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
    <title>Lightpath</title>
    <link rel="stylesheet" href="css/style.css">
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
        <span class="error">
            <?php  
            if(empty($_POST['titel'])){
                echo "Je uitzending moet een titel hebben";
            }?>
        </span>
        <input class="start" type="submit" value = "Start viering" name="start">

    </form>
    </div>
</body>
</html>