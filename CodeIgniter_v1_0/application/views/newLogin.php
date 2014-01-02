<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Login</title>
	<style type="text/css">

	</style>
	<script type="text/javascript">
	$(function(){
		var x = 0;
		$('#email').css('color','gray');
		$('#password').css('color','gray');
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
		$('#email').focus(function(){
			if($(this).val() == "Email/Username")
			{
				$(this).val('');
				$(this).css('color','black');
			}
		});
		$('#password').focus(function(){
			if(x == 0)
			{	
				$(this).val('');
				$(this).css('color','black');
				x = 1;
			}
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

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=241223852666797";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script type="text/javascript">
	function loginFacebook(){
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				// the user is logged in and has authenticated your
				// app, and response.authResponse supplies
				// the user's ID, a valid access token, a signed
				// request, and the time the access token 
				// and signed request each expire
				var uid = response.authResponse.userID;
				var accessToken = response.authResponse.accessToken;
				
				// logging the user in to thebuff and setting the session
		        var p = {};
		        p['uid'] = uid;

		        $('#loginResult').live().html('<img src="<?=base_url();?>images/loading2.gif" />');
		        //$(this).parent().find('.loading')
		        $('#loginResult').load('<?=base_url("gre/setUserIn");?>',p,function(){
		        	location.reload(true);
		        });
			} else if (response.status === 'not_authorized') {
				// the user is logged in to Facebook, 
				// but has not authenticated your app
			} else {
				// the user isn't logged in to Facebook.
			}
		});
	}
	function login()
	{
		// logging the user in to thebuff and setting the session if valid credentials
        var p = {};
        p['email'] = $('#email').val();
        p['password'] = $('#password').val();

        $('#loginResult').live().html('<img src="<?=base_url();?>images/loading2.gif" />');
        //$(this).parent().find('.loading')
        $('#loginResult').load('<?=base_url("gre/setUserIn");?>',p,function(){});
	}
	</script>

	<?php
		$this->load->view('topbar');
	?>
	<div id="mainBody" style="padding-top: 100px;">
		<?php
		if(isset($alreadyExisting))
		{
			if($alreadyExisting)
			{
				?>
				<div class="alreadyExisting">
					We see that you are already registered with us. Drop us a mail if you cannot recollect your password or simply login using Facebook. Thank you!
				</div>
				<?php
			}
		}
		?>
		<div class="loginBox" style="text-align: center;">
			<div id="loginResult">
			</div>
			<div style="padding: 5px;">You may login using Facebook</div>
			<div><fb:login-button
   				registration-url="http://www.thebuff.org/gre/authenticate" 
   				on-login="loginFacebook();" /></div>
			
			<div style="padding: 5px;">Or enter your credentials here</div>
			<div class="loginCred">
				<input type="text" name="email" id="email" value="Email/Username"/>
			</div>
			<div class="loginCred">
				<input type="password" name="password" id="password" value="********"/>
			</div>
			<div class="loginCred">
				<input type="button" id="login" value="Login" onclick="login();"/>
			</div>
			<div style="padding: 5px;"><a href="<?=base_url('gre/authenticate');?>">Not registered with us yet?</a></div>
		</div>
		<?php
			$this->load->view('footer');
		?>
	</div>
	
</body>
</html>
