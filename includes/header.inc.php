<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <a href="startpagina.php">LightPath</a>
        <a href="start.php">Home</a>
        <a href="live.php">Live</a>
        <a href="posts.php">Gemeenschap</a>
        <a href="kalender.php">Kalender</a>
        <a href="contact2.php">Contacten</a>
        <?php
        if(!empty($_SESSION)):
        ?>
        <a href="profile.php" class="rightNav">Profiel</a>
        <a href="logout.php" class="rightNav">Uitloggen</a>
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