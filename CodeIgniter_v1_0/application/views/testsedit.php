<head>
	<title>TESTS</title>
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
	       	p['testId'] = $(this).parent().parent().find('.testId').val();
	        p['testNo'] = $(this).parent().parent().find('.testNo').val();
	        p['description'] = $(this).parent().parent().find('.description').val();
	        p['link'] = $(this).parent().parent().find('.link').val();
	        p['type'] = $(this).parent().parent().find('.type').val();
	        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/tests/'+p['testId'],p,function(html){
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
		       	p['testId'] = $(this).parent().parent().find('.testId').val();
		        p['testNo'] = $(this).parent().parent().find('.testNo').val();
		        p['description'] = $(this).parent().parent().find('.description').val();
		        p['link'] = $(this).parent().parent().find('.link').val();
		        p['type'] = $(this).parent().parent().find('.type').val();
		        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();

		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/tests/'+p['testId'],p,function(html){
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
			<th width="100px">TEST ID</th>
			<th width="100px">TEST NO</th>
			<th width="500px">DESCRIPTION</th>
			<th width="100px">LINK</th>
			<th width="100px">TYPE</th>
			<th width="150px">VIEW STATUS</th>
		</tr>
	</table>
	<div style="max-height: 200px; overflow: auto;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input type="text" class="testId" value="<?=$row->testId;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="testNo" value="<?=$row->testNo;?>"/></td>
				<td width="200px"><textarea rows="3" class="description" cols="30"><?=$row->description;?></textarea></td>
				<td width="100px"><input type="text" class="link" value="<?=$row->link;?>"/></td>
				<td width="100px"><input type="text" class="type" value="<?=$row->type;?>"/></td>
				
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
	<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/tests">
		<table>
			<tr>
				<td>TEST NO</td>
				
				<td><input name="testNo" type="text"/></td>
			</tr>
			<tr>
				<td>DESCRIPTION</td>
				<td><textarea name="description" rows="5" cols="50"></textarea></td>
			</tr>
			<tr>
				<td>LINK</td>
				<td><input name="link" type="text"/></td>
			</tr>
			<tr>
				<td>TYPE</td>
				<td><input name="type" type="text"/></td>
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
