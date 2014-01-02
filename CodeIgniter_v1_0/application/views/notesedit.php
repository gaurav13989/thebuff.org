<head>
	<title>NOTES</title>
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
	       	p['noteId'] = $(this).parent().parent().find('.noteId').val();
	        p['note'] = $(this).parent().parent().find('.note').val();
	        p['noteTitle'] = $(this).parent().parent().find('.noteTitle').val();
	        p['noteAuthorId'] = $(this).parent().parent().find('.noteAuthorId').val();
	        p['noteAuthorName'] = $(this).parent().parent().find('.noteAuthorName').val();
	        p['noteDate'] = $(this).parent().parent().find('.noteDate').val();
	        p['noteShortName'] = $(this).parent().parent().find('.noteShortName').val();
	        p['category'] = $(this).parent().parent().find('.category').val();
	        
	        p['viewStatus'] = $(this).parent().parent().find('.viewStatus').val();
	        
	        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
	        $(this).parent().load('/v1_0/update/notes/'+p['noteId'],p,function(html){
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
		       	p['noteId'] = $(this).parent().parent().find('.noteId').val();
		        p['note'] = $(this).parent().parent().find('.note').val();
		        p['noteTitle'] = $(this).parent().parent().find('.noteTitle').val();
		        p['noteAuthorId'] = $(this).parent().parent().find('.noteAuthorId').val();
		        p['noteAuthorName'] = $(this).parent().parent().find('.noteAuthorName').val();
		        p['noteDate'] = $(this).parent().parent().find('.noteDate').val();
		        p['noteShortName'] = $(this).parent().parent().find('.noteShortName').val();
		        p['category'] = $(this).parent().parent().find('.category').val();

		        $(this).parent().parent().find(".loading").html('<img src="<?=base_url();?>images/loading.gif" />');
		        $(this).parent().load('/v1_0/delete/notes/'+p['noteId'],p,function(html){
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
	<div style="max-height: 200px; overflow: auto;">
		<table style="overflow-y: scroll; text-align: center;">
			<?php foreach ($q->result() as $row) { ?>
			<tr>
				<td width="100px"><input type="text" class="noteId" value="<?=$row->noteId;?>" disabled="disabled"/></td>
				<td width="100px"><input type="text" class="noteTitle" value="<?=$row->noteTitle;?>"/></td>
				<td width="200px"><textarea rows="3" class="note" cols="30"><?=$row->note;?></textarea></td>
				
				<td width="100px"><input type="text" class="noteAuthorId" value="<?=$row->noteAuthorId;?>"/></td>
				<td width="100px"><input type="text" class="noteAuthorName" value="<?=$row->noteAuthorName;?>"/></td>
				<td width="100px"><input type="text" class="noteDate" value="<?=$row->noteDate;?>"/></td>
				<td width="100px"><input type="text" class="noteShortName" value="<?=$row->noteShortName;?>"/></td>
				<td width="100px"><input type="text" class="category" value="<?=$row->category;?>"/></td>

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
	<form name="form1" method="POST" action="<?php echo base_url();?>v1_0/insert/notes">
		<table>

			<tr>
				<td>TITLE</td>
				<td><input name="noteTitle" type="text"/></td>
			</tr>
			<tr>
				<td>NOTE</td>
				<td><textarea name="note" rows="5" cols="50"></textarea></td>
			</tr>			
			<tr>
				<td>AUTHOR ID</td>
				<td><input name="noteAuthorId" type="text"/></td>
			</tr>
			<tr>
				<td>AUTHOR NAME</td>
				<td><input name="noteAuthorName" type="text"/></td>
			</tr>
			<tr>
				<td>DATE (yyyy-mm-dd)</td>
				<td><input name="noteDate" type="text"/></td>
			</tr>
			<tr>
				<td>NOTE SHORT NAME</td>
				<td><input name="noteShortName" type="text"/></td>
			</tr>
			<tr>
				<td>CATEGORTY</td>
				<td><input name="category" type="text"/></td>
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
