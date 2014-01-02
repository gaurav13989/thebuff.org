<script type="text/javascript">
	$(function(){

		$('#submit').live("click",function(){
			$("#msg").html("");
			if($('#name').val() == "")
			{
				$('#msg').html("<span style='color: red;'>Please enter your name.</span><br/>");
			}
			else if($('#comment').val() == "")
			{
				$('#msg').html($('#msg').html()+"<span style='color: red;'>Please enter your feedback/comment.</span>");
			}
			else
			{
				$('#msg').html("");
				$(this).attr('id','');
				$(this).attr('id','finishe');
				$(this).css('background-color','');
				$(this).html('<img src="/images/loading2.gif" width="16px" height="16px"/>');
				$.ajax({
					type: "POST",
					url: "<?=base_url('gre/recordfeedback')?>",
					data: { name: $('#name').val(), comment: $('#comment').val(), viewStatus: 'show' }
				}).done(function(msg) {
					$("#box").html('<div style="text-align: center; position: relative; top: 100px;">Thank you! You have successfully submitted your feedback.</div>');
				});
			}
		});

		$("#reportBugTag_").live("click",function(){
			var height = $(window).height();
			var width = $(window).width();
			var top = height/2 - 125;
			var left = width/2 - 175;
			
			$("#box").css({top : top,
				left: left});
			$("#box").fadeIn();
			$("#feedbackContainer").fadeIn();
		});
		//$("#box").click(function(){ alert($(this).attr('id')); return false; });
		$("#feedbackContainer").live("click", function() { $("#feedbackContainer").fadeOut();
			$("#box").fadeOut(); });

		$('body').on("keydown",function(e){
			if(e.keyCode == 27)
			{
				if($('#feedbackContainer').css('display') == "block")
					$('#feedbackContainer').trigger('click');
			}
		});

	});
</script>
<style type="text/css">
#bodyContent {
	display: block;
	width: 450px;
	margin-left:auto;
	margin-right:auto;
	height: 100%;
	overflow: scroll;
}
#bowl {
	position:relative;
	display: table;	
	width: 80%;
	height: 100%;
}
#water {
	position:;
	display: table-cell;
	vertical-align: middle;	
}
#submit {
	padding: 5px 15px 5px 15px; 
	position: relative;
	left: 210px; 
	cursor: pointer; 
	background-color: black; 
	max-width: 70px; 
	text-align: center; 
	top: 15px; 
	color: white;
}
#finishe {
	padding: 5px 15px 5px 15px; 
	position: relative;
	left: 235px; 
	cursor: pointer; 
	max-width: 70px; 
	text-align: center; 
	top: 15px; 
	color: white;
}
</style>
<div id="reportBugTag_" style="border-top-radius: 10px; width: 30px; height: 150px; position: fixed; background-color: rgb(240,100,100); background-color: rgba(240,100,100,0.9); top: 150px; left: 0px; cursor: pointer;">
	<img src="/images/reportBug.png"/>
</div>
<div style="font-family: calibri;display: none;position: fixed;overflow: hidden; width: 350px; height: 250px; background-color: rgb(222,222,222); border: 5px solid gray; padding: 15px; padding-top: 30px; margin: -15px; z-index: 4" id="box">
	<div id="msg"></div>
	<span style="padding-right: 40px;">Name:</span> <input type="text" style=" font-family: Calibri; width: 250px; " maxlength=30  id="name"/><br/>
	<div style="width: 84px;float: left;"><span>Comment:</span></div><div style="float: left; min-width: 247px"><textarea style="min-width: 247px; max-width: 247px; min-height: 150px; max-height: 150px; font-family: Calibri" maxlength=250 id="comment"></textarea></div>
	<div style="clear: both;"></div>
	<div id="submit" class="menuItemOther">Submit</div>
</div>

<div style="display: none;position: fixed; left: 0px; top: 0px; width: 100%; height: 100%;  background-color: rgb(0,0,0); filter: alpha(opacity=85); -moz-opacity:0.85; -khtml-opacity: 0.85; background-color: rgba(0,0,0,0.85); z-index: 3;" id="feedbackContainer">
</div>