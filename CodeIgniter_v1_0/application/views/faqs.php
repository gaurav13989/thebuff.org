<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - FAQs</title>
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
		<div id="home" style="width: 100%">
			<div id="leftCol" style="width: 100%;">
				<div id="leftColTitle">FAQs</div>
				<? foreach($q->result() as $row) {?>
				<div id="leftColBody" >
					<div class="leftColStoryEvnt" >
						<div class="event" style="width: 880px; background-color: rgb(170,200,240); padding: 10px; font-size: 13px; text-align: justify;">	
							<div class="eventTitle" style="padding-bottom: 10px;"><?=$row->faq;?></div>
							<div class="eventBody">
								<?=$row->faqa;?>
							</div>
						</div>
					</div>
				</div>
				<? } ?>
			</div>
			<div class="clear"></div>
			<?php 
				$this->load->view('footer');
			?>
		</div>
	</div>
</body>
</html>