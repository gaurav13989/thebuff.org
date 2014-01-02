<head>
	<title>EVENTS</title>
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
	        p['eventId'] = $(this).parent().parent().find('.id').val();
	        p['eventTitle'] = $(this).parent().parent().find('.title').val();
	        p['eventDescription'] = $(this).parent().parent().find('.desc').val();
	        p['eventDate'] = $(this).parent().parent().find('.date').val();
	        p['eventStartDate'] = $(this).parent().parent().find('.startDate').val();
	        p['eventEndDate'] = $(this).parent().parent().find('.endDate').val();
	        p['eventType'] = $(this).parent().parent().find('.type').val();
	        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        p['email'] = $(this).parent().parent().find('.email').val();
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/events/'+p['eventId'],p,function(html){
	        	if(html == "y")
		        {
		        	$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        	$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
		        else
		        {
					$(this).parent().find(".loading").html(html+'UPDATE ERROR');
	        		$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
			});
		});
		$('.delete').live("click",function(){
			var temp = confirm("Are you sure you want to delete this record?");
			if(temp)
			{
				var p = {};
		        p['eventId'] = $(this).parent().parent().find('.id').val();
		        p['eventTitle'] = $(this).parent().parent().find('.title').val();
		        p['eventDescription'] = $(this).parent().parent().find('.desc').val();
		        p['eventDate'] = $(this).parent().parent().find('.date').val();
		        p['eventStartDate'] = $(this).parent().parent().find('.startDate').val();
		        p['eventEndDate'] = $(this).parent().parent().find('.endDate').val();
		        p['eventType'] = $(this).parent().parent().find('.type').val();
		        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        	p['email'] = $(this).parent().parent().find('.email').val();

		        alert(p['eventDescription']);
		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/events/'+p['eventId'],p,function(html){
		        	if(html == "y")
		        	{
		        		$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        		$(this).html('<input type="button" value="delete" class="delete"/>');
		        		$(this).parent().hide();
		        	}
		        	else
		        	{
						$(this).parent().find(".loading").html(html+'DELETE ERROR');
		        		$(this).html('<input type="button" value="delete" class="delete"/>');
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
			<th width="100px">EVENT ID</th>
			<th width="100px">EVENT TITLE</th>
			<th width="200px">EVENT DESCRIPTION</th>
			<th width="200px">EVENT DATE(yyyy-mm-dd)</th>
			<th width="200px">EVENT START DATE(yyyy-mm-dd)</th>
			<th width="200px">EVENT END DATE(yyyy-mm-dd)</th>
			<th width="200px">EVENT TYPE</th>
			<th width="200px">EMAIL</th>
			<th width="150px">VIEW STATUS</th>
		</tr>
	</table>
	<div style="max-height: 200px; overflow: scroll;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input style="width: 100px" type="text" class="id" value="<?=$row->eventId;?>" disabled="disabled"/></td>
				<td width="100px"><input style="width: 100px" type="text" class="title" value="<?=$row->eventTitle;?>"/></td>
				<td width="200px"><textarea rows="3" class="desc" cols="20"><?=$row->eventDescription;?></textarea></td>

				<td width="100px"><input style="width: 100px" type="text" class="date" value="<?=$row->eventDate;?>" /></td>
				<td width="100px"><input style="width: 100px" type="text" class="startDate" value="<?=$row->eventStartDate;?>" /></td>
				<td width="100px"><input style="width: 100px" type="text" class="endDate" value="<?=$row->eventEndDate;?>" /></td>
				<td width="100px"><input style="width: 100px" type="text" class="type" value="<?=$row->eventType;?>"/></td>
				<td width="100px"><input style="width: 100px" type="text" class="email" value="<?=$row->email;?>"/></td>
				
				<td width="100px"><input style="width: 100px" type="text" class="viewStatus" value="<?=$row->viewStatus;?>"/></td>
				
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
	<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/events">
		<table>
			<tr>
				<td>TITLE</td>
				<td><input name="eventTitle" maxLength="100" type="text"/></td>
			</tr>
			<tr>
				<td>DESCRIPTION</td>
				<td><textarea name="eventDescription" rows="5" cols="50"></textarea></td>
			</tr>
			<tr>
				<td>DATE(yyyy-mm-dd)</td>
				<td><input name="eventDate" type="text"/></td>
			</tr>
			<tr>
				<td>START DATE(yyyy-mm-dd)</td>
				<td><input name="eventStartDate" type="text"/></td>
			</tr>
			<tr>
				<td>END DATE(yyyy-mm-dd)</td>
				<td><input name="eventEndDate" type="text"/></td>
			</tr>
			<tr>
				<td>TYPE</td>
				<td><input name="eventType" type="text"/></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td><input name="email" type="text"/></td>
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