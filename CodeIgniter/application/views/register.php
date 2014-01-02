<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheBuff - Register</title>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>

<script type="text/javascript">
var valid=true;
$(function(){
    $(".numb").hover(function(){
        $(this).attr("id","selectd");
    },function(){
        $(this).attr("id","");
    });
    
    $('.field').blur(function(){
        var p = {};
        p['name'] = $(this).attr('name');
        p['value'] = $(this).val();
        
        var name = p['name'];
        var value = p['value'];

        if(name == 'userId')
        {
            value = value.toLowerCase();
            if(value == '')
            {
                $(this).next().html('Please enter a user name. Alphanumeric, length 6-12');
                // valid = false;
            }
            else if(value == 'username')
            {
                $(this).next().html('Please enter a user name. Alphanumeric, length 6-12');
                // valid = false;
            }
            else if(value.indexOf(' ') >= 0)
            {
                $(this).next().html('User name should be alphanumeric with a length 6-12');
            }
            else if(value.length < 6 || value.length > 12)
            {    
                $(this).next().html('User name should be alphanumeric with a length 6-12');
                // valid = false;
            }
            else if(!isValidUserId(value))
            {
                $(this).next().html('User name should be alphanumeric with a length 6-12');
            }
            //else if()
            else
            {
                $(this).next().html('<img src="<?=base_url();?>images/small-loading.gif" />');
                //alert("hello");
                $(this).next().load('/ajax/testUserName',p, function() {});
                // if($(this).next().html() != "")
                // {
                //     valid = false;
                // }
                // else
                //     valid=true;
            }
        }
        else if(name == "userPassword")
        {
            //alert($(this).parent().next().find('input').val());
            
            if(value == "")
            {
                $(this).next().html('Please enter a password, length 6-12');
                // valid = false; 
            }   
            else if(value.length < 6 || value.length > 12)
            {
                $(this).next().html('Password length should be between 6 and 12');
                // valid= false;
            }
/*                else if(value != $(this).parent().next().find('input').val())
            {
                alert('not same');
            }*/
            else
            {
                $(this).next().html('');
                // valid = true;
            }
        }
        else if(name == "confirmPass")
        {
            //alert($(this).parent().prev().find('input').val());
            
            if(value == "")
            {
                $(this).next().html('Please re-enter password, length 6-12');
                // valid = false;
            }
            else if(value.length < 6 || value.length > 12)
            {
                $(this).next().html('Password length should be between 6 and 12');
                // valid = false;
            }
            else if(value != $(this).parent().prev().find('input').val())
            {
                $(this).next().html('The two passwords do not match. Please re-enter.');
                // valid = false;
            }
            else
            {
                $(this).next().html('');
                // valid = true;
            }
        }
        else if(name == "userFirstName")
        {
            //alert($(this).parent().prev().find('input').val());
            var pattern = new RegExp(/^[a-zA-Z]+$/i);
            
            if(value == "")
            {
                $(this).next().html('Please enter your first name');
                // valid = false;
            }
            else if(value.length > 20)
            {
                $(this).next().html('Maximum length allowed is 20');
                // valid = false;
            }
            else if(!pattern.test(value))
            {
                $(this).next().html('Invalid first name.');
                // valid = false;
            }
            else
            {
                $(this).next().html('');
                // valid = true;
            }
        }            
        else if(name == "userLastName")
        {
            //alert($(this).parent().prev().find('input').val());
            var pattern = new RegExp(/^[a-zA-Z]+$/i);
            
            if(value == "")
            {
                $(this).next().html('Please enter your last name');
                // valid = false;
            }
            else if(value.length > 20)
            {
                $(this).next().html('Maximum length allowed is 20');
                // valid = false;
            }
            else if(!pattern.test(value))
            {
                $(this).next().html('Invalid last name.');
                // valid = false;
            }
            else
            {
                $(this).next().html('');
                // valid = true;
            }
        }
        else if(name == "userEmail")
        {   
            if(value == "")
            {
                $(this).next().html('Please enter your email');
                // valid = false;
            }
            else if(value.length > 30)
            {
                $(this).next().html('Maximum length allowed is 30');
                // valid = false;
            }
            else if(!isValidEmailAddress(value))
            {
                $(this).next().html('Invalid email.');
                // valid = false;
            }
            else
            {
                $(this).next().html('<img src="<?=base_url();?>images/small-loading.gif" />');
                //alert("hello");
                $(this).next().load('/ajax/testEmail',p, function() {});
                // if($(this).next().html() != "")
                //     valid = false;
                // else
                //     valid = true;
            }
        }            
        else if(name == "userContact")
        {   

            if(value.length > 13)
            {
                $(this).next().html('Maximum length allowed is 13');
                // valid = false;
            }
            else
            {
                $(this).next().html('');
                // valid = true;
            }
        }   
        //$(this).next().html('here');
        //alert(p['name']+" "+p['value']);
    });

});

