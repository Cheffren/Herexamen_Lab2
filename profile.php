<?php
ini_set('display_errors', 1);

session_start();
include_once(__DIR__ . "/bootstrap.php");
//De info die gegeven wordt, is de info die ze gebruikt hebben om in te loggen
$profile = Profile::showInfo($_SESSION['email']);
var_dump($profile);


if (!empty($_POST)) {
    try {

    $profileInfo = new Profile();
    if (!empty($_POST['password'])) {
    $profileInfo->setPassword($_POST['password']);
    }
    if (!empty($_POST['username'])) {
    $profileInfo->setUsername($_POST['username']);
    }
    if (!empty($_POST['bio'])){
    $profileInfo->setBio($_POST['bio']);
    }
    $profileInfo -> updateProfile($_SESSION['email']);
   
    }
    catch (Exception $e) {
        $error =  $e->getMessage();
    }
}
$post = Profile::myPosts($_SESSION['username']);


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
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
        <a href="posts.php">gemeenschap</a>
        <a href=""></a>
        <a href="profile.php">profiel</a>





    </nav>



    <h2>Welkom username op je profiel.</h2>
        <div class="profile">

        <form action="" method="post" enctype="multipart/form-data">
        <img src="<?php echo $profile['profielfoto'] ?>" alt="Hier komt de profiel foto die je hier hebt gezet">
            <label for="profilepic">Profielfoto</label>
            <input type="file" name="profilepic" accept="image/*">


            <label for="username">Gebruikersnaam</label>
            <input type="text" name = "username" value="<?php echo $profile['username']?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" value="<?php echo $profile['email']?>">


            <label for="password">Wachtwoord</label>
            <input type="password" name="password" value = "<?php echo $_SESSION['password']?>">


            <label for="bio">Bio</label>
            <input type="text" name="bio" class="bio" value="<?php echo $profile['bio']?>">
            <input type="submit">

            </form>


        </div>

    <div class="myPosts">

    <?php foreach ($post as $p): ;?>

    <button class="deletePost" >verwijder Post</button>
            <h4><?php echo $p['username'] ?></h4>
            <p><?php echo $p['id']?></p>
            <?php $images = Post::getPictursByPostId($p['id']); ?>

            <?php foreach ($images as $img) : ?>
            <img id="post-Image" src="<?php echo htmlspecialchars($img['pictures'])?>" alt="foto">
          <?php endforeach;?>        


          <?php endforeach?> 






    </div>



    <script src="./JS/comment.js"></script>
</body>
</html>