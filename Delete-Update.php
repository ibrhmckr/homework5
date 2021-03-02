<?php
$connect = mysqli_connect("localhost","root","","employees");
if ($connect -> connect_error) {
  // code...
  die("Connection failed".$connect->connect_error);
}



if(isset($_GET["delete"])){
  $sql = "Delete  from employee WHERE id=".$_GET["delete"];
  mysqli_query($connect, $sql);

    echo $_GET["delete"]." id sahibi kullanici silindi.";
  $connect->close();
  header("location:index.php");

}// END OF IF

else{
  // UPDATE\\\\
?>
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
               <button type="submit" name="button" value="1">Update</button>
        </form>
        </div>
    </body>
  </html>

<?php
// UPDATE ISLEMI BURADA YAPILIYOR

if(isset($_POST["button"])){ // BEGIN OF BTN KONTROL IF

if($_POST["name"] !='' && $_POST["gender"] != '' && $_POST["designation"] != ''){
   //"gender=".$_POST["name"]."designation="..$_POST["name"]."WHERE id=".$_GET["update"];
   // \"ali\"
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $designation = $_POST['designation'];
  $sql = "update employee set name='$name', gender='$gender',designation='$designation' where id=".$_GET['update'];

  $result = mysqli_query($connect, $sql);
  echo $_GET["update"]." id sahibi kullanici guncellendi.";
  header("location:index.php");


} // END OF IF

else{ // FORM DOLDURULMADIGINDA VERILEN HATA
 echo "Lutfen tum alanalari doldurunuz!";
}// END OF ELSE


  $connect->close(); // UPDATE ISLEMI SONRASI VERI TABANI KAPATMA
}// end of ELSE


} // END OF BTN KONTROL IF

?>
