<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheBuff - Login</title>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>
<script type="text/javascript" src=<?php echo '"'.base_url().'js/login.js"';?>></script>
</head>
<body>
<div id="bodyContentContainer">
	<div id="bodyContent">
    	<div id="bowl">
        	<div id="water">
    			<!-- php if condition to check if any user is logged in or no -->
            	<!-- <div id="loggedIn" ></div> -->
            	<div class="clear"></div>
            	<!-- if condition closed -->        		
	            	<div id="fish">
                   	<!-- Feedback form starts -->
                    <div id="feedbackTitleContainer" class="sections">
                        <div id="feedbackTitle">LOGIN</div>
                        <div id="feedbackBody">
                            <div class="loginContainer">
                                <?php
                                    echo form_open(base_url().'app/login');
                                    echo form_input('userId','Username');
                                    echo form_password('password','Password');
                                    echo form_submit('submit','Login');
                                    echo form_close();
                                ?>
                                <div class="error"><?=$error;?></div>
                                <div onclick="forgot();" style="display: block;font-size: 12px; font-style: italic; margin-top: 5px; text-decoration: underline; cursor: pointer;">Forgot username/password?</div>
                                <a style="display: block;font-size: 12px; font-style: italic; margin-top: 5px; text-decoration: underline; cursor: pointer;" href="<?=base_url();?>app/register">Click here to register</a>
                            </div>
                            <div class="forgotContainer">
                            <?php
                                echo form_open(base_url().'app/forgot');
                                echo form_input('email','Enter your email address!');
                                echo '<input type="button" value="Submit" onclick="checkForgot()"/>';
                                echo '<div style="font-size: 12px; font-style: italic; margin-top: 5px;">Kindly check your email account for your credentials after clicking on Submit.</div>';
                                echo form_close();
                            ?>
                            <div class="error" id="emailError"></div>
                            <a style="display: block;font-size: 12px; font-style: italic; margin-top: 5px; text-decoration: underline; cursor: pointer;" href="<?=base_url();?>app/login">Login now!</a>
                            <a style="display: block;font-size: 12px; font-style: italic; margin-top: 5px; text-decoration: underline; cursor: pointer;" href="<?=base_url();?>app/register">Click here to register</a>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback form ends -->
                </div>
            </div>
        </div>
	</div>    
</div>
</body>
</html>
