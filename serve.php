<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class="bg-success">
<div class="position-absolute bottom-70 start-50 translate-middle-x" >
    <div class="card mt-4"  style="width: 70rem;">
  <div class="card-body">
<center>
 <h3><b>UPDATE USER ACCOUNT-INFO</b></h3>
<div class="container">
  <form method="POST">
    <input type="text" class="col-md-7 p-2 mt-3" placeholder="search your user account info" name="keyword">
    <button class="btn btn-dark  btn-sm p-2 ms-3 " name="search">Search</button>

</form>
    			<?php include 'search.php';?>
</div>
  </center>
</body>
</html>