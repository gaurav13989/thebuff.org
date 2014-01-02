<style type="text/css">
#chatBox {
	padding: 2px;
	font-size: 11px;
	position: fixed;
	bottom: 0px;
	right: 100px;
	height: 0px;
	background-color: #BCC;
	width: 200px;
	z-index: 2;
	margin: -1px;
	border: 1px solid #BCC;
}
#chat {
	padding: 2px;
	margin: 2px;
	height: 215px;
	overflow-y: auto;
	overflow-x: hidden;
	background-color: white;
}
#chatInpBox {
	padding: 2px;
	height: 50px;
}
#chatInp {
	width: 190px;
	padding-left: 2px;
	font-size: 12px;
}
.userName {
	font-weight: bold;
}
.chatTime {
	text-align: right;
	font-size: 9px;
	font-style: italic;
}
.chatText {
	padding: 2px;

}
.chatItem {
	padding: 2px;
	border-bottom: 1px solid #888;
	margin-bottom: 2px;
	background-color: #CDD;
}
.chatId {
	display: none;
}
.minMax {
	height: 15px;
	width: 100%; 
	position: absolute; 
	background: white; 
	text-align: center;
	left: 2px; 
	top: -13px; 
	margin:-3px;
	right: 2px; 
	border: 1px solid #AAA; 
	cursor: pointer;
	font-weight: bold;
}
</style>
<script type="text/javascript">
	$(function(){
		var xhr;
		var secCount = 0;
		$('#chat').scrollTop(5000);
		$('#chatInp').on('keypress',function(e){
			if(e.which == 13)
			{
				var chatContent = $(this).val();
				if($.trim(chatContent) != "")
				{
					$.ajax({
						type: "POST",
						url: "<?=base_url('gre/recordChat')?>",
						data: { chat: chatContent }
					}).done(function(msg) {
						// action to perform after recording
						if(msg == "success")
						{
							$('#chatInp').val('');
							fn();
							secCount = 0;
						}
						else if(msg == "veryFast"){
							alert("Please wait for 2 minutes before asking another question!");
						}
						else
						{
							alert("Your query could not be sent. Please try again later.");	
						}
					});
				}
				else
					$(this).val('');
			}
		});
		var fn = function(){
			secCount = secCount + 1;
			if(secCount > 500)
				clearInterval(interval);

	        if(xhr && xhr.readystate != 4){
	            xhr.abort();
	        }
	        xhr = $.ajax({
					type: "POST",
					url: "<?=base_url('gre/getChat')?>",
					data: { chatId: $('.chatItem').last().find('.chatId').html() }
				}).done(function(msg) {
					// action to perform after recording
					if(msg != "")
					{
						$('#chat').append(msg);
						$('#chat').scrollTop(5000);
					}
				});
		};
		var interval = setInterval(fn, 5000);

		$('#MM').on('click',function(){
			if($(this).parent().height() > 0)
			{
				$(this).parent().animate({
					height: '0px'
				}, 500, function(){
					//$('#MM').html('Ask the experts');
				});
			}
			else
			{
				$(this).parent().animate({
					height: '250px'
				}, 500, function(){
					//$('#MM').html('Ask the experts');
				});				
			}
		});
	});
</script>
<?php
	$this->db->where('chatFor',$this->session->userdata('email'));
	$this->db->where('viewStatus','show');
	$queryForNumRows = $this->db->get('chat');
	$queryNumRows = $queryForNumRows->num_rows();
	$queryNumRows = $queryNumRows - 50;
	if($queryNumRows < 0)
	{
		$queryNumRows = 0;
	}
	$this->db->where('chatFor',$this->session->userdata('email'));
	$this->db->where('viewStatus','show');
	$this->db->limit(50,$queryNumRows);
	$query = $this->db->get('chat');
?>
<div id="chatBox">
	<div class="minMax" id="MM">Ask the experts</div>
	<div id="chat">
		<?php
		foreach($query->result() as $row){?>
			<div class="chatItem">
				<div class="chatId"><?=$row->chatId;?></div>
				<div class="userName"><?=ucwords($row->name);?></div>
				<div class="chatTime"><?="at ".date('H:i', strtotime($row->time) + 11.5 * 3600)." on ".date('d-m-Y', strtotime($row->time) + 11.5 * 3600)." (IST)";?></div>
				<div class="clear"></div>
				<div class="chatText"><?=$row->chat;?></div>
			</div>
			<?
		}
		?>
	</div>
	<div id="chatInpBox">
		<input type="text" maxlength="100" id="chatInp"/>
	</div>
</div>