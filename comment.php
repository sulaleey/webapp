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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connection.inc');
$pdate = date('Y/m/d');
$postID =check_input($_POST["postID"]);
$comment =check_input($_POST["comment"]);
$sql1 = "SELECT*FROM comment WHERE postID = '$postID' AND content='$comment'";
$query1 = mysqli_query($conn, $sql1);
$num_row = mysqli_num_rows($query1);
$record1 = mysqli_fetch_assoc($query1);
if($num_row>0){
header('location:home.php');
exit;
}
$id = rand(1,1000000);
$sql = "INSERT INTO `comment` (`ID`,`content`,`fullName`, `email`, `pdate`,`postID`) VALUES ('$id','$comment','$fullName','$email','$pdate','$postID')";
if (!mysqli_query($conn,$sql)){ die("Faild  to check email" . mysqli_error($conn));}  
$query = mysqli_query($conn, $sql);
header('location:home.php');
$_SESSION['success']= "Commented sucessfully";
}

?>