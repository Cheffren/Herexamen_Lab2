<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once(__DIR__."/bootstrap.php");


session_start();
//Alles wat in het formulier gezet wordt, moet in de databank komen
//var_dump($_SESSION['username']);
if (!empty($_POST['submitPost'])) {

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

//var_dump($po);


//Vanaf het in de databank zit moet het weergegeven worden

//Het moet zonder te refreshen weergegeven worden
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
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
            <?php  if ($p['username'] == $_SESSION['username']):?>
            <button class="deletePost" data-id = "<?php echo $p['id']?>" data-username = "<?php echo $_SESSION['username'];?>">verwijder Post</button>
                <?php endif;?>
            <h4><?php echo $p['username'] ?></h4>
            <p><?php echo $p['id']?></p>
            <?php $images = Post::getPictursByPostId($p['id']); ?>
            <?php var_dump($images)?>

            <?php foreach ($images as $img) : ?>
                <?php var_dump($img['id'])?>
            <img id="post-Image" src="<?php echo htmlspecialchars($img['pictures'])?>" alt="foto">
          <?php endforeach;?>
          <?php $amountOfComments = Comment::getCommentsCount($p['id'])?>

          <div class="showButtons">
          <button class="comment"><img class="commentButton"  src="./images/chat-bubble.png" alt=""></button> <p class="AmountOfComments"><?php echo $amountOfComments?></p>
          <?php $amountOfLikes = Likes::countLikes($p['id'])?>
          <button class="like" data-username = "<?php echo $_SESSION['username']?>" data-postId="<?php echo $p['id'] ?>"><img class = "likeButton"src="./images/thumbs-up.png" alt="like"></button><p class="amountOfLikes"><?php ?><?php echo $amountOfLikes?></p>
          </div>
 

            <h4><?php echo $_SESSION['username'] ?></h4>
            <p><?php echo $p['text']?></p>



            <div class="comments">
                   <?php $allComments = Comment::getTheComment($p['id']);?>
                    
                    <?php foreach($allComments as $c) : ;?>
                        <h4><?php echo $c['username'] ?></h4>
                        <p><?php echo $c['commentText'] ?></p>
                        <?php echo $c['commentId'];?>
                        <?php if ($c['username'] === $_SESSION['username']): ;?>

                            <button class="deleteComment" data-username="<?php echo $_SESSION['username']?>" data-commentId ="<?php echo $c['commentId']?>" >delete</button>
                            <?php endif; ?>
                <?php endforeach?> 
                <?php if (!empty($_POST['submitComment'])) {

$comment = new Comment();
$comment->setUserName($_SESSION['username']);
$comment->setComment($_POST['commentText']);
$comment->setPostId($p['id']);
$comment->saveComment();

var_dump($p['id']);







} ?>
 <form action="" method="post" class="commentForm">

<input type="text" name="commentText" class="commentText">
<input type="submit" class="submitComment" data-postId="<?php echo $p['id'] ?>" data-username = "<?php echo $_SESSION['username'] ?>" name="submitComment">

</form>
            

                
               

</div>





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

   



    <script src="./JS/comment.js"></script>

</body>
</html>