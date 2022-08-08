<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once(__DIR__."/Classes/Post.php");

session_start();
//Alles wat in het formulier gezet wordt, moet in de databank komen
//var_dump($_SESSION['username']);
if (!empty($_POST)) {

   try {

        $post = new Post();
        $text = $_POST['postText'];
        $post->setText($text);
        $post->addPost($_SESSION['username']);


    }
    
    catch(\Throwable $th) {

        $error = $th->getMessage(); 

    }
}

$po = new Post();
$pos = $po->feed();

var_dump($po);


//Vanaf het in de databank zit moet het weergegeven worden

//Het moet zonder te refreshen weergegeven worden
?>
<html lang="en">
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
        <a href="">Community</a>
        <a href="">Kalender</a>
        <a href="">Contact</a>
        <a href="">Profiel</a>
    </nav>

    <h1>Community</h1>











    <div class="post">
      <?php foreach ($pos as $p): ;?>
        <div>
            <h4><?php echo $p['username'] ?></h4>

            <img id="post-Image" src="<?php echo htmlspecialchars($p['pictures'])?>" alt="foto">
            <?php if (!empty($p['picture2'])) : ?>
            <img id="post-Image2" src="<?php echo htmlspecialchars($p['picture2'])?>" alt="foto">
            <?php endif;?>
            <?php if (!empty($p['picture3'])): ?>
            <img id="post-Image3" src="<?php echo htmlspecialchars($p['picture3'])?>" alt="foto">
            <?php endif;?>

            <h4><?php echo $_SESSION['username'] ?></h4>
            <p><?php echo $p['text']?></p>

        </div>

        <?php endforeach;?>

    </div>
    <div>

        <a href="">+</a>

    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <h3><?php $_SESSION['username']?></h3>

        <label for="image"><img src="" alt="Goed zo"></label>
        <input type="file" name="uploadfile[]" id="file" accept="image/*" multiple>

        <!--<label for="image"><img src="" alt="Goed zo"></label>
        <input type="file" name="uploadfile2" id="file" accept="image/*">

        <label for="image"><img src="" alt="Goed zo"></label>
        <input type="file" name="uploadfile3" id="file" accept="image/*">-->

        <label for="postText">Inhoud post</label>
        <input type="text" name="postText" id="postText" row="5" cols="20"> 

        <input type="submit" value="plaats" name="submitPost" id="submitPost">

    </form>

   



    
</body>
</html>