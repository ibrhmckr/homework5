<?php
require 'database.php';

function get_data(){ // END OF get_data
global $connect;


$sql = "Select * from employee";
$result = mysqli_query($connect, $sql);
$json_array = array();

var_dump($result);
while($row = mysqli_fetch_assoc($result)){
   $json_array[] = $row;
} //END OF WHILE

return json_encode($json_array);
}// END OF get_data


 $file_name = date('d-m-Y').'.json';

 if(file_put_contents($file_name, get_data())){
   echo $file_name. 'file created';
   $connect->close();
   header("location:index.php");
 }// end of if
 else{
    echo "Content could not write to the file";
    $connect->close();
    header("location:index.php");
 }





 ?>
