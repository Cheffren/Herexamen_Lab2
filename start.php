
<?php


include_once(__DIR__."/Classes/Nieuws.php");

//session_start();
//Alles wat in het formulier gezet wordt, moet in de databank komen
//var_dump($_SESSION['username']);






if (!empty($_POST)) {


        $nieuws = new Nieuws();
        $nieuws->setTitle($_POST ['title']);
        $nieuws->setDescription($_POST['article']);
        $nieuws->setCategory($_POST['category']);


     

        $nieuws->addNieuws();


    
}
//var_dump($nieuws);
    if (isset($_GET['category'])) {
    $pagina = $_GET['category'];
    $news = new Nieuws();
//$news->setCategory("Doopsel");
$new = $news->showNews($pagina);
    }

    $nieuw = new Nieuws();
    $ni = $nieuw->showNewsFeed();

//echo $pagina;









?><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
    <a href="">Lightpath</a>
    <a href="">Uitzendingen</a>
    <a href="">Gemeenschap</a>
    <a href="">Kalender</a>
    <a href="">Contact</a>
    <a href="">Profiel</a>



    </nav>
    <div class="categorie">
    <a href="start.php?category=<?php echo "Doopsel" ?>"><img src="" alt="">Doopsel</a>
    <a href="start.php?category=<?php echo "Communie" ?>"><img src="" alt="">Communie</a>
    <a href="start.php?category=<?php echo "Vormsel" ?>"><img src="" alt="">Vormsel</a>
    <a href="start.php?category=<?php echo "Huwelijk" ?>"><img src="" alt="">Huwelijk</a>
    <a href="start.php?category=<?php echo "Begrafenis" ?>"><img src="" alt="">Begrafenis</a>
    <a href="start.php?category=<?php echo "Eucharistie" ?>"><img src="" alt="">Eucharistie</a>
    <a href="start.php?category=<?php echo "Gebouw" ?>"><img src="" alt="">Gebouw</a>
    <a href="start.php?category=<?php echo "Artikels" ?>"><img src="" alt="">Artikels</a>
    <a href="start.php?category=<?php echo "Andere" ?>"><img src="" alt="">Andere</a>

    </div>
    <div class="newsFeed">
    <?php if(isset($_GET['category'])) : ?>
    <?php foreach ($new as $n): ; ?>
    <article>

    <a href="artikels.php?id=<?php echo $n['id']?>"><img src="<?php echo $n['thumbnail']?>" alt=""></a>
    <h2><?php echo $n['title'] ?></h2>
    </article>

    <?php endforeach; ?>
    <?php endif;?>

    <?php if (!isset($_GET['category'])): ;?>
    <?php foreach ($ni as $nie): ; ?>
    <article>
    <a href="artikels.php?id=<?php echo $nie['id']?>"><img src="<?php echo $nie['thumbnail']?>" alt=""></a>
    <h2><?php echo $nie['title'] ?></h2>
    </article>
    <?php endforeach;?>
    <?php endif;?>

    </div>

    <div class="form">

        <form action="" method="post" enctype="multipart/form-data">

            <label for="title">Titel:</label>
            <input type="text" name="title" id="title">

            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail">

            <label for="category">categorie</label>
            <input type="text" name="category" id="category">

            <label for="article">Artikel</label>
            <input type="text" name="article" id="article">

            <input type="submit" name="submit" id="">

        </form>







    </div>











    
</body>
</html>