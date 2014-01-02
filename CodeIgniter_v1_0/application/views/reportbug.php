<script type="text/javascript">
	$(function(){
		$('#submit').live('click',function(){
			$(this).attr('id','');
			$(this).attr('id','finished');
			$('#finished').css('background-color','');
			$('#finished').html('<img src="/images/loading2.gif" width="16px" height="16px"/>');
			$.ajax({
				type: "POST",
				url: "<?=base_url('gre/recordfeedback')?>",
				data: { name: $('#name').val(), comment: $('#comment').val(), viewStatus: 'show' }
			}).done(function(msg) {
				$('#finished').html('<img title="Thank you for your feedback!" src="/images/done.png" width="16px" height="16px"/>');
			});
		});
	});
</script>
<div id="reportBug" style="border-top-radius: 10px; width: 170px; height: 260px; position: fixed; top: 190px; left: -170px;">
	
	<div id="reportBugBody" style="border-top-radius: 10px; width: 100%; height: 250px; position: relative; background-color: rgb(120,180,160); background-color: rgba(120,180,160,0.5); padding: 5px;">
		<div style="padding: 2px;">Name:</div><input id="name" type="text" style="min-width: 160px; max-width: 160px; margin: 0px;"/>	
		<div style="padding: 2px;">Comment:</div><textarea id="comment" style=" max-width: 160px; margin: 0px; min-height: 140px;"></textarea>
		<div style="cursor: pointer; float: right; position: relative;right: 5px;text-align: center;font-size: 13px; background-color: rgba(20,100,10,0.5); padding: 6px; margin-top: 6px; width: auto;" id="submit">Submit</div><div class="clear"></div>
	</div>

	<div id="reportBugTag" style="border-top-radius: 10px; width: 30px; height: 150px; position: relative; background-color: rgb(240,100,100); background-color: rgba(240,100,100,0.9); top: -150px; left: 180px; cursor: pointer;">
		<img src="/images/reportBug.png" style="margin-left: 2px;"/>
	</div>
</div>