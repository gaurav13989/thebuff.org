<?php foreach ($query->result() as $row) { ?>
<div class="listWordContainer">
	<div class="leftCont">
		<a href=<?php echo '"'.base_url()."app/words/".$row->wordNo.'"' ?>><div class="listWord"><?=$row->word;?></div></a>
		<div class="listType">(<?=$row->type;?>)</div>
	</div>
	<div class="listMeaning"><?=$row->meaning;?></div>
	<div class="clear"></div>
</div>
<?php } ?>