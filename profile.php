<html>
<head>
<link rel="stylesheet" href="css/mycss.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title>Profile</title>
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <?php if(!file_exists("profile_pictures/".$_SESSION['email'].'.png')){
            echo '<input type="file" class="" placeholder="Picture" aria-label="Picture" id="file" name="file" required="">
       <input type="submit" class=" btn  btn-success" value="Upload Profile Picture">';
        }
        else
       {
       echo ' <a class=" btn  btn-success" href="pictureUpdate.php">Change Picture </a>'; 
        }?>
               </form>
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


<div class="row">
  <div class="col">
  <label for="phone">Phone Number:</label>
    <input type="tel" class="form-control" id="phone" disabled="" value="<?php echo $record['phone']?>" placeholder="Phone" aria-label="Phone" name="phone" required="">
  </div>
</div>

<div class="row">
 <div class="col">
 <label for="email">Email Address</label>
    <input type="email" class="form-control" id="email" disabled="" value="<?php echo $record['email']?>" placeholder="Email" aria-label="Email" name="email" required="">
  </div>
</div>
<br />
<div class="row">
 <div class="col">
 <a type="submit" class=" btn  btn-success" href="profileUpdate.php" style="float: right;;" >Update Profile information</a>
  </div>
</div>

</div>
</div>
</div> <!-- form div close here -->
</form>
<?php  include('footer.inc') ?>
</div><!-- body close here -->
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target_dir = "profile_pictures/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["file"]["tmp_name"]);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  $_SESSION['error']= "Sorry, only JPG, JPEG, PNG & files are allowed.";
  header('location:profile.php');
  exit();
    }
  else{
    if($check !== false) {
       $img_name = $_FILES["file"]["name"];
       //$ext = pathinfo($img_name,PATHINFO_EXTENSION);
  
        $new_file_name = $record['email'].".png";
        move_uploaded_file( $_FILES["file"]["tmp_name"], $target_dir.$new_file_name);
        //rename($target_file.$new_file_name, $target_dir.$record['email'].".".end);
          $_SESSION['success']= "Profile Picture uploaded Successuflly";
  header('location:profile.php');
  exit();
   }
    }
}
?>
