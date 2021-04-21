<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Tyylit/hakusivu.css">
    <link rel="stylesheet" href="./Tyylit/hakupalkki.css">
</head>
<body>
    <?php
        $currentUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $urlParameter = htmlspecialchars($_GET["query"]);  
    ?>
    <div class="searchbar">
            <input type="text" id="search_input">
            <button onclick="Search()">Etsi</button>
    </div>

    <script src="search.js"></script> 
</body>
</html>