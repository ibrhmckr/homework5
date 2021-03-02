<?php
$connect = mysqli_connect("localhost","root","","employees");
if ($connect -> connect_error) {
  // code...
  die("Connection failed".$connect->connect_error);
}


  // ADD FORM\\\\
?>
<!-- FORM -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="form">
      <form method="post">
            <label for="name">Name</label> <br>
            <input type="text" name="name" ><br>
            <label for="gender">Gender</label><br>
            <input type="text" name="gender"><br>
            <label for="designation">Designation</label><br>
            <input type="text" name="designation"><br>
             <button type="submit" name="button" value="1">ADD</button>
      </form>
      </div>
  </body>
</html>


<?php
// ADD ISLEMI BURADA YAPILIYOR

if(!empty($_POST["button"])){ // BEGIN OF BTN KONTROL IF

if($_POST["name"] !='' && $_POST["gender"] != '' && $_POST["designation"] != ''){
   //"gender=".$_POST["name"]."designation="..$_POST["name"]."WHERE id=".$_GET["update"];
   // \"ali\"
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $designation = $_POST['designation'];
  $sql = "insert into employee(name, gender,designation) values('$name','$gender','$designation')";

  $result = mysqli_query($connect, $sql);
  if($result){

    echo " Yeni kayit eklendi.";
    header("location:index.php");

    //header("location: index.php");
  }
  else{ // BEGIN OF BASARISIZ KAYIT EKLEME
     echo " Yeni kayit eklenemedi.";
  }// END OF BASARISIZ KAYIT EKLEME



} // END OF IF

else{ // FORM DOLDURULMADIGINDA VERILEN HATA
 echo "Lutfen tum alanalari doldurunuz!";
}// END OF ELSE


  $connect->close(); // UPDATE ISLEMI SONRASI VERI TABANI KAPATMA


} // END OF BTN KONTROL IF

?>
