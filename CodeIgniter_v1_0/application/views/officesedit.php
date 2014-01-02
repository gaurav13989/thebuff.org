<head>
	<title>OFFICES</title>
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
				p['id'] = $(this).parent().parent().find('.id').val();
		        p['title'] = $(this).parent().parent().find('.title').val();
		        p['link'] = $(this).parent().parent().find('.link').val();
		        p['email'] = $(this).parent().parent().find('.email').val();
		        p['addressLine1'] = $(this).parent().parent().find('.addressLine1').val();
		        p['addressLine2'] = $(this).parent().parent().find('.addressLine2').val();
		        p['addressLine3'] = $(this).parent().parent().find('.addressLine3').val();
		        p['addressLine4'] = $(this).parent().parent().find('.addressLine4').val();
		        p['contact'] = $(this).parent().parent().find('.contact').val();
		        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/offices/'+p['id'],p,function(html){
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
		       	p['id'] = $(this).parent().parent().find('.id').val();
		        p['title'] = $(this).parent().parent().find('.title').val();
		        p['link'] = $(this).parent().parent().find('.link').val();
		        p['email'] = $(this).parent().parent().find('.email').val();
		        p['addressLine1'] = $(this).parent().parent().find('.addressLine1').val();
		        p['addressLine2'] = $(this).parent().parent().find('.addressLine2').val();
		        p['addressLine3'] = $(this).parent().parent().find('.addressLine3').val();
		        p['addressLine4'] = $(this).parent().parent().find('.addressLine4').val();
		        p['contact'] = $(this).parent().parent().find('.contact').val();
		        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();

		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/offices/'+p['id'],p,function(html){
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
			<th width="100px">NOTEID</th>
			<th width="100px">NOTE TITLE</th>
			<th width="500px">NOTE</th>
			<th width="100px">NOTE AUTHOR ID</th>
			<th width="100px">NOTE AUTHOR NAME</th>
			<th width="100px">NOTE DATE (yyyy-mm-dd)</th>
			<th width="100px">NOTE SHORT NAME</th>
			<th width="100px">NOTE CATEGORY</th>
			<th width="150px">VIEW STATUS</th>
		</tr>
	</table>
	<div style="max-height: 200px; overflow: scroll;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input type="text" class="id" value="<?=$row->id;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="title" value="<?=$row->title;?>"/></td>
				
				<td width="100px"><input type="text" class="link" value="<?=$row->link;?>"/></td>
				<td width="100px"><input type="text" class="email" value="<?=$row->email;?>"/></td>
				
				<td width="100px"><input type="text" class="addressLine1" value="<?=$row->addressLine1;?>"/></td>
				<td width="100px"><input type="text" class="addressLine2" value="<?=$row->addressLine2;?>"/></td>
				<td width="100px"><input type="text" class="addressLine3" value="<?=$row->addressLine3;?>"/></td>
				<td width="100px"><input type="text" class="addressLine4" value="<?=$row->addressLine4;?>"/></td>

				<td width="100px"><input type="text" class="contact" value="<?=$row->contact;?>"/></td>

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
	<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/offices">
		<table>

			<tr>
				<td>TITLE</td>
				<td><input name="title" type="text"/></td>
			</tr>
			<tr>
				<td>LINK</td>
				<td><input name="link" type="text"/></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td><input name="email" type="text"/></td>
			</tr>
			<tr>
				<td>ADDRESS LINE 1</td>
				<td><input name="addressLine1" type="text"/></td>
			</tr>
			<tr>
				<td>ADDRESS LINE 2</td>
				<td><input name="addressLine2" type="text"/></td>
			</tr>
			<tr>
				<td>ADDRESS LINE 3</td>
				<td><input name="addressLine3" type="text"/></td>
			</tr>
			<tr>
				<td>ADDRESS LINE 4</td>
				<td><input name="addressLine4" type="text"/></td>
			</tr>

			<tr>
				<td>CONTACT</td>
				<td><input name="contact" type="text"/></td>
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
