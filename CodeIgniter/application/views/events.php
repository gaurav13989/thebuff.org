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
						<div class="event">
							<div class="eventBody">
								<div class="eventTitle">Event Title</div>
								<div class="eventDesc">Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description DescriptionDescription Description Description Description Description</div>
							</div>
							<div class="eventMisc">
								<div class="eventMiscItem">Start Date</div>
								<div class="eventMiscItem">End Date</div>
								<div class="eventMiscItem">Contact us: Email@email.com</div>
							</div>
						</div>
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