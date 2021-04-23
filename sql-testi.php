<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'nettiresepti_db';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        echo "Yhteys pelittää <br><br>";

        

        $sql = "SELECT reseptin_id, kayttajan_id, kuvat_url, otsikko, teksti, tagit, muokkaamispaiva FROM reseptit";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "reseptin_id: " . $row["reseptin_id"]. " - kayttajan_id: " . $row["kayttajan_id"]. " - kuvat_url: " . $row["kuvat_url"]. "- otsikko: ". $row["otsikko"]. " - teksti: " . $row["teksti"]. 
              " - tagit: " . $row["tagit"]. " - muokkaamispaiva: " . $row["muokkaamispaiva"]."<br>";
            }
          } else {
            echo "0 results";
          }

        


        $conn->close();
    ?>
</body>
</html>