<!doctype html>
<html lang="en">
<html>
<head>
<link rel="stylesheet" href="css/mycss.css">
<link rel="stylesheet" href="css/bootstrap.css">
<title></title>
</head>
<body>
<div class="container-fluid"><!-- Body start here -->

<?php
	include('header.inc')
?>

<div class="row align-items-center row1 "> <!-- row1 start here -->
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom"><!--header jumbotron start here -->
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Web and Internet Programming Assignment1</span>
      </a>
    </header>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Modibbo Adama University Yola</h1>
        <p class="col-md-8 fs-4">New Paragraph about Mautech</p>
        <button class="btn btn-primary btn-lg" type="button">Read More</button>
      </div>
    </div>


    <div class="row align-items-md-stretch"> <!-- row2 start here -->
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-success rounded-3">
          <h2>Computer Science Department</h2>
          <p>Understand More requirement to study Computer science</p>
          <button class="btn btn-outline-light" type="button">Read More</button>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Mautech Information</h2>
          <p>Paragraph about Mautech</p>
          <button class="btn btn-outline-secondary" type="button">Read More</button>
        </div>
      </div>
    </div> <!-- row2 close here -->

</div><!-- row1 close here -->
</div><!-- container close here -->

<?php
	include('footer.inc')
?>
</div><!-- body close here -->
</body>
</html>
