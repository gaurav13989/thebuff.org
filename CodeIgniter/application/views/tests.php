<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Tests</title>
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
	$('.sliderButton').click(function(){
		var id = $(this).attr('id');
		var temp = $('.testSlider').scrollLeft();
		if(id == 'next')
		{
			$('.testSlider').animate({
				scrollLeft: temp+350
			}, 1000);
		}
		else if(id == 'prev')
		{
			$('.testSlider').animate({
				scrollLeft: temp-350
			}, 1000);
		}

	});

	$('.menuItemOther').each(function(){
		if($(this).html() == 'TESTS')
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
?>
<div id="mainBodyOther">
	<div id="testsBody">
		<div class="testListBox">
			<div class="sliderButton" id="prev">&lt;&lt;</div>
			<div class="testSlider">
				<div id="t1" class="testItem" style="background: url('/images/green/1.png') no-repeat;"></div>
				<div id="t2" class="testItem" style="background: url('/images/green/2.png') no-repeat;"></div>
				<div id="t3" class="testItem" style="background: url('/images/green/3.png') no-repeat;"></div>
				<div id="t4" class="testItem" style="background: url('/images/green/4.png') no-repeat;"></div>
				<div id="t5" class="testItem" style="background: url('/images/green/5.png') no-repeat;"></div>
				<div id="t6" class="testItem" style="background: url('/images/green/6.png') no-repeat;"></div>
				<div id="t7" class="testItem" style="background: url('/images/green/7.png') no-repeat;"></div>
				<div id="t8" class="testItem" style="background: url('/images/green/8.png') no-repeat;"></div>
				<div id="t9" class="testItem" style="background: url('/images/green/9.png') no-repeat;"></div>
				<div id="t10" class="testItem" style="background: url('/images/green/10.png') no-repeat;"></div>
				<div id="t11" class="testItem" style="background: url('/images/green/11.png') no-repeat;"></div>
				<div id="t12" class="testItem" style="background: url('/images/green/12.png') no-repeat;"></div>
				<div id="t13" class="testItem" style="background: url('/images/green/13.png') no-repeat;"></div>
				<div id="t14" class="testItem" style="background: url('/images/green/14.png') no-repeat;"></div>
				<div id="t15" class="testItem" style="background: url('/images/green/15.png') no-repeat;"></div>
				<div id="t16" class="testItem" style="background: url('/images/green/16.png') no-repeat;"></div>
				<div id="t17" class="testItem" style="background: url('/images/green/17.png') no-repeat;"></div>
				<div id="t18" class="testItem" style="background: url('/images/green/18.png') no-repeat;"></div>
				<div id="t19" class="testItem" style="background: url('/images/green/19.png') no-repeat;"></div>
				<div id="t10" class="testItem" style="background: url('/images/red/20.png') no-repeat;"></div>
			</div>
			<div class="sliderButton" id="next">&gt;&gt;</div>
		</div>
	</div>
	<?php
		$this->load->view('footer');
	?>
</div>
</body>
</html>