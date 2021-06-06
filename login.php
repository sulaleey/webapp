<html>
<head>
<link rel="stylesheet" href="css/mycss.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title></title>
</head>
<body>
<div class="container-fluid" ><!-- Body start here -->

<?php	include('header.inc')?>

<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom"><!--header jumbotron start here -->
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Web Development Assigment</span>
      </a>
    </header>

       <div class="form"><!-- Form Div start here -->
<div class="card  mb-3" > <!-- card Div start here -->
<div class="card-header">User Login Form
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

<div class="row form-floating">
<div class="col">
    <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email" required="">
  </div>
</div>

<div class="row form-floating ">
  <div class="col " >
    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required="">
  </div>
  </div>
  
  <br />
<div class="row form-floating">
<div class="col ">
    <input type="submit" class=" form-control btn  btn-success" value="Login" >
  </div>
</div>

 <div class="row">
    <div class="col">
    <a  class=" nav-item" href="register.php" style="text-decoration: none; color: green; float: right;" >Register as New User</a>
  </div>

</div> <!-- card div close here -->
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
    $email = check_input($_POST["email"]);
    $pass =sha1(check_input($_POST["password"]));
include('connection.inc');
$sql = "SELECT* FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);

if($num_rows>0){ 
    $record = mysqli_fetch_assoc($query);
    $db_pass = $record['password'];
    if($db_pass == $pass){
    $_SESSION['status']= 'login';
    $_SESSION['user']= $record['fullname'];
    $_SESSION['email']= $record['email'];
    header('location:profile.php');
    exit();
    }
    else {
    $_SESSION['error']= "Incorrect Email or Password";
    header('location:login.php');
    exit();
      }
    
} 
    
else {
    $_SESSION['error']= "User with this Email Does Not Exist";
    header('location:login.php');
    exit();
      }

   }   
?>
 </div>
    </div>
</div><!-- body close here -->
<?php  include('footer.inc') ?>

</body>
</html>
