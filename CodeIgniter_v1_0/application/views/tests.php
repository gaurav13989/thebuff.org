<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/jquery.color.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Tests</title>
	<style type="text/css">

	</style>
	<script type="text/javascript">
$(function(){

	$('.testItemGreen,.testItemRed').click(function(){

		$('#q'+$('#testNo').html()).css('border','');
		$('#q'+$('#testNo').html()).css('margin','0px');
		$('#q'+$('#testNo').html()).css('background','');
		$('#v'+$('#testNo').html()).css('border','');
		$('#v'+$('#testNo').html()).css('margin','0px');
		$('#v'+$('#testNo').html()).css('background','');

		$('#testNo').html($(this).attr('id').substr(1,$(this).attr('id').length-1));
		
		$('#testType').html($(this).parent().attr('id'));
		
		$(this).css('border','2px solid rgb(100,100,20)');
		$(this).css('margin','-2px');
		$(this).css('background','rgb(10,100,240)');
		//alert("test No: "+$('#testNo').html()+" type: "+$('#testType').html());

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
	$('.sliderButton').live('click',function(){
		var id = $(this).attr('id');
		
		if(id == 'nextq' || id == "nextv")
		{
			var temp = $(this).prev().scrollLeft();
			$(this).attr('id','');
			$(this).prev().animate({
				scrollLeft: temp+350
			}, 1000, function(){
				$(this).next().attr('id',id);
			});
		}
		else if(id == 'prevq' || id == "prevv")
		{
			var temp = $(this).next().scrollLeft();
			$(this).attr('id','');
			$(this).next().animate({
				scrollLeft: temp-350
			}, 1000, function(){
				$(this).prev().attr('id',id);
			});
		}

	});

	$('.menuItemOther').each(function(){
		if($(this).html() == 'TESTS')
		{
			$(this).attr('id','currentPage');
		}
	});
	$('.startTestButton').hover(function(){
		$(this).css('color','black');
	},function(){
		$(this).css('color','')
	});

	$('#start').live('click',function(){

		var testNo = $('#testNo').html();
		var testType = $('#testType').html();
		$('#testNoAndType').html('Test No. &nbsp;: '+testNo+'<br />Test Type: '+capitalize(testType)+'<br />');
		if(!parseInt(testNo))
		{
			$('#topMsg').animate({
				backgroundColor : 'red'
			}, 500, function(){
				$(this).animate({
					backgroundColor : 'transparent'
				}, 500, function(){
					$(this).animate({
						backgroundColor : 'red'
					}, 500, function(){
						$(this).animate({
							backgroundColor : 'transparent'
						}, 500);
					});
				});
			});
		}
		else
		{
			$('#testsMenu').slideUp(1000,function(){
				$('#test').slideDown(1000);	
			});
		}
	});
	$('#back').live('click',function(){
		$('#test').slideUp(1000,function(){
			$('#testsMenu').slideDown(1000);	
		});		
	});

});
function capitalize(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}
	</script>
</head>
<body>
<?php
	$this->load->view('topbar');
?>
<div id="mainBodyOther">
<div id="testsMenu">
	<div id="selTestVal" style="display: none;">
		<span id="testType"></span>
		<span id="testNo"></span>
	</div>
	<div class="leftColTitleClass" style="font-size: 15px; color: black;" id="topMsg">Please select a test</div>
	<div id="testsBody">
		<div class="leftColTitleClass" style="font-size: 18px; text-align: center;">QUANTITATIVE TESTS</div>
		<div class="testListBox">
			<div class="sliderButton" id="prevq">&lt;&lt;</div>
			<div class="testSlider" id="quant">
				<?php
				for($i = 1; $i <= 20; $i++)
				{
					?>
					<div id="q<?=$i;?>" class="testItemGreen">
						<div class="testItemContent">
							<div class="testItemTestNo">TEST <?=$i;?></div>
							click to<br />start
						</div>
					</div>
					<?php
				}	
				?>
			</div>
			<div class="sliderButton" id="nextq">&gt;&gt;</div>
		</div>
	</div>
	<div style="height: 15px; box-shadow: 0px 2px 3px -2px #888; margin: 25px;"></div>
	<div id="testsBody">
		<div class="leftColTitleClass" style="font-size: 18px; text-align: center;">VERBAL TESTS</div>
		<div class="testListBox">
			<div class="sliderButton" id="prevv">&lt;&lt;</div>
			<div class="testSlider" id="verbal">
				<?php
				for($i = 1; $i <= 20; $i++)
				{
					?>
					<div id="v<?=$i;?>" class="testItemGreen">
						<div class="testItemContent">
							<div class="testItemTestNo">TEST <?=$i;?></div>
							click to<br />start
						</div>
					</div>
					<?php
				}	
				?>
			</div>
			<div class="sliderButton" id="nextv">&gt;&gt;</div>
		</div>
	</div>
	<div style="height: 15px; box-shadow: 0px 2px 3px -2px #888; margin: 25px;"></div>
	<div class="startTestButton" id="start">
		<div style="cursor: pointer;">START TEST</div>
	</div>
</div>
<div id="test" style="display: none; height: 500px;">
	<div class="leftColTitleClass" style="font-size: 20px;padding-top: 150px; text-align: center; font-style: normal; width: auto; color: black;">
		Hi, Welcome to our tests section! Wish you all the best, do well!
	</div>
	<div class="leftColTitleClass" id="testNoAndType" style="padding-left: 390px;font-size: 17px; width: auto; font-style: normal; color: black;">

	</div>
	<div class="startTestButton" id="begin">
		<div style="cursor: pointer;">BEGIN TEST</div>
	</div>
	<div></div>
	<div class="startTestButton" id="back" style="width: 380px;">
		<div style="cursor: pointer;">Chose the wrong test? Go back and change it! Click here.</div>
	</div>
</div>
	<?php
		$this->load->view('footer');
	?>
</div>
</body>
</html>