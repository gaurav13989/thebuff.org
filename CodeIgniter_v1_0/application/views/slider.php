
<div id="slider">
	<div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
		<?php
		$this->db->where('viewStatus','show');
		$query = $this->db->get('slider');
		foreach($query->result() as $row)
		{ ?>
            <div data-src="/images/<?=$row->imageUrl;?>.jpg">
                <div class="camera_caption fadeFromBottom">
                    <em><?=$row->description;?></em>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>