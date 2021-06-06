<html>
<head>
<link rel="stylesheet" href="css/mycss.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title></title>
</head>
<body>
<div class="container-fluid" ><!-- Body start here -->

<?php	include('header.inc')?>
<div class="row align-items-center row1 "> <!-- row1 start here -->
<div class="container py-1">
    <header class="pb-3 mb-4 border-bottom"><!--header jumbotron start here -->
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Web Development Assigment</span>
      </a>
    </header>

<div class="form"><!-- Form Div start here -->
<div class="card  mb-3" > <!-- card Div start here -->
<div class="card-header"> User Registration Form

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

</div><!-- card header div end here here -->
<div class="card-body"><!-- card body Div start here -->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  class="form" id="register-form">

<div class="row">
  <div class="col">
    <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name" required="">
  </div>
</div>

<div class="row">
  <div class="col">
    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required="">
  </div>
</div>

<div class="row">
<div class="col">
    <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email" required="">
  </div>
</div>

<div class="row">
  <div class="col">
    <input type="tel" class="form-control" placeholder="Phone" aria-label="Phone" name="phone" required="">
  </div>
</div>

<div class="row">
  <div class="col">
    <input type="tel" class="form-control" placeholder="Address" aria-label="Address" name="address" required="">
  </div>
</div>

<br />
<div class="row">
<div class="col">
    <input type="submit" class=" form-control btn  btn-success" value="Register" >
  </div>
</div> <!-- card div close here -->
</div> <!-- form div close here -->
</form>
      </div>
    </div>

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
$sql = "SELECT* FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);

if($num_rows>0){
    $_SESSION['error']= " User with this Email Already exist";
    header('location:register.php');
    exit;
}

$sql = "INSERT INTO users (fullname, email,phone, address, password)
VALUES ('$fullname', '$email', '$phone', '$address','$pass')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success']= "User Registration Completed sucessfully";
    header('location:login.php');
    exit(); 
    } 
    
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

   }   
?>
<?php  include('footer.inc') ?>
</div><!-- body close here -->
</body>
</html>
