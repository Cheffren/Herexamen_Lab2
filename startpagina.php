<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .image {
            background-image: url("Buitenkant.jpg");
            position: absolute;
            background-position: bottom;
            width: 100%;
            height: 100%;
            -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";

        }
        .content {
            position: absolute;
            left: 10%;
            top: 57%;
            width: 30%;
            font-family: roboto;
            
        }
        button {
            position: relative;
            margin-top: 2em;
            width: 180px;
            height: 52px;
            font-size: 16pt;
            text-decoration: none;
            background-color: #83CAD6;
            border: none;
            border-radius: 10px;
        }


    </style>
</head>
<body>
   <div class="image"></div>
   <div class="content">
        <h1>Welkom bij LightPath (Sint Petrus-Paulus).
        Hier vind je alles over  je favoriete kerk.</h1>
        <Button><a href="live.php">Kom binnen</a></Button>
   </div>
</body>
</html>