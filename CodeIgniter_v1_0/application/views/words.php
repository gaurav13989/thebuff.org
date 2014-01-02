<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheBuff - Words</title>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>

<script type="text/javascript">
$(function(){
	$(".numb").hover(function(){
		$(this).attr("id","selectd");
	},function(){
		$(this).attr("id","");
	});

	$("body").keydown(function(e) {
		if(e.keyCode == 37) { //left
			window.location.href = <?php echo '"'.base_url($prev).'"' ;?>
		}
		else if(e.keyCode == 39) { //right
			window.location.href = <?php echo '"'.base_url($next).'"' ;?>;
		}
	});
	
});

</script>
</head>
<body>
	<div id="bodyContentContainer">
		<div id="bodyContent">
	    	<div id="bowl">
	        	<div id="water">
	    			<!-- php if condition to check if any user is logged in or no -->
	            	<div id="loggedIn"><?=$logMsg;?></div>
	            	<div class="clear"></div>
	            	<!-- if condition closed -->        		
	            	<div id="fish">
	                   	<!-- Words section begins -->
	                   	<div id="wordContainer">
		                   	<div id="wordListContent1">
		                   		<a href=<?php echo '"'.base_url($prev).'"' ?>><div class="wordDisplayTable wordNextPrev"><div class="wordDisplayTableCell">&lt;</div></div></a>
		                   		<div id="wordBody" class="wordDisplayTable">
		                   			<?php foreach ($query -> result() as $row) { ?>
		                   			<div class="wordDisplayTableCell">
		                   				<div id="bookmark">&#9733;</div>
		                   				<div id="word"><?=$row->word;?></div>
		                   				<div id="type">(<?=$row->type;?>)</div>
		                   				<div id="meaning"><?=$row->meaning;?></div>
		                   				<div id="sentence">"the word is used like this in this sentence"</div>
		                   				<div id="audio"></div>
		                   			</div>
		                   			<?php } ?>
		                   		</div>
		                   		<a href=<?php echo '"'.base_url($next).'"' ?>><div class="wordDisplayTable wordNextPrev"><div class="wordDisplayTableCell">&gt;</div></div></a>
		                   	</div>
		                   	<div id="wordListMenu">
		                   		<div id="wordListMenuItems">
			                   		<a href=<?php echo '"'.base_url("app/words/1").'"' ?>><div class="wordListMenuItem"><div class="menuItemRow"><div class="menuItemValue">WORD LIST STYLE 1</div></div></div></a>
			                   		<div class="wordListMenuItem"><div class="menuItemRow"><div class="menuItemValue">WORD LIST STYLE 2 (coming soon)</div></div></div>
			                   		<a href=<?php echo '"'.base_url("app/wordsearch").'"' ?>><div class="wordListMenuItem"><div class="menuItemRow"><div class="menuItemValue">WORD LIST SEARCH</div></div></div></a>
			                   		<div class="wordListMenuItem" style="margin-right: 0px;"><div class="menuItemRow"><div class="menuItemValue">BOOKMARKED WORDS<br />(coming soon)</div></div></div>
		               			</div>
		                   	</div>
		                </div>
	                   	<!-- Words section ends -->
	                </div>
	            </div>
	        </div>
		</div>    
	</div>
</body>
</html>
