<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Register</title>
	<style type="text/css">

	</style>
<script type="text/javascript">
	$('#reportBugTag').click(function(){
		var left = $(this).parent().position().left;	
		if(left == -170)
			$(this).parent().animate({
				left: "0px",
			});
		else
			$(this).parent().animate({
				left: "-170px",
			});
	});
</script>
</head>
<body>
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '241223852666797', // App ID
	      channelUrl : '//www.thebuff.org/channel.html', // Channel File
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });

	    // Additional initialization code here
	  };

	  // Load the SDK Asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));
	</script>	
	<?php
		$this->load->view('topbar');
	?>
	<div id="mainBody" style="padding-top: 100px;text-align: center;">
		
 		<!-- <div id="fb-root"></div>
		<script src="https://connect.facebook.net/en_US/all.js#appId={241223852666797}&xfbml=1"></script>

		<fb:registration 
		  fields="name,email,password,captcha" 
		  redirect-uri="http://www.thebuff.org/gre/login"
		  width="530">
		</fb:registration> -->

		<iframe src="https://www.facebook.com/plugins/registration?
		             client_id=241223852666797&
		             redirect_uri=http://www.thebuff.org/gre/login&
		             fields=name,email,password,captcha"
		        scrolling="auto"
		        frameborder="no"
		        style="border:none"
		        allowTransparency="true"
		        width="530px"
		        height="400px">
		</iframe>
		<div style="padding: 5px; font-size: 12px"><a href="<?=base_url('gre/login');?>">Already registered? Login here.</a></div>
		<?php
			$this->load->view('footer');
		?>
	</div>
	
</body>
</html>
