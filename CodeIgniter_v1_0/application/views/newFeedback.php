<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Feedbacks</title>
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
				<div id="leftColTitle">YOUR FEEDBACKS</div>
				<div id="leftColBody" >
					<div class="leftColStoryEvnt" >
						<? foreach($query->result() as $row) {?>
						<div class="event"  style="width: 890px;">	
							<div class="eventBody">
								<div class="eventTitle"><?=ucwords($row->name) . "<div style='font-weight: normal;font-style: italic;font-size: 12px;display: inline;margin-left: 10px;	'> at " . date('H:i', strtotime($row->date) + 11.5 * 3600) . " on " . date('d-m-Y', strtotime($row->date) + 11.5 * 3600)." (IST)</div>";?></div>
								<div class="eventDesc"><?=$row->comment;?> </div>
							</div>
						</div>
						<? } ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<?php 
				$this->load->view('footer');
			?>
		</div>
	</div>
</body>
</html>