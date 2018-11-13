<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Robot</title>
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/css/"; ?>jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/css/"; ?>theme.css" rel="stylesheet">    
  
  </head>

  <body role="document" data-spy="scroll" data-target=".navigation-spy">    
    
  	
    <div class="container">
    	<div class="spacer"></div>
		<table class="table table-striped table-condensed table-hover">
			<tr>
				<th>ID</th><th>Session Start</th><th>Session Finish</th><th>IP Address</th>
				<?php
					foreach($session as $record)
					{						
						echo "<tr><td>".$record->ID."</td><td>".$record->sessionstart."</td><td>".$record->sessionfinish."</td><td>".$record->ipaddress."</td></tr>";
					}
				
				
				?>
			</tr>
		</table>
        <div class="spacer"></div>
    </div>   
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()."assets/js/"; ?>jquery-1.11.0.min.js"></script> 
    <script src="<?php echo base_url()."assets/js/"; ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/js/"; ?>jquery-ui-1.10.4.custom.min.js"></script>
    <script src="<?php echo base_url()."assets/js/"; ?>jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()."assets/js/"; ?>jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url()."assets/js/"; ?>jquery.localScroll.min.js"></script>
    <script src="<?php echo base_url()."assets/js/"; ?>jQueryRotateCompressed.js"></script>
	<script>
		var androidbot = "<img id='androidbot' src='<?php echo base_url()."assets/images/android_robot.png"; ?>' style='width:80%;height:80%;position:absolute;margin:auto;margin-top:10%'></img>";
		var x_axis;var y_axis;var face;var width;var height;
		var page = "<?php echo base_url()."play/" ?>";
	</script>
    <script src="<?php echo base_url()."assets/js/"; ?>custom.js"></script>
  </body>
</html>
