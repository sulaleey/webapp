<div class="nav-scroller py-1 mb-2">
<div class="nav"><!-- nav start here -->
<ul class="nav justify-content-end">
  <li class="nav-item">
      </li>
</ul>
</div>
<!-- nav close here -->
</div>

 <header class="p-3 bg-success text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Courses</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Programs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Faculties</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Campus</a></li>
        </ul>

        

        <div class="text-end">
         <?php
  session_start();
	if(isset($_SESSION['status'])){
 
   echo ' <button type="button" class="btn btn-outline-light me-2"><a class="nav-link" href="profile.php" style="color: white;">Profile</a></button>
';
	    echo ' <button type="button" class="btn btn-danger me-2"><a class="nav-link" href="logout.php" style="color: white;">Log Out</a></button>
';
	}
   else{
    echo '

  ';
   }
?>
         
          
        </div>
      </div>
    </div>
  </header>
