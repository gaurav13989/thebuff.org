<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Events</title>
	<style type="text/css">

	</style>
	<script type="text/javascript">

		$(function(){
			$('.menuItemOther').each(function(){
				if($(this).html() == 'EVENTS')
				{
					$(this).attr('id','currentPage');
				}
			});
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
		<div id="home">
			<div id="leftCol">
				<div id="leftColBody">
					<div class="leftColStoryEvnt">
						<? foreach($query->result() as $row) {?>
						<div class="event">
							<div class="eventBody">
								<div class="eventTitle"><?=$row->eventTitle;?></div>
								<div class="eventDesc"><?=$row->eventDescription;?></div>
							</div>
							<div class="eventMisc">
								<? if($row->eventType == 1) {?>
								<div class="eventMiscItem">On: <?=$row->eventDate;?></div>
								<? }
								else if($row->eventType == 2) {?>
								<div class="eventMiscItem">From: <?=$row->eventStartDate;?></div>
								<div class="eventMiscItem">To: <?=$row->eventEndDate;?></div>
								<? } ?>
								<div class="eventMiscItem">Contact: <?=$row->email;?></div>
							</div>
						</div>
						<? } ?>
					</div>
				</div>
			</div>
			<div id="rightCol">
				<?php 
					$this->load->view('whatshot');
				?>
			</div>
			<div class="clear"></div>
			<?php 
				$this->load->view('footer');
			?>
		</div>
	</div>
</body>
</html>