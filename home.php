<html>
<head>
<link rel="stylesheet" href="css/mycss.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title></title>
</head>
<body>
<div class="container-fluid" ><!-- Body start here -->

<?php	include('header.inc');
if(!isset($_SESSION['status'])){
    header('location:login.php');
    exit();
}
$email= $_SESSION['email'];
$fullName=$_SESSION['user'];
include('connection.inc');
$sql = "SELECT* FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($query);
function check_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
?>

<div class="form"><!-- Form Div start here -->
<div class="card  mb-3" >
<div class="card-header" style="text-align: center;">
<?php
if(isset($_SESSION['error'])){
echo '<div class="alert alert-danger" role="alert">'; echo $_SESSION["error"]; echo '</div>';
unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
echo '<div class="alert alert-success" role="alert">'; echo $_SESSION["success"]; echo '</div>';
unset($_SESSION['success']);
}
?>
</div>
<div class="card-body">

<div class="row">
<div class=" col">
    <div class="card-body">
        <h5 class="card-title">
        <img src="<?php echo "profile_pictures/".$_SESSION['email'].'.png'?>" class=" profilepic" alt="Upload Picture" style="border-radius:60px;border: solid 1px;">
                </h5>
    <div class="row">
  <div class="col">
  <h5><?php echo $record['fullname']?></h5>
      </div>
</div>
        <hr class="featurette-divider">

 </div>
</div> 
</div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div class="row">
  <div class="col">
  <label for="status">What's is on your mind? </label>
  <textarea required id="status" class="form-control" name="status"></textarea>
     </div>
</div>
<br />
<div class="row">
 <div class="col">
 <input type="submit" class=" btn  btn-success mb-5" value="Update status" style="float: right;;" >
  </div>
</div>
</form>
<?php
$sql = "SELECT*FROM post";
$query = mysqli_query($conn, $sql);
//$record = mysqli_fetch_assoc($query);
$num_row = mysqli_num_rows($query);

	if($num_row>0){
	   echo '<div class="row">
  <div class="col">
  <h5>NEW POST</h5>
      </div>
</div>';
	   while($record = mysqli_fetch_assoc($query)){
	   echo '<div class="row mb-3 border p-3">
 <div class="col-sm-4">'?>
 <img src="<?php echo "profile_pictures/".$record['email'].'.png'?>" class=" profilepic" alt="Upload Picture" style="border-radius:60px;border: solid 1px;">
<p><?php echo $record['fullName']?></p>
<?php
echo '
  </div>
  <div class="col-sm-8">
 '.$record['content'].'
   </div>
   <div class="row "> 
      ';
$postID=$record['ID'];
$sql1 = "SELECT*FROM comment WHERE postID = '$postID'";
$query1 = mysqli_query($conn, $sql1);
//$record = mysqli_fetch_assoc($query);
while($record1 = mysqli_fetch_assoc($query1)){

 echo '
  </div>
  <div class="col-sm-6">
 
   </div>
   <div class="row "> 
   <div class="row "> <div class="col-sm-6"></div> <div class="col-sm-6"> '.$record1['fullName'].'<br/> '.$record1['content'].'</div></div>
   ';
   }
   echo '<div class="col-sm-10">
   <form method="POST" action="comment.php">
  <textarea required  class="form-control" name="comment"></textarea>
   </div> 
   <div class="col-sm-2"><input type="submit" class=" btn  btn-success " value="Comment" style="float: right;" >
 </div></div>
</div> 
<input type="hidden" name="postID" value="'.$postID.'"/>
</form>';

}
	}
?>

</div>
</div>
</div> <!-- form div close here -->
<?php  include('footer.inc') ?>
</div><!-- body close here -->
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pdate = date('Y/m/d');
$status =check_input($_POST["status"]);
$sql = "INSERT INTO `post`(`ID`, `content`,`fullName`, `email`, `pdate`) VALUES ('','$status','$fullName','$email','$pdate')";
$query = mysqli_query($conn, $sql);
   header('location:post.php');
	$_SESSION['success']= "Status Updated sucessfully";
}
?>
