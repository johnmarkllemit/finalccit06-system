<?php include 'header.php';

if(!isset($_SESSION['logged_in'])){
    header("location: login.php");
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Include DataTables CSS and JavaScript -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</head>
<body class="bg-secondary">
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link acitve" aria-current="page" href="index.php" style="color: white;"><b>Home</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="about.php" style="color: white;"><b>About</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="user.php" style="color: white;"><b></b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#"></a>
  </li>
</ul><br><br>
<center>
 <br>
<div class="col-md-3"></div>
  <div class="col-md-6 well">
		<h3 class="text-warning">Student-Info</h3>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="add.php">
				<div class="form-group">
					<label for="pass" class="col-sm-2 col-form-label">firstname</label>
					<input class="form-control" type="text" name="firstname"/>
				</div>
				<div class="form-group">
					<label for="pass" class="col-sm-2 col-form-label">Lastname</label>
					<input class="form-control"  type="text" name="lastname"/>
				</div>
				<div class="form-group">
					<label for="pass" class="col-sm-2 col-form-label" >Address</label> 
					<input class="form-control" type="text" name="address"/>
				</div><br>
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="save">Save</button>
				</div><br>

			</form>
			<form method="POST" action="add.php">
			<div class="form-group">
                    <a href="serve.php" class="btn btn-primary form-control" type="submit" name="check">Edit</a>
				</div>
			</form>
		</div><br>
		<div class="position-absolute bottom-70 start-50 translate-middle-x" >
          <div class="card mt-4"  style="width: 70rem;">
            <div class="card-body">
		<table id="datatable" class="table table-bordered">
			<thead class="alert-warning">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
           </thead>
			<tbody class="alert-warning">
				<?php
					require 'conn.php';
					$sql = $conn->prepare("SELECT * FROM member ORDER BY mem_id DESC");
					$sql->execute();
					while($row = $sql->fetch()){
				?>
				<tr>
					<td><?php echo $row['firstname']?></td>
					<td><?php echo $row['lastname']?></td>
					<td><?php echo $row['address']?></td>
					<td><a href="edit.php?id=<?php echo $row['mem_id']?>">Edit</a> | <a href="delete.php?id=<?php echo $row['mem_id']?>">Delete</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		
		<script>
      $(document).ready(function() {
         $('#datatable').DataTable();
      });
   </script>
	</div>
</div>
 </center>	
</body>
</html>
