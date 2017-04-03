<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: business.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM business where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Read a Business Details</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['business_name'];?>
						    </label>
					    </div>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label">WEB URL</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['business_site'];?>
						    </label>
					    </div>
					  </div>
					 
					 
					 
					  <div class="control-group">
					    <label class="control-label">Start Date</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['business_start'];?>
						    </label>
					    </div>
					  </div>
					  
					  
					   <div class="control-group">
					    <label class="control-label">End Date</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['business_end'];?>
						    </label>
					    </div>
					  </div>
					 
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="business.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>