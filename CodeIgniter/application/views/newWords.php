<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Words</title>
	<style type="text/css">
	</style>
	<script type="text/javascript">
		$(function(){

			$('.menuItemOther').each(function(){
				if($(this).html() == 'WORDS')
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
<div id="mainBodyOther">

<div id="leftCol" style="width: 100%;">
		<div id="leftColBody" style="min-height: 450px; margin-left: auto; margin-right: auto;">
			<div style="text-align: right;">Search Word: <input id="wordSearchInput" style="" type="text"/></div>
			<div class="clear"></div>
			<div class="leftFloat" style="width: 10%; min-height: 450px; text-align: center;">
				<div class="wordChanger"><div style="position: relative; top: -13px; left: -3px;">&#9665;</div></div>
			</div>
			<div class="leftFloat" style="width: 80%; min-height: 450px;">
				<div style="display: table; height: 450px; width: 100%;">
					<div style="display: table-cell; vertical-align: middle; text-align: center;">
						<div id="word">Word</div>
						<div id="usage">Usage (v) (adj) (n)</div>
						<div id="meaning">Meaning of this word is that it means this and not that</div>
						<div id="sentence">The word can be used in this sentence like this</div>
					</div>
				</div>
			</div>
			<div class="leftFloat" style="width: 10%; min-height: 450px; text-align: center;">
				<div class="wordChanger"><div style="position: relative; top: -13px; left: 3px;">&#9655;</div></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>
	<?php
		$this->load->view('footer');
	?>
</div>
</body>
</html>