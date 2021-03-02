<?php
  require 'database.php';
 if(isset($_POST['buttonImport'])){// BEGIN OF buttonImport kontrol
   copy($_FILES['jsonFile']['tmp_name'],'jsonFiles/'.$_FILES['jsonFile']['name']);
   $data = file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
   $data = json_decode($data,true);
  foreach ($data as $row) {
    // code...
  $sql = "INSERT INTO employee(name,gender,designation) Values('".$row["name"]."', '".$row["gender"]."','".$row["designation"]."')";
  mysqli_query($connect,$sql);
  }


  echo "JSON dosyasi veritabanina eklendi.";
 $connect->close();
 header("location:index.php");
 }// END OF buttonImport kontrol


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>import</title>
  </head>
  <body>

      <form  method="post" enctype="multipart/form-data">
        JSON file <br>
        <input type="file" name="jsonFile">
        <br>
        <input type="submit"  value="import" name="buttonImport">

      </form>
  </body>
</html>
