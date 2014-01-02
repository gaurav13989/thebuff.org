Hello! Please log in!

<?php

echo form_open(base_url().'backend/login');
echo form_password('pass','Enter Key!');
echo form_submit('submit','Login');
echo form_close();