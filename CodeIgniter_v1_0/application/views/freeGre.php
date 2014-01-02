<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheBuff - FreeGre</title>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>
<script type="text/javascript" src=<?php echo '"'.base_url().'js/menu.js"';?>></script>

</head>
<body>
	<div id="bodyContentContainer">
		<div id="bodyContent">
	    	<div id="bowl">
	        	<div id="water">
	    			<!-- php if condition to check if any user is logged in or no -->
	            	<div id="loggedIn"><?=$logMsg;?></div>
	            	<div class="clear"></div>
	            	<!-- if condition closed -->        		
	            	<div id="fish">
	                   	<!-- FreeGre section begins -->
	                   		<img src=<?php echo '"'.base_url().'images/comingVerySoon.jpg"';?>></img>
	                   	<!-- FreeGre section ends -->
	                </div>
	            </div>
	        </div>
		</div>    
	</div>
</body>
</html>