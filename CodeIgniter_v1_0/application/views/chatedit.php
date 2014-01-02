<head>
	<title>CHAT</title>
</head>
<style type="text/css">
a {
	margin-right: 10px;
}
td, th {
	border: 1px solid black;
}
</style>
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>
<script type="text/javascript">
	$(function(){
		$('.edit').live('click',function(){
			var p = {};
	       	p['chatId'] = $(this).parent().parent().find('.chatId').val();
	       	p['chatFor'] = $(this).parent().parent().find('.chatFor').val();
	        p['name'] = $(this).parent().parent().find('.name').val();
	        p['time'] = $(this).parent().parent().find('.time').val();
	        p['chat'] = $(this).parent().parent().find('.chat').val();
	        p['userIP'] = $(this).parent().parent().find('.userIP').val();

	        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/chat/'+p['chatId'],p,function(html){
	        	if(html == "y")
		        {
		        	$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        	$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
		        else
		        {
					$(this).parent().find(".loading").html('UPDATE ERROR');
	        		$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
			});
		});
		$('.delete').live("click",function(){
			var temp = confirm("Are you sure you want to delete this record?");
			if(temp)
			{
				var p = {};
		       	p['chatId'] = $(this).parent().parent().find('.chatId').val();
		       	p['chatFor'] = $(this).parent().parent().find('.chatFor').val();
		        p['name'] = $(this).parent().parent().find('.name').val();
		        p['time'] = $(this).parent().parent().find('.time').val();
		        p['chat'] = $(this).parent().parent().find('.chat').val();
		        p['userIP'] = $(this).parent().parent().find('.userIP').val();

		        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();

		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/chat/'+p['chatId'],p,function(html){
		        	if(html == "y")
		        	{
		        		$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        		$(this).html('<input type="button" value="delete" class="delete"/>');
		        		$(this).parent().hide();
		        	}
		        	else
		        	{
						$(this).parent().find(".loading").html('DELETE ERROR');
		        		$(this).live().html('<input type="button" value="delete" class="delete"/>');
		        	}
		        });
		    }
		});
	});
</script>
<div style="text-align: center;">
	<a href="<?php echo base_url().'v1_0/edit/careers'?>">careers</a>
	<a href="<?php echo base_url().'v1_0/edit/events'?>">events</a>
	<a href="<?php echo base_url().'v1_0/edit/faqs'?>">faqs</a>
	<a href="<?php echo base_url().'v1_0/edit/home'?>">home</a>
	<a href="<?php echo base_url().'v1_0/edit/login'?>">login</a>
	<a href="<?php echo base_url().'v1_0/edit/notes'?>">notes</a>
	<a href="<?php echo base_url().'v1_0/edit/offices'?>">offices</a>
	<a href="<?php echo base_url().'v1_0/edit/slider'?>">slider</a>
	<a href="<?php echo base_url().'v1_0/edit/tests'?>">tests</a>
	<a href="<?php echo base_url().'v1_0/edit/users'?>">users</a>
	<a href="<?php echo base_url().'v1_0/edit/whatshot'?>">whatshot</a>
	<a href="<?php echo base_url().'v1_0/edit/words'?>">words</a>
</div>
The table contains these records
<div class="records" style="text-align: center; margin-top: 10px">
	<table>
		<tr>
			<th width="100px">CHAT ID</th>
			<th width="100px">CHAT FOR</th>
			<th width="100px">NAME</th>
			<th width="100px">TIME</th>
			<th width="300px">CHAT</th>
			<th width="100px">TIME</th>
			<th width="150px">VIEW STATUS</th>
		</tr>
	</table>
	<div style="max-height: 200px; overflow: scroll;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input type="text" class="chatId" value="<?=$row->chatId;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="chatFor" value="<?=$row->chatFor;?>"/></td>
				<td width="100px"><input type="text" class="name" value="<?=$row->name;?>"/></td>
				<td width="100px"><input type="text" class="time" value="<?=$row->time;?>"/></td>
				
				<td width="200px"><textarea rows="3" class="chat" cols="30"><?=$row->chat;?></textarea></td>
				<td width="100px"><input type="text" class="userIP" value="<?=$row->userIP;?>"/></td>
				<td width="150px"><input type="text" class="viewStatus" value="<?=$row->viewStatus;?>"/></td>
				
				<td width="50px"><input type="button" value="edit" class="edit"/></td>
				<td width="50px"><input type="button" value="delete" class="delete"/></td>
				<td width="50px" class="loading"></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<div>
	<br/>
	Insert new row here
		<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/chat">
		<table>
			<tr>
				<td>FOR</td>
				<td><input name="chatFor" maxLength="100" type="text"/></td>
			</tr>
			<tr>
				<td>NAME TO BE DISPLAYED</td>
				<td><textarea name="name" rows="5" cols="50">TheBuff.Org</textarea></td>
			</tr>
			<tr>
				<td>CHAT</td>
				<td><input name="chat" type="text"/></td>
			</tr>
			<tr>
				<td>VIEW STATUS</td>
				<td><select name="viewStatus">
						<option value="show">show</option>
						<option value="hide" selected="selected">hide</option>
					</select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="INSERT"/></td>
			</tr>


		</table>
	</form>
</div>