function register()
{
    if($('#e1').html() == "" && $('#e2').html() == "" && $('#e3').html() == "" && $('#e4').html() == "" && $('#e5').html() == "" && $('#e6').html() == "" && $('#e7').html() == "")
        document.forms[0].submit();
}

function isValidUserId(userId)
{
    var pattern = new RegExp(/^[a-z0-9]+$/i);
    return pattern.test(userId);
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
</script>
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
                        <div id="feedbackTitle">REGISTER</div>
                        <div id="feedbackBody">
                            <?php

                            echo form_open(base_url().'app/registerError');
                            echo '<div class="inputContainer"><div class="inputLabel">Username *</div>'.form_input(array('name'=>'userId','class'=>'field'));
                            //if($error1 != "")
                                echo '<div class="error" id="e1">'.$error1.'</div>';
                            echo '</div>';
                            echo '<div class="inputContainer"><div class="inputLabel">Password *</div>'.form_password(array('name'=>'userPassword','class'=>'field'));
                            //if($error2 != "")
                                echo '<div class="error" id="e2">'.$error2.'</div>';
                            echo '</div>';
                            echo '<div class="inputContainer"><div class="inputLabel">Re-enter Password *</div>'.form_password(array('name'=>'confirmPass','class'=>'field'));
                            //if($error2 != "")
                                echo '<div class="error" id="e7"></div>';
                            echo '</div>';
                            echo '<div class="inputContainer"><div class="inputLabel">First Name *</div>'.form_input(array('name'=>'userFirstName','class'=>'field'));
                            //if($error3 != "")
                                echo '<div class="error" id="e3">'.$error3.'</div>';
                            echo '</div>';                            
                            echo '<div class="inputContainer"><div class="inputLabel">Last Name *</div>'.form_input(array('name'=>'userLastName','class'=>'field'));
                            //if($error4 != "")
                                echo '<div class="error" id="e4">'.$error4.'</div>';
                            echo '</div>';                            
                            echo '<div class="inputContainer"><div class="inputLabel">Email *</div>'.form_input(array('name'=>'userEmail','class'=>'field'))    ;
                            //if($error6 != "")
                                echo '<div class="error" id="e6">'.$error6.'</div>';
                            echo '</div>'; 
                            echo '<div class="inputContainer"><div class="inputLabel">Contact</div>'.form_input(array('name'=>'userContact','class'=>'field'));
                            //if($error5 != "")
                                echo '<div class="error" id="e5">'.$error5.'</div>';
                            echo '</div>';                            
                            //echo '<div class="inputContainer"><div class="inputLabel">Country</div>'.form_input('userCountry').'</div>';
                            echo '<div class="submitContainer">';
                            ?>
                            <input type="button" value="Register" onclick="register();"/>
                            <?php
                            echo anchor(base_url().'app/login','Already have an account?')."</div>";
                            echo form_close();
                            ?>
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
