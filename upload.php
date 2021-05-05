
<?php

echo htmlspecialchars($_POST["body"]);


$target_dir = "Kuvat/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nettiresepti_db';

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
   renameFile();
   $target_file = $file_newname;
}



if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
} 

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
} 
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
 
      $conn = new mysqli($servername, $username, $password, $dbname);

      do{
        $recipe_id = generateRandomString();
        $sql = "SELECT reseptin_id FROM reseptit WHERE reseptin_id = ". $recipe_id ."";
        $result = $conn->query($sql);
      }
      while($result !== false && $result->num_rows > 0);
      echo $result;

      $sql = "INSERT INTO reseptit (reseptin_id, kayttajan_id, kuvat_url, otsikko, teksti, tagit, muokkaamispaiva) VALUES('". $recipe_id ."', '1a','". $file_newname ."','" .$_POST['header'] . "', '".$_POST['body'] ."', '".$_POST['tags']."', curdate())";
     
      $result = $conn->query($sql);

      $conn->close();


    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  echo $file_newname;







function renameFile(){
    global $target_dir, $target_file, $imageFileType, $file_newname;
    $file_newname = $target_dir . generateRandomString() . '.' . $imageFileType;
    if(file_exists($file_newname)){
        rename($target_file, $file_newname);
        renameFile();
    }
}
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }

?>
