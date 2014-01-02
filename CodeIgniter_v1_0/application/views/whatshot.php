<script type="text/javascript">
	$(function(){


	});
</script>
<div id="whatshot">
	<div class="title">Whats hot!</div>
	<div class="menu">
		<?php

			$query = $this->db->get('whatshot');

			foreach($query->result() as $row)
			{
				if($row->viewStatus == "show")
				{
		?>	
					<div class="menuItem"><a href="<?=base_url($row->link);?>"><?=$row->description;?></a></div>
		<?php
				}
			}
		?>
	</div>
</div>