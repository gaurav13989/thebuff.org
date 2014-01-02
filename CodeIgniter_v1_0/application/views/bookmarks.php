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

			$("body").on("keydown",function(e) {
				if(e.keyCode == 37) { //left ie previous
					loadNewWord(parseInt($('#wordNoStar').html())-1);
				}
				else if(e.keyCode == 39) { //right ie next
					loadNewWord(parseInt($('#wordNoStar').html())+1);
				}
			});	

			var count = 0;
			var xhr;
			$('#wordSearchInput').on("keyup",function(e){
				if(e.keyCode == 40 || e.keyCode == 38)
				{
					var items = $('#wordsWildCard').find(".wildCard");
					var size = items.length;
					//alert(size);
					//alert(count);
					var code = e.keyCode;
					if(code == 40)
					{
						if(count == size)
							count = 0;
						count = count + 1;
					}
					else
					{
						count = count - 1;
						if(count == 0 || count == -1)
							count = size;
					}
					
					if(size != 0)
					{	
						if(size == 1)
						{
							items.parent().find(':first-child').attr('id','wildCardSelected');
							$('#wordSearchInput').val(items.parent().find(':first-child').html());
						}
						else
						{
							
							$('#wildCardSelected').attr('id','');
							items.parent().find(':nth-child('+count+')').attr('id','wildCardSelected');
							$('#wordSearchInput').val(items.parent().find(':nth-child('+count+')').html());
						}
					}
				}
				else if(e.keyCode != 13)
				{
					count = 0;
					if($('#wordSearchInput').val() == "")
						$('#wordsWildCard').html("");
					else
					{
				        if(xhr && xhr.readystate != 4){
				            xhr.abort();
				        }
				        xhr = $.ajax({
							type: "POST",
							url: "<?=base_url('gre/wordSearch')?>",
							data: { word: $('#wordSearchInput').val() }
						}).done(function(msg) {
							$('#wordsWildCard').html(msg);
						});
					}
				}
				else
				{
					//window.location.href = "<?php echo base_url('gre/gotoWord/');?>";
				}
			});
			$('#wordSearchInput').focus(function(){
				$('#wordsWildCard').show();
				$('#wildCardSelected').attr('id','');
				count = 0;
			});

			$('#wordsWildCard').click(function(e){
				if($(e.target).attr('class')=="wildCard")
				{
					$('#wordSearchInput').val($(e.target).html());
					$('#wordsWildCard').html('');
					$('#wordsWildCard').hide();
					count = 0;
					$('#wordSearchInput').focus();

					$('#wordSearchForm').submit();
				}
			});
			$('#wordSearchInput').focus();
			changeWordNo();
			$('#next').on('click',function(){
				loadNewWord(parseInt($('#wordNoStar').html())+1);
			});
			$('#prev').on('click',function(){
				loadNewWord(parseInt($('#wordNoStar').html())-1);
			});
			var html;
			var id;
			$('#bookmark').hover(function(){
				id = $(this).find('img').attr('id');
				// html = $(this).html();
				 // alert(id);
				if(id == "marked")
				{
					$(this).html('<img id="unmark" title="Click to unmark" src="/images/bookmarkblue.png" width="30" height="30"/>');
				}
				else if(id == "unmarked")
				{
					$(this).html('<img id="mark" title="Click to mark" src="/images/bookmarkblue.png" width="30" height="30"/>');
				}
			}, function(){
				// alert(html);
				if($(this).find('img').attr('id') == "unmark")
				{
					$(this).html('<img id="marked" src="/images/bookmarkgreen.png" width="30" height="30"/>');
				}
				else if($(this).find('img').attr('id') == "mark")
				{
					$(this).html('<img id="unmarked" src="/images/bookmark.png" width="30" height="30"/>');
				}
				// $(this).html(html);
			});
			var xhr3;
			$('#bookmark').on('click',function(){
				//id = $(this).find('img').attr('id');
				var wordNo = $('#wordNoStar').html();
		        if(xhr3 && xhr3.readystate != 4){
		            xhr3.abort();
		        }
		        xhr3 = $.ajax({
					type: "POST",
					url: "<?=base_url('gre/bookmark')?>",
					data: { wordNo: wordNo },
					beforeSend: function(xhr3){
						$('#bookmark').html('<img src="/images/loading2.gif" style="margin-top: 5px;margin-right:5px;"/>');
					}
				}).done(function(msg) {
					chkBkMrk(msg);
					// if(msg == "added")
					// {
					// 	chkBkMrk(msg)
					// 	$('#bookmark').html('<img id="marked" src="/images/bookmarkgreen.png" width="30" height="30"/>');
					// }
					// else if(msg == "removed")
					// {
					// 	$('#bookmark').html('<img id="unmarked" src="/images/bookmark.png" width="30" height="30"/>');
					// }
					// else if(msg == "invalid")
					// {
					// 	$('#bookmark').html(msg);	
					// }
				});
			});
			$('#bkmrkwrds').hover(function(){
				$('#bkmrkwrd').slideDown();
			}, function(){
				$('#bkmrkwrd').fadeOut();
			});
		});
		var index = 1;

		function chkBkMrk(msg)
		{
			if(msg == "added" || msg == "y")
				$("#bookmark").html('<img id="marked" src="/images/bookmarkgreen.png" width="30" height="30"/>');
			else if(msg == "removed" || msg == "n")
				$("#bookmark").html('<img id="unmarked" src="/images/bookmark.png" width="30" height="30"/>');
			else if(msg == "invalid")
				$("#bookmark").remove();
		}
		function changeWordNo()
		{
			timeoutHandle = window.setTimeout(function(){
				if(window.index == 1)
				{
					$('#wordNo2').fadeOut();
					$('#wordNo1').fadeIn();
					index = 2;
				}
				else
				{
					$('#wordNo1').fadeOut();
					$('#wordNo2').fadeIn();
					index = 1;
				}
				changeWordNo();
			},2500);
		}
		var xhr2;
		function loadNewWord(wordNo1)
		{
	        if(xhr2 && xhr2.readystate != 4){
	            xhr2.abort();
	        }
	        xhr2 = $.ajax({
				type: "POST",
				url: "<?=base_url('gre/changeWord')?>",
				data: { wordNo: wordNo1 },
				beforeSend: function(xhr2) {  
					$('#wordNo').live().html('<img src="/images/loading2.gif" alt="loading..."/>');
				}
			}).done(function(msg) {
				$('#masterWord').live().html(msg);

				chkBkMrk($('#bk').html());
			});
		}
	</script>
	<style type="text/css">
		#wordsWildCard {
			position: absolute;
			top: 84px;
			left: 725px;
			z-index: 2;
		}
		.wildCard {
			padding: 5px;
			max-width: 165px;
			min-width: 165px;
			text-align: left;
			position: relative;
			float: right;
			background-color: white;
			border: 1px solid black;
			margin-bottom: -1px;
			right: 20px;
			cursor: pointer;
			font-style: italic;
			font-size: 12px;
		}
		.wildCard:hover {
			background-color: rgb(100,100,100);
			background-color: rgba(100,100,100,0.7);
		}
		#wildCardSelected {
			background-color: rgb(220,240,230);
		}
		.leftRect {
			width: 2%;
			float: left;
			background-color: rgb(230,230,230);
		}
		.wordA {
			width: 98%;
			float: right;
		}
	</style>
</head>
<body>
<?php
	$this->load->view('topbar');
?>
<div id="mainBodyOther">
<div id="leftCol" style="width: 100%;">
		<div id="leftColBody" style="min-height: 450px; margin-left: auto; margin-right: auto;">
			<div id="leftColTitle">BOOKMARKED WORDS</div>
			<div class="leftFloat" style="width: 10%; min-height: 450px; text-align: center;">
				<?php
					foreach ($query->result() as $row) {
						?>
						<div class="wordCont">
							<div class="leftRect"></div>
							<div class="wordA">
								$row->wordNo;
							</div>
						</div>
						<?php
					}
				?>
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