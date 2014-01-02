<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Home</title>
	<style type="text/css">

	</style>
	<link rel='stylesheet' id='camera-css'  href='/css/camera.css' type='text/css' media='all'> 
	<script type='text/javascript' src='/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='/js/camera.min.js'></script>
	
	<script type="text/javascript">
	jQuery(function(){
		
		jQuery('#camera_wrap_1').camera({
			thumbnails: false,
			height: '250px',
			fx: 'simpleFade'
		});

		jQuery('#camera_wrap_2').camera({
			height: '400px',
			loader: 'bar',
			pagination: false,
			thumbnails: true,
		});
	});

	var timeoutHandle;
function next()
{
	timeoutHandle = window.setTimeout(function(){
		$('#next').trigger('click');
	},7000);
	
}
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
	
	$('.giveFeedback').click(function(){

		$('#reportBugTag_').trigger('click');

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

	// var timeoutHandle = "";
	timeoutHandle = window.setTimeout(function() {
		timeoutHandle = window.setTimeout(function(){
			$('#next').trigger('click');
		},7000);
	}, 7000);
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
		//timeoutHandle = window.setTimeout(next(), 7000);;
		next();
	});
	
	//next();
	opr = "";

});


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

		<div id="home" style="line-height: 125%;">
			<div class="column" id="col1">
				<div class="grp">
					<div class="grpTitle">EVENTS</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px;">
							Watch this space for the latest news! From exciting new features to scholarship programs to test-a-thons, <a style="font-style: italic;" href="<?=base_url('gre/events');?>">click here</a> to know more
						</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">ARTICLES</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px">
							Read what people who have already given the GRE have to say to you! <div style="margin-top: 10px; cursor: pointer; font-style: italic;"><a href="<?=base_url('gre/notes');?>">Click here.</a></div>
							<div style="height: 15px; box-shadow: 0px 2px 3px -2px #888; margin: 10px; margin-right: auto; margin-left: auto; width: 80%;"></div>
							<div>Already given the GRE? Share your views and experience with others. Write in to us at <a style="display: block; font-style: italic;" href="mailto:notes@thebuff.org">notes@thebuff.org</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="column leftLineOnCol"  id="col2">
				<div class="grp">
					<div class="grpTitle">WORDS</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px;">Think you have a strong vocab? Or does the Verbal section still give you nightmares? Check out our exhaustive <a style="font-style: italic" href="<?=base_url('gre/words');?>">word list</a> to kick start your preparations.<br /><br />
						</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">TESTS</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px;">
							So many full length tests to choose from before you actually appear for the test of your life. Get in-depth analysis of your performance and compare it with others'. <br /><br />We are currently working on this, but you may check out our planned interface for the tests <a style="font-style: italic" href="<?=base_url('gre/tests');?>">here!</a> You will need to register yourself with us first. <div class="giveFeedback" style="margin-top: 10px; cursor: pointer; font-style: italic; display: inline;">But do let us know how you like it.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="column leftLineOnCol"  id="col3">
				<div class="grp">
					<div class="grpTitle">FEEDBACK</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px;">
							Give us your valuable feedback and help us help you better.<br />
							<div class="giveFeedback" style="margin-top: 10px; cursor: pointer; font-style: italic;">Click here to give your feedback</div>
							<div style="margin-top: 10px; cursor: pointer; font-style: italic;"><a href="<?=base_url('gre/feedback');?>">Click here to view feedback given by others!</a></div>
						</div>
					</div>
				</div>
				<div class="grp">
					<div class="grpTitle">CAREERS</div>
					<div class="grpBody">
						<div class="grpItem" style="font-size: 12px;">
							We are a very small team of like-minded mavericks, working together to bring to our visitors a clean, free and easy-to-use interface. Things may not always be perfect here but that's where you guys come in. Our professional commitments do not allow us to dedicate our entire attention to theBuff.Org which is why we are planning to recruit interns i.e. you. Those plans will be shared with everyone as soon as a few others fall in place. So stay tuned! In case of any queries drop us a <span class="giveFeedback" style="cursor: pointer; font-style: italic;">comment / feedback</span>. Thanks.
						</div>
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