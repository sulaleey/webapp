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
include('connection.inc');
$sql = "SELECT* FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($query);
?>

<div class="form"><!-- Form Div start here -->
<div class="card  mb-3" >
<div class="card-header" style="text-align: center;">User Profile
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
        <hr class="featurette-divider">

 </div>
</div> 
</div>
<div class="row">
  <div class="col">
  <h1><?php echo $record['fullname']?></h1>
      </div>
</div>


<div class="row">
<div class="col">
  <p>Address</p>
  </div>
  <div class="col">
 <?php echo $record['address']?>
  </div>
  <hr class="featurette-divider">
</div>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

<div class="row">
  <div class="col">
  <label for="phone">Full Name:</label>
    <input type="text" class="form-control" id="phone"  value="<?php echo $record['fullname']?>" placeholder="Phone" aria-label="Phone" name="name" required="">
  </div>
</div>

<div class="row">
  <div class="col">
  <label for="phone">Phone Number:</label>
    <input type="tel" class="form-control" id="phone"  value="<?php echo $record['phone']?>" placeholder="Phone" aria-label="Phone" name="phone" required="">
  </div>
</div>

<div class="row">
 <div class="col">
 <label for="email">Email Address</label>
    <input type="email" class="form-control" id="email"  value="<?php echo $record['email']?>" placeholder="Email" aria-label="Email" name="email" required="">
  </div>
</div>

<div class="row">
 <div class="col">
 <label for="email">Address</label>
    <input type="text" class="form-control" id="email"  value="<?php echo $record['address']?>" placeholder="address" aria-label="Email" name="address" required="">
  </div>
</div>

<div class="row">
  <div class="col">
  <label for="phone">Password:</label>
    <input type="password" class="form-control" id="password"  value="<?php echo $record['password']?>" placeholder="Phone" aria-label="Phone" name="password" required="">
  </div>
</div>
<br />
<div class="row">
 <div class="col">
 <input type="submit" class=" btn  btn-success" value="Save" >
  </div>
</div>
</form>
</div>
</div>
</div> <!-- form div close here -->
</form>

<?php
   function check_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = check_input($_POST["name"]);
    $email = check_input($_POST["email"]);
    $phone = check_input($_POST["phone"]);
    $address =check_input( $_POST["address"]);
    $pass =sha1(check_input($_POST["password"]));
    
include('connection.inc');
$sql = "UPDATE users SET fullname ='$fullname', email = '$email', phone='$phone', address='$address',
password ='$pass'  WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
   
	$_SESSION['success']= "Profile Details Updated sucessfully";
    header('location:profile.php');
    exit(); 
}
?>
<?php  include('footer.inc') ?>
</div><!-- body close here -->
</body>
</html>