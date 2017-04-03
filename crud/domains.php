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
    			<h3>Domain File</h3>
    		</div>
			<div class="row">
				<p>
					<a href="domains_create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th> Customer Name</th>
		                  <th> Business Name</th>
						  <th> Domain Name</th>
		                  <th> Renewal Date</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
					   $sql = 'SELECT * FROM business ORDER BY id DESC';
   					   $sql = 'SELECT * FROM business ORDER BY id DESC';

	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['cust_id'] . '</td>';
							   	echo '<td>'. $row['business_name'] . '</td>';
							   	echo '<td>'. $row['business_site'] . '</td>';
							   	echo '<td>'. $row['business_end'] . '</td>';
							   	
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="domains_read.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="domains_update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="domains_delete.php?id='.$row['id'].'">Delete</a>';
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