
<nav class="navbar  navbar-expand-sm footer ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php" style="color: white;">Home</a>
  </li>
  
  <?php
	if(isset($_SESSION['status'])){
 
   echo ' <li class="nav-item">
    <a class="nav-link" href="profile.php" style="color: white;">Profile</a>
  </li>';
	    echo ' <li class="nav-item" style="text-align: right; float:right;color:white;">
    <a class="nav-link" href="logout.php" style="text-align: right; float:right;color:white;">Log Out</a>
  </li>';
	}
   else{
    echo ' <li class="nav-item">
    <a class="nav-link" style="text-align: right; float:right;color:white;" href="register.php">Register</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" style="text-align: right; float:right; color:white;" href="login.php">Login</a>
  </li>';
   }
?>
 </ul>
    </div>
  <div class="row">
    <span class="">
    <p  style="color: white;" class="mt-5 mb-3 text-center" >&copy; Group Assigment Computer Science Department MAU Yola <?php echo date('Y')?></p>
</span>
  </div>  
</nav><!-- footer nav close here -->


