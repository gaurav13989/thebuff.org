<?php
echo '<div style="position: fixed; bottom: 0px;">';
echo form_open(base_url().'backend/logout');
echo form_submit('submit','Logout');
echo form_close();
echo '</div>';