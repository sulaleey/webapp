<?php
session_start();
if(!isset($_SESSION['status'])){
    header('location:login.php');
    exit();
}
function check_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
$email= $_SESSION['email'];
$fullName=$_SESSION['user'];
 header('location:home.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pdate = date('Y/m/d');
$status =check_input($_POST["status"]);
$sql = "INSERT INTO `post`(`ID`, `content`,`fullName`, `email`, `pdate`) VALUES ('5','$status','$fullName','$email','$pdate')";
$query = mysqli_query($conn, $sql);
   header('location:home.php');
	$_SESSION['success']= "Status Updated sucessfully";
}
?>