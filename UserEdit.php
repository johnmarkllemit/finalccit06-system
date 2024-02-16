<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/all.min.css">
<script src="js/bootstrap.bundle.js"></script>
</head>
<body class="bg-primary">
	
<div class="position-absolute bottom-70 start-50 translate-middle-x" >
    <div class="card mt-4"  style="width: 30rem;">
  <div class="card-body">
<br>
<?php
    				if(ISSET($_GET['id'])){
    					require_once 'conn.php';
    					$id = $_GET['id'];
    					$sql = $conn->prepare("SELECT * FROM member WHERE `mem_id`='$id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>
<form method="POST" action="UserUpdate.php?id=<?php echo $id?>">
<h3 class=""><center>User Edit</center></h3>   
<div class="form-gruop">
    <center><label>Firstname</label></center>
    <input type="text" class="form-control"   value="<?php echo $row['firstname']?>" name="firstname"/>
</div>
<div class="form-gruop">
    <center><label>Lastname</label></center>
    <input type="text" class="form-control"   value="<?php echo $row['lastname']?>" name="lastname"/>
</div>
<div class="form-group">
    <center><label>Address</label></center>
    <input type="text" class="form-control"  value="<?php echo $row['address']?>" name="address"/>
</div><br>
<div class="form-group">
    <button type="submit" class="form-control btn btn-warning" name="store">UPDATE</button>
</div>
</form> 
         
  </div>
</div>
</body>
</html>