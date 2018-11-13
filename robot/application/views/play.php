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
  	<div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="container">
			<div class="navbar-header">        
        		<a class="navbar-brand" href="<?php echo base_url()."play" ?>">
                	<img id='robot-logo' src='<?php echo base_url()."assets/images/android_robot.png"; ?>' style='height:100%;'></img>
                </a>
 				<button class="navbar-toggle" data-toggle="collapse" data-target="#navHeaderCollapse">
    	        	<span class="icon-bar"></span>
        	        <span class="icon-bar"></span>
            	    <span class="icon-bar"></span>
            	</button>
        	</div>
            <div class="collapse navbar-collapse navigation-spy" id="navHeaderCollapse">        		
                <ul class="nav navbar-nav navbar-left">                
                	<li>
                    	<a href="<?php echo base_url()."play" ?>">
                		</a>
                    </li>
                    <li>
                    	
                    	<a href="#"><span id="info"></span></a>               			         
                    </li>
                                        
                </ul>                
                <ul class="nav navbar-nav navbar-right">                	
                    <li>
                    	<a href="#" class="navbar-custom" id="main-menu-button">
            				<span class="glyphicon glyphicon-th-large glyphicon-custom"></span> <span>Board Size</span>
                		</a>
                    </li>
                                        
                </ul>                
            </div>            
        </div>
    </div>
    
    <div class="navbar navbar-default navbar-fixed-bottom">
    	<div class="container">
			<div class="navbar navbar-left">
				<button class="btn btn-warning" id="robot-placer-modal-button">Place Robot</button>
				<button class="btn btn-default" id="left-button">Left</button>
				<button class="btn btn-default" id="right-button">Right</button>
				<button class="btn btn-success" id="move-button">Move</button>
			</div>
			<div class="navbar navbar-right">
				<button class="btn btn-info" id="report-button">Report</button>
				<button class="btn btn-success" id="print-session-button">Print All Session</button>
    		</div>
        </div>
    </div>
    
    
    
  	
    <div class="container">
    	<div class="spacer"></div>
		<div id="board">
		
		</div>
        <div class="spacer"></div>
    </div>
    
       
    
    <div class="modal fade" id="main-menu" role="dialog">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="form" id="main-menu-form" role="form">
            		<div class="modal-header">
                		<h3>Menu</h3>
               	 	</div>
                	<div class="modal-body">
                    	
                		<div class="form-group has-feedback">
                        	<label for="board-size" class="control-label">Please Insert Board Size :</label>
                            <input name="board-size" type="text" autocomplete="off" class="form-control" id="board-size" placeholder="Format : width,height. Max Width : 12. Example : 5,5">                                
                            
                        </div>
                	</div>
                	<div class="modal-footer">
                		<button class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" id="play-button">OK</button>
                	</div>
                </div>
            </div>
        </div>	
    </div>
    
	<div class="modal fade" id="robot-placer" role="dialog">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="form" id="robot-placer-form" role="form">
            		<div class="modal-header">
                		<h3>Robot Place</h3>
               	 	</div>
                	<div class="modal-body">
                    	
                		<div class="form-group has-feedback">
                        	<label for="robot-place" class="control-label">Please Enter Coordinate :</label>
                            <input name="robot-place" type="text" autocomplete="off" class="form-control" id="robot-place" placeholder="Format : x,y,f. Example : 5,5,North">                                
                            
                        </div>
                	</div>
                	<div class="modal-footer">
                		<button class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" id="robot-placer-button">OK</button>
                	</div>
                </div>
            </div>
        </div>	
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
