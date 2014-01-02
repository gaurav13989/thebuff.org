<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - About Us</title>
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
	<div id="mainBody">
		<div style="font-size: 20px;">
			<div id="leftColTitle">About Us</div>
			<div id="leftColBody">
				<div id="leftColBody" >
					<div class="leftColStoryEvnt">
						<div class="event"  style="width: 890px; background-color: rgb(120,120,200);background-color: rgba(210,220,210,0.6);">	
							<div id="leftColTitle" style="background-color: transparent; font-size: 20px;">People Involved</div>
							<div class="eventBody" style="padding-left: 15px;">
								<div class="eventTitle">Gaurav Komera</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									The Alpha and Omega of TheBuff.Org.
									The person responsible for starting this initiative.
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Siddharth Khialani</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									The DB Man and a Co-founder.
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Ambreen Kazi</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									The Grammar Nazi, in other words our content composer.
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Mahesh Darak</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									Incharge of testing and innovation. He has been a big trouble for our development team. Pure tester blood!
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Barkha Java</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									Our creative incharge.
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Prathmesh Kadam</div>
								<div class="eventDesc" style="font-size: 13px; padding-left: 8px;">
									Our confidant!
								</div>
							</div>
						</div>
					</div>
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
