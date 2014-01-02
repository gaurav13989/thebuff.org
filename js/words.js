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