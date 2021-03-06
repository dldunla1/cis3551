<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
    		<div class="row">
    			<h3>Businesses Grid</h3>
    		</div>
			<div class="row">
				<p> 
					<a href="seller_create.php" class="btn btn-success">Create Business</a>
				</p>
				<p> 
					<a href="customers1.php" class="btn">Customer Grid</a>
				</p>
				<p> 
					<a href="events.php" class="btn">Company Grid</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Business Name</th>
		                  <th>Business Email</th>
		                  <th>Site Name</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM sellers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['seller_name'] . '</td>';
							   	echo '<td>'. $row['seller_email'] . '</td>';
							   	echo '<td>'. $row['seller_item'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="seller_read.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="seller_update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="seller_delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>