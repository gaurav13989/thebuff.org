
<div id="slider">
	<div id="sliderBlock">
		<?php
		$this->db->where('viewStatus','show');
		$query = $this->db->get('slider');
		?>
		<div class="images">
		<?foreach($query->result() as $row)
		{ ?>
			<div class="image" id="<?=$row->imageUrl;?>">
				<div class="imageText"><?=$row->description;?></div>
			</div>
		<? } ?>
		</div>
		
	</div>
	<div class="buttons">
		<div id="next" class="button">&gt;</div>
		<div id="prev" class="button">&lt;</div>
		<div style="clear: both;"></div>
	</div>
</div>