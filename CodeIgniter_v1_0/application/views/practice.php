<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Practice</title>
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

	$('.menuItemOther').each(function(){
		if($(this).html() == 'PRACTICE')
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

	$('div[id^=tc]').on('click', function(){
		$('#practiceBody').show();
		$('#practiceBody').html('<div style="text-align: center;"><img src="/images/loading2.gif"/></div>');
		var type = 'tc';
		var no = $(this).attr('id').replace('tc', '');
		$.ajax({
			type: "POST",
			data: { },
			url: "/gre/getPractice/textCompletion/"+no,
			timeout: 10000,
			error: function(jqXHR, textStatus, errorThrown){
				alert("We cannot reach our servers at this moment. Please try again after some time.  Sorry for the inconvinience.");
				$('#practiceBody').html('');				
			}
		}).done(function(data){
			$('#practiceBody').html(data);
			$('.TCP').trigger('click');
		});
	});
	$('.TCP').click(function(){
		$('.textCompletionSets').toggle('slide');
	});
});
</script>
	<style type="text/css">
		#practiceBody {
			padding: 10px;
			font-size: 13px;
			display: none;
		}
		.question {
			padding: 5px;
			margin-bottom: 10px;
			background-color: #FAE2BF;
		}
		.blanks, .blank1, .blank2, .blank3, .explaination, .correctOptions {
			display: none;
		}
		.explaination {
			font-style: italic;
			background-color: #DFFAEE;
			padding: 3px;
		}
		.group1, .group2, .group3 {
			display: inline-block;
			width: 25%;
			margin: 3px;
			text-align: center;
		}
		.option {
			border: 1px solid #000;
			padding: 3px;
			margin-bottom: -1px;
			background-color: #DDDDDD;
			cursor: pointer;
		}
		.groups {
			text-align: center;
		}
		#score {
			background-color: #FF3300;
			text-align: center;
			color: white;
			padding: 5px;
			display: none;
		}
		.textCompletionSet {
			float: left;
			font-style: italic;
			font-size: 12px;
			padding: 5px 15px 5px 15px;
		}
		.practiceTypes {
			padding: 10px 20px 10px 20px;
		}
		.textCompletionSets {
			display: none;
		}
		.TCP {
			padding: 5px 10px 5px 10px;
			background-color: rgb(255,255,255);
			background-color: rgba(255,255,255,0.2);
			color: rgba(101,101,101,0.9);
			font-size: 14px;
			text-shadow: 0px 0px 1px #555;
			cursor: pointer;
			width: auto;
			float: left;
		}
		.textCompletionSet {
			cursor: pointer;
			margin-right: 2px;
		}
	</style>
</head>
<body>
	<?php
		$this->load->view('topbar');
	?>
	<div id="mainBody">
		<div id="leftCol" style="width: 100%;">
			<div id="leftColTitle">Practice - The only thing that makes you perfect!</div>
			<div id="leftColBody">
				<div class="practiceMenu">
					<div class="practiceTypes">
						<div class="TCP">Text Completion Practice</div>
						<div style="clear: both;"></div>
					</div>
					<div class="practiceQuesSets">
						<div class="textCompletionSets">
							<?php
								$fileCount = 0;
								$dir = opendir('../xml/textCompletion/');
								while (false !== ($filename = readdir($dir))) {
									if ($filename != '.' && $filename != '..')    
										$fileCount++;
								}
								for($i = 1;$i<=$fileCount;$i++)
									echo "<div id='tc".$i."' class='textCompletionSet'>Question Set ".$i."</div>";
							?>
							<div style="clear: both;"></div>
						</div>
					</div>
				</div>
				<div id="practiceBody"></div>
			</div>
		</div>
		<div class="clear"></div>
		<?php
			$this->load->view('footer');
		?>
	</div>
	
</body>
</html>
