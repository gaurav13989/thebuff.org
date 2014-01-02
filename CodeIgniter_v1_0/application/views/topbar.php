<link rel="shortcut icon" href="http://www.thebuff.org/images/aaaaa.ico"/>
<div id="topbar">
	<span id="audioPlayer"></span>
	<div id="center">
		<div class="left">
			<div class="item">
				<a href="<?=base_url().'gre/home'?>"><img src="/images/thebuff.png" height="50px" width="150px" style="border: none;"/></a>
			</div>
		</div>
		<div class="right">
			<?php
				$logged_in = $this->session->userdata('logged_in');
				if(!$logged_in)
				{	
					if(!isset($showLogin))
					{ ?>
						<div class="item" style="font-size: 12px; width: auto; cursor: normal;">
							<a href="<?=base_url('/gre/login');?>" style="display: block;height: 100%;width:100%; padding-top: 17px;">
								LOGIN
								<!-- <fb:login-button
								registration-url="http://www.thebuff.org/gre/register" /> -->
							</a>
						</div>
						<div style="width: 30px;"></div>
						<div class="item" style="font-size: 12px; width: auto; cursor: normal;">
							<a href="<?=base_url('/gre/authenticate');?>" style="display: block;height: 100%;width:100%; padding-top: 17px;">
								REGISTER
								<!-- <fb:login-button
								registration-url="http://www.thebuff.org/gre/register" /> -->
							</a>
						</div>

					<?php 
					}
				}
				else
				{
					?>
						<div class="item" style="font-size: 12px; width: auto;">
							<div style="margin-right: 5px;">Hi, <?=$this->session->userdata('name');?>!</div>
						</div>
						<div style="width: 30px;"></div>
						<div class="item" style="font-size: 12px; width: auto; cursor: normal;">
							<a href="<?=base_url('/gre/logout');?>" style="display: block;height: 100%;width:100%; padding-top: 17px;">
								LOGOUT
								<!-- <fb:login-button
								registration-url="http://www.thebuff.org/gre/register" /> -->
							</a>
						</div>					
				
					<?php
				}

			?>
<!-- 		<div class="item">
				Login
			</div>
			<div class="item">
				Logout
			</div> -->
		</div>
		<div class="clear"></div>
	</div>
	<div id="centerMenu">
		<a href="<?=base_url().'gre/home'?>"><div class="menuItemOther">HOME</div></a>
		<a href="<?=base_url().'gre/words'?>"><div class="menuItemOther">WORDS</div></a>
		<a href="<?=base_url().'gre/practice'?>"><div class="menuItemOther">PRACTICE</div></a>
		<a href="<?=base_url().'gre/tests'?>"><div class="menuItemOther">TESTS</div></a>
		<a href="<?=base_url().'gre/notes'?>"><div class="menuItemOther">ARTICLES</div></a>
		<a href="<?=base_url().'gre/events'?>"><div class="menuItemOther">EVENTS</div></a>
	</div>
</div>
<?php
if($logged_in && $logged_in == "y")
{	$this->load->view('chat');	}