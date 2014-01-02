$(function(){

	$('#homeBody').html($('#home').html());

	$(".numb").hover(function(){
		$(this).attr("id","selectd");
	},function(){
		$(this).attr("id","");
	});

	$(".homeItems").hover(function() {
		$(this).attr("id","selectdItem");
	},function(){
		$(this).attr("id","");
	});

	$(".homeItems").click(function(){
		$("#homeTitle").html($(this).find(".homeItemTitle").html());
		$("#homeBody").html($(this).find(".homeContent").html());
	});

});