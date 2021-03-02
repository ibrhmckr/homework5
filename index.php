
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
    table{
      border-collapse: collapse;
      width: 100%;
      color: #588c7e;
      font-family:monospace;
      font-size: 15px;
      text-align: left;
      }
      th{
        background-color: #d96459;
        color:white;
      }
      tr:nth-chil(even){background-color: #f2f2f2}
    </style>
  </head>
  <body>

  <!-- BUTONLAR :   iceAktar  disaAktar  Yeni Urun Ekle
  -->
    <!-- Button to IMPORT JSONFILE-->
    <a href="import.php"><button type="button" name="iceAktar">ICE AKTAR</button></a>
    <!-- Button to EXPORT JSONFILE-->
    <a href="export.php"><button type="button" name="disaAktar">DISA AKTAR</button></a>
    <!-- Button to ADD NEW DATA into DATABASE-->
    <a href="add.php"><button type="button" name="Yeni Urun Ekle">YENI URUN EKLE</button></a>

    <table width="500px" height="400px" color="black" style="border:3px solid black" >
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>GENDER</th>
        <th>DESIGNATION</th>
        <th>Delete</th>
        <th>Update</th>

      </tr>


      <?php
      $connect = mysqli_connect("localhost","root","","employees");
      if ($connect -> connect_error) {
        // code...
        die("Connection failed".$connect->connect_error);
      }
      $sql = "Select * from employee";
      $result = mysqli_query($connect, $sql);
      if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            //  echo "<tr> <td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["name"]."</td><td>".$row["gender"]."</td<td>".$row["designation"]."</td></tr>";
              echo "<tr> <td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["gender"]."</td><td>".$row["designation"]."</td>"."<td>
                 <button><a href = "."Delete-Update.php?delete=".$row["id"].">Delete</a></button>
              </td>"."<td>
                 <button><a href = "."Delete-Update.php?update=".$row["id"].">Update</a></button>
              </td>"."</tr>";

            }// end of while
            echo "</table>";
      } // END OF IF

      else{
         echo "0 result";
      }

      $connect->close();


       ?>
    </table>

  <!--INSERT ITEM -->
  <!--
  <div class="form">
    <form class="" action="index.html">
          <label for="name">Name</label> <br>
          <input type="text" name="name" value="" ><br>
          <label for="gender">Gender</label><br>
          <input type="text" name="gender" value=""><br>
          <label for="designation">Designation</label><br>
          <input type="text" name="designation" value=""><br>
           <button type="submit" name="button">Ekle</button>
    </form>
    </div>

   -->




  </body>
</html>
