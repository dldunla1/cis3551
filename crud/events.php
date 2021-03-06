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
    			<h3>Event Grid</h3>
    		</div>
			<div class="row">
				<p>
					<a href="eventCreate.php" class="btn btn-success">Create</a>
				</p>
				<a href="customers1.php" class="btn">Customers Grid</a>
				</p>
				<p>
					<a href="sellers.php" class="btn">Businesses Grid</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Customer Name</th>
		                  <th>Payment</th>
		                  <th>Business Name</th>
		                  <th>Business Email</th>
						  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM events ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['event_date'] . '</td>';
							   	echo '<td>'. $row['event_time'] . '</td>';
							   	echo '<td>'. $row['event_location'] . '</td>';
								echo '<td>'. $row['event_description'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="eventRead.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="eventUpdate.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="eventDelete.php?id='.$row['id'].'">Delete</a>';
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