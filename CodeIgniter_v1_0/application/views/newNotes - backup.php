<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Events</title>
	<style type="text/css">
	body {
		overflow-y: scroll;
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
	$('.LCStitle').click(function(){
		
		var windowHt = $(window).height();
		windowHt = windowHt - 150;

		var ht = windowHt + "px";
		if($(this).parent().next().height() != "5")
		{
			ht = "5px";
		}
		$(this).parent().next().animate({
			height: ht,
		},1000,function(){
			if(ht != "5px")
			{
				$('html, body').animate({scrollTop: $(this).offset().top-140}, 1000);		
			}
		});
	});

	$('.LCStitle').hover(function(){

		if($(this).parent().next().height() != "5")
		{
			$(this).attr('title','Click to close');
		}
		else
		{
			$(this).attr('title','Click to open');	
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

	$('.menuItemOther').each(function(){
		if($(this).html() == 'NOTES')
		{
			$(this).attr('id','currentPage');
		}
	});
});

	</script>
</head>
<body>
	<?php 
		$this->load->view('topbar');
		$this->db->where('viewStatus', 1);
		$query = $this->db->get('notes');
	?>
	<div id="mainBody">
		<div id="home">
			<div id="leftCol">
				<div id="leftColBody" style="min-height: 450px;">
					<?php foreach ($query->result() as $row) { ?>
					<div class="leftColStory">
						<div>
							<div class="leftVertical LCStitleHt"></div>
							<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
							<div class="LCStitle"><?=$row->noteTitle;?></div>
							<div class="clear"></div>
						</div>
						<div class="LCSbody" style="text-align: justify;">
							<div class="space"></div>
							<?=$row->note;?>
							<div class="space"></div>
							<div class="noteAuthor"><?=$row->noteAuthorName;?> - <?=$row->noteDate;?></div>
						</div>
					</div>
					<?php } ?>
					<!--<div class="leftColStory">
						<div>
							<div class="leftVertical LCStitleHt"></div>
							<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
							<div class="LCStitle">This is the title of note2</div>
							<div class="clear"></div>
						</div>
						<div class="LCSbody">
							<div class="space"></div>

							<div class="space"></div>
						</div>
					</div>
					<div class="leftColStory">
						<div>
							<div class="leftVertical LCStitleHt"></div>
							<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
							<div class="LCStitle">This is the title of note3</div>
							<div class="clear"></div>
						</div>
						<div class="LCSbody">
							<div class="space"></div>

							<div class="space"></div>
						</div>
					</div>
					<div class="leftColStory">
						<div>
							<div class="leftVertical LCStitleHt"></div>
							<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
							<div class="LCStitle">This is the title of note4</div>
							<div class="clear"></div>
						</div>
						<div class="LCSbody">
							<div class="space"></div>

							<div class="space"></div>
						</div>
					</div>
					<div class="leftColStory">
						<div>
							<div class="leftVertical LCStitleHt"></div>
							<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
							<div class="LCStitle">This is the title of note5</div>
							<div class="clear"></div>
						</div>
						<div class="LCSbody">
							<div class="space"></div>

							<div class="space"></div>
						</div>
					</div>
					-->
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