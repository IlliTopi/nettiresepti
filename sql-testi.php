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
      
      function generateRandomString($length = 10) {
        return "'" . substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length) . "'";
      }
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'nettiresepti_db';

        $conn = new mysqli($servername, $username, $password, $dbname);

      echo generateRandomString();
      echo "(" . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() . "," . generateRandomString() .")";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        echo "Yhteys pelittää <br><br>";
        
        $sql = "INSERT INTO reseptit (reseptin_id, kayttajan_id, kuvat_url, otsikko, teksti, tagit, muokkaamispaiva) VALUES (" . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() .", " . generateRandomString() . "," . generateRandomString() .")";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "SELECT reseptin_id, kayttajan_id, kuvat_url, otsikko, teksti, tagit, muokkaamispaiva FROM reseptit";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
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