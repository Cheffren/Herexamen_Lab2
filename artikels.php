<?php
    //laat alles van de post zien
    include_once(__DIR__ . "/Classes/Nieuws.php");


        $id = $_GET['id'];

        //var_dump($id);


    



        

        $nieuws = new Nieuws();

        $nieuw = $nieuws->showArticle($id);


        if (isset($_POST['delete']))  {


            $nieuwtje = new Nieuws();
            $nieuwtje->deleteNews($id);

        }





    




?><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            <h2>Oops, het lijkt er op dat hier niets te vinden is. Bekijk de andere artikels hier <a href="start.php">Hier</a></h2>

        <?php endif;?>







    </div>

















    
</body>
</html>