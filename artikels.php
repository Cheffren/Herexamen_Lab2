<?php
require_once('bootstrap.php');
session_start();
require_once('includes/header.inc.php');


        $id = $_GET['id'];

        //var_dump($id);
        $nieuws = new Nieuws();

        $nieuw = $nieuws->showArticle($id);


        if (isset($_POST['delete']))  {
            $nieuwtje = new Nieuws();
            $nieuwtje->deleteNews($id);
        }
?><html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightpath</title>
</head>
<body>
    
    <div id="artikel">
        <?php if (!empty($nieuw)) : ?>
        <article>
            <img src="<?php echo $nieuw['thumbnail'] ?>" alt="">
            <h2><?php echo $nieuw['title']?></h2>
            <p><?php echo $nieuw['description']?></p>

            <form action="" method="post">
                <input type="submit" name="delete" value="verwijder">            
            </form>

        </article>
<?php endif;?>
        <?php if (empty($nieuw)) : ?>
            <h2>Oops, het lijkt er op dat hier niets te vinden is. Bekijk de andere artikels <a href="start.php">hier</a></h2>
        <?php endif;?>
    </div>
</body>
</html>