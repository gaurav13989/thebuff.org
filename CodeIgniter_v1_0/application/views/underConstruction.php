<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Page under construction!</title>
	<style type="text/css">

	</style>
<script type="text/javascript">
$(function(){
	$('#reportBugTag').click(function(){
		var left = $(this).parent().position().left;	
		if(left == -170)
			$(this).parent().animate({
				left: "0px",
			});
		else
			$(this).parent().animate({
				left: "-170px",
			});
	});
});
</script>
</head>
<body>
	<?php
		$this->load->view('topbar');
	?>
	<div id="mainBody" style="padding-top:200px;">
		<div style="font-size: 20px; text-align: center;">
			<img src="/images/Under_Construction.png" width="150px" height="150px" style="margin-bottom: 10px;"/>
			<div>PAGE UNDER CONSTRUCTION</div></div>
		<br /><br /><br /><br /><br /><br />
	<?php
		$this->load->view('footer');
	?>
	</div>
	
</body>
</html>
