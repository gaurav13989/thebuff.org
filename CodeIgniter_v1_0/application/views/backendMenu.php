<?php
echo '<div style="position: fixed; top: 0px; display: block;">';
echo anchor(base_url().'backend/home','HOME').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo anchor(base_url().'backend/events','EVENTS').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo anchor(base_url().'backend/notes','NOTES').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo anchor(base_url().'backend/feedback','FEEDBACK').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo anchor(base_url().'backend/userbase','USER BASE').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '</div>';