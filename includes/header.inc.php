<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <a href="startpagina.php">LightPath</a>
        <a href="start.php">Home</a>
        <a href="live.php">Live</a>
        <?php
            $checkAdmin = new CheckAdminLogIn;
            if($checkAdmin->checkAdmin() === true):
        ?>
        <a href="goLive.php">Go Live</a>
        <?php
            endif;
        ?>
        <a href="posts.php">Gemeenschap</a>
        <a href="kalender.php">Kalender</a>
        <a href="contact.php">Contacten</a>
        <?php
        if(!empty($_SESSION)):
        ?>
        <div class="rightNav"></div>
        <a href="profile.php" >Profiel</a>
        <a href="logout.php">Uitloggen</a>
        <?php
        elseif(1 == 1):
        ?>
        <a href="login.php" class="rightNav">Inloggen</a>
        <?php
        endif;
        ?>
    </nav>
</body>
</html>