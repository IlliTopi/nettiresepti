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

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'nettiresepti_db';

        $sql = "SELECT reseptin_id, otsikko FROM reseptit WHERE reseptin_id='" . $urlParameter."' OR otsikko='" . $urlParameter."'";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($sql);

    ?>
    <div class="searchbar">
            <input type="text" id="search_input">
            <button onclick="Search()">Etsi</button>
    </div>
    <div class="result-box">
       <?php echo "<h1>Hakutulokset: ". $urlParameter . "</h1>"; ?>
       <div class="result-grid">
        <div class="result" data-text="moro" onclick="ToArticle(this.dataset.text)"><h1>UUeeee</h1><img src="ruoka.jpg"></div>
        <?php 
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
              echo '<div class="result" data-text="'. $row["reseptin_id"] .'" onclick="Recipe(this.dataset.text)"><h1>'. $row["otsikko"] .'</h1><img src="ruoka.jpg"></div>';
            }
          } else {
            echo "0 results";
          }

        $conn->close();

        ?>
    </div>
    </div>
    <script src="search.js"></script> 
</body>
</html>