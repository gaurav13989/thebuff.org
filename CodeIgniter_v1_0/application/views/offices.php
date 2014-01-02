<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Offices</title>
	<style type="text/css">
		.map {
			background-image: url('/images/worldMap.jpg'); 
			background-repeat: no-repeat; 
			background-size: 900px; 
			height: 500px;
			width: 900px;
		}
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
	<div id="mainBody">
		<div id="leftCol" style="width: 100%;">
			<div id="leftColTitle">Offices - We are spreading like fire!</div>
			<div id="leftColBody" class="map">
				<div class="leftColStoryEvnt">
					<img src="/images/flag.png" style="position: relative; left: 605px; top: 230px; height: 25px; cursor: pointer; z-index: 1;" title="Mumbai"/>
					<img src="/images/flag.png" style="position: relative; left: 165px; top: 140px; height: 25px; cursor: pointer;" title="New York"/>
					<img src="/images/flag.png" style="position: relative; left: 555px; top: 235px; height: 25px; cursor: pointer;" title="Pune"/>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<?php
			$this->load->view('footer');
		?>
	</div>
	
</body>
</html>
