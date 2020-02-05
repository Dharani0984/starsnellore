<?php

$host = "localhost";
$user_name = "root";
$password = "";
$db_name = "testing";

$conn = mysqli_connect($host,$user_name,$password,$db_name);
if($conn){

}else{
echo "Database Connection Error";
}
?>