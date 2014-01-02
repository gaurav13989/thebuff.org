<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Home</title>
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
	
	$('.menuItemOther').each(function(){
		if($(this).html() == 'HOME')
		{
			$(this).attr('id','currentPage');
		}
	});
	
	var colHt1 = $("#col1").height();
	var colHt2 = $("#col2").height();
	var colHt3 = $("#col3").height();
	var colHt = 0;
	
	if(colHt1>colHt2)
	{
		if(colHt1>colHt3)
			colHt = colHt1;
		else
			colHt = colHt3;
	}
	else
	{
		if(colHt2>colHt3)
			colHt = colHt2;
		else
			colHt = colHt3;
	}

	$("#col1").height(colHt);
	$("#col2").height(colHt);
	$("#col3").height(colHt);

	var timeoutHandle = "";
	var current = "image1";
	var opr = "";
	$("#"+current+" .imageText").slideDown(1500);
	$("#"+current).fadeIn(1000);

	$('#next,#prev').bind('click',function(){		
		opr = "";
		opr = $(this).attr('id');
		var button = $(this).attr('id');
		var temp = current.substring(5);
		
		if(opr != 'next' && opr != 'prev')
			opr = 'next';

		$("#"+current+" .imageText").slideUp("fast");
		$("#"+current).fadeOut("fast");
		
		var current2 = parseInt(temp,10);

		if(opr == 'prev')
		{
			current2 = current2 - 1;
			if(current2 < 1)
				current2 = 5;
			$("#image"+current2+" .imageText").slideDown(1500);
			$("#image"+current2).fadeIn(1000);
			current = "image"+current2;
		}
		else if(opr == 'next')
		{
			current2 = current2 + 1;
			if(current2 > 5)
				current2 = 1;
			$("#image"+current2+" .imageText").slideDown(1500);
			$("#image"+current2).fadeIn(1000);
			current = "image"+current2;
		}
		window.clearTimeout(timeoutHandle);	

	});

	next();
	opr = "";

});
function next()
{
	timeoutHandle = window.setTimeout(function(){
		$('#next').trigger('click');
		next();
	},7000);
}
	</script>
</head>
<body>
	<?php 
		$this->load->view('topbar');
	?>
	<div id="mainBody">
		<?php 
			$this->load->view('slider');
		?>
		<div id="rightCol">
			<?php 
				$this->load->view('whatshot');
			?>
		</div>
		<div class="clear"></div>

		<div id="home">
			<div class="column" id="col1">
				<div class="grp">
					<div class="grpTitle">EVENTS</div>
					<div class="grpBody">
						<div class="grpItem">
							event1event1event1event1event1event1
							event1event1event1event1event1event1
							event1event1event1event1event1event1
						</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">NOTES</div>
					<div class="grpBody">
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
						<div class="grpItem">note1</div>
					</div>
				</div>
			</div>
			<div class="column leftLineOnCol"  id="col2">
				<div class="grp">
					<div class="grpTitle">WORDS</div>
					<div class="grpBody">
						<div class="grpItem">words1</div>
						<div class="grpItem">words1</div>
						<div class="grpItem">words1</div>
						<div class="grpItem">words1</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">TESTS</div>
					<div class="grpBody">
						<div class="grpItem">test1</div>
						<div class="grpItem">test1</div>
						<div class="grpItem">test1</div>
						<div class="grpItem">test1</div>
					</div>
				</div>
			</div>
			<div class="column leftLineOnCol"  id="col3">
				<div class="grp">
					<div class="grpTitle">FEEDBACK</div>
					<div class="grpBody">
						<div class="grpItem">
							feedback1feedback1feedback1feedback1
							feedback1feedback1feedback1feedback1
							feedback1feedback1feedback1feedback1
							feedback1feedback1feedback1feedback1
						</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">CAREERS</div>
					<div class="grpBody">
						<div class="grpItem">careers1</div>
						<div class="grpItem">careers1</div>
						<div class="grpItem">careers1</div>
						<div class="grpItem">careers1</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
			<?php 
				$this->load->view('footer');
			?>
	</div>
</body>
</html>