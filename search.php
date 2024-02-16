<?php
    	require 'conn.php';
    	if(ISSET($_POST['search'])){
    ?><br>
    	<table class="table table-bordered">
    		<thead class="alert-info">
    			<tr>
    				<th>Firstname</th>
    				<th>Lastname</th>
					<th>Address</th>
    				<th>Action</th>
		</tr>
    		</thead>
    		<tbody>
    			<?php
    				$keyword = $_POST['keyword'];
    				$query = $conn->prepare("SELECT * FROM member WHERE firstname LIKE '%$keyword%' or lastname LIKE '%$keyword%' or address LIKE '%$keyword%' ");
    				$query->execute();
    				while($row = $query->fetch()){
    			?>
    			<tr>
    				<td><?php echo $row['firstname']?></td>
    				<td><?php echo $row['lastname']?></td>
					<td><?php echo $row['address']?></td>
                    <td><a class=" text-decoration-none ms-3" href="UserEdit.php?id=<?php echo $row['mem_id']?>">Edit</a></td>
    			</tr>
     
     
    			<?php
    				}
    			?>
    		</tbody>
    	</table>
    <?php		
    	}else{
    
    		//echo 'data not found';
    	}
    ?>