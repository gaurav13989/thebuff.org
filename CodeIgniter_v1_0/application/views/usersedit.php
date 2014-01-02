<head>
	<title>USERS</title>
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
	        p['uid'] = $(this).parent().parent().find('.uid').val();
	        p['password'] = $(this).parent().parent().find('.password').val();
	        p['name'] = $(this).parent().parent().find('.name').val();
	        p['email'] = $(this).parent().parent().find('.email').val();
	        p['userIP'] = $(this).parent().parent().find('.userIP').val();
	        p['doj'] = $(this).parent().parent().find('.doj').val();
	        p['status'] = $(this).parent().parent().find('.status').val();
	        
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/users/a',p,function(html){
	        	if(html == "y")
		        {
		        	$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        	$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
		        else
		        {
					$(this).parent().find(".loading").html('UPDATE ERROR'+html);
	        		$(this).html('<input type="button" value="edit" class="edit"/>');
		        }
			});
		});
		$('.delete').live("click",function(){
			var temp = confirm("Are you sure you want to delete this record?");
			if(temp)
			{
				var p = {};
		        p['uid'] = $(this).parent().parent().find('.uid').val();
		        p['password'] = $(this).parent().parent().find('.password').val();
		        p['name'] = $(this).parent().parent().find('.name').html();
		        p['email'] = $(this).parent().parent().find('.email').val();
		        p['userIP'] = $(this).parent().parent().find('.userIP').val();
	        	p['doj'] = $(this).parent().parent().find('.doj').val();
	        	p['status'] = $(this).parent().parent().find('.status').val();

		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/users/a',p,function(html){
		        	if(html == "y")
		        	{
		        		$(this).parent().find(".loading").html('<img src="<?=base_url();?>images/tick.jpg" />');
		        		$(this).html('<input type="button" value="delete" class="delete"/>');
		        		$(this).parent().hide();
		        	}
		        	else
		        	{
						$(this).parent().find(".loading").html('DELETE ERROR');
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
			<th width="100px">UID</th>
			<th width="100px">PASSWORD</th>
			<th width="500px">NAME</th>
			<th width="100px">EMAIL</th>
		</tr>
	</table>
	<div style="max-height: 200px; overflow: scroll;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input type="text" class="uid" value="<?=$row->uid;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="password" value="<?=$row->password;?>"  disabled="disabled"/></td>
				<td width="100px"><input type="test" class="name" value="<?=$row->name;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="email" value="<?=$row->email;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="userIP" value="<?=$row->userIP;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="doj" value="<?=$row->doj;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="status" value="<?=$row->status;?>" disabled="disabled"/></td>
				
				
				<td width="50px"><input type="button" value="edit" class="edit" /></td>
				<td width="50px"><input type="button" value="delete" class="delete" disabled="disabled"/></td>
				<td width="50px" class="loading"></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<div>
	<br/>
	Insert new row here
	<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/users">
		<table>

		</table>
	</form>
</div>
