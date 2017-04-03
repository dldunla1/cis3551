<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$siteError = null;
		$startError = null;
		$endError = null;
		
		
		// keep track post values
		$name = $_POST['business_name'];
		$site = $_POST['business_site'];
		$start = $_POST['business_start'];
		$end = $_POST['business_end'];
		
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Business Name';
			$valid = false;
		}
		
		if (empty($site)) {
			$emailError = 'Please enter Business Web URL';
			$valid = false;
		
		}
		
		
		if (empty($start)) {
			$emailError = 'Please enter date site stated being built';
			$valid = false;
		
		}
		
		
		if (empty($end)) {
			$emailError = 'Please Enter date the site was finish being built';
			$valid = false;
		
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO business (business_name,business_site,business_start,business_end) values(?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$site,$start,$end));
			Database::disconnect();
			header("Location: business.php");
		}
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
		    			<h3>Create a Business</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="business_create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Business Name</label>
					    <div class="controls">
					      	<input name="business_name" type="text"  placeholder="Business Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($siteError)?'error':'';?>">
					    <label class="control-label"> Web URL</label>
					    <div class="controls">
					      	<input name="business_site" type="text" placeholder=" example@example.com" value="<?php echo !empty($site)?$site:'';?>">
					      	<?php if (!empty($siteError)): ?>
					      		<span class="help-inline"><?php echo $siteError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					 
					 
					 <div class="control-group <?php echo !empty($startError)?'error':'';?>">
					    <label class="control-label"> Start Date</label>
					    <div class="controls">
					      	<input name="business_start" type="text" placeholder="00/00/00" value="<?php echo !empty($start)?$start:'';?>">
					      	<?php if (!empty($startError)): ?>
					      		<span class="help-inline"><?php echo $startError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  
					  <div class="control-group <?php echo !empty($endError)?'error':'';?>">
					    <label class="control-label"> End Date</label>
					    <div class="controls">
					      	<input name="business_end" type="text" placeholder="00/00/00" value="<?php echo !empty($end)?$end:'';?>">
					      	<?php if (!empty($endError)): ?>
					      		<span class="help-inline"><?php echo $endError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					 
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="business.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>