<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheBuff - Feedback</title>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>
<script type="text/javascript" src=<?php echo '"'.base_url().'js/feedback.js"';?>></script>
<script type="text/javascript">
    $(function(){

        $('.like,.dislike').live('click',function(){
            var p = {};
            p['opr'] = $(this).attr('class');
            p['type'] = 'feedback';
            p['fid'] = $(this).parent().attr('id');

            $(this).html('<img src="<?=base_url();?>images/small-loading.gif" />');
            //$(this).parent().find('.loading')
            $(this).parent().load('/ajax/like',p,function(){});
        });

    });
    function like()
    {
        var p = {};
        p['name'] = $(this).attr('name');
        p['value'] = $(this).val();
    }
</script>
</head>
<body>
<div id="bodyContentContainer">
	<div id="bodyContent">
    	<div id="bowl">
        	<div id="water">
    			<!-- php if condition to check if any user is logged in or no -->
            	<div id="loggedIn"><?=$logMsg;?></div>
            	<div class="clear"></div>
            	<!-- if condition closed -->        		
	            	<div id="fish">
                   	<!-- Feedback form starts -->
                    <div id="feedbackTitleContainer" class="sections">
                        <div id="feedbackTitle">FEEDBACK</div>
                        <div id="feedbackBody">
                            <?=form_open(base_url().'/app/feedback_insert');?>
                                Write to us about your experience/queries on <span style="color: rgb(200,100,10);">The</span><span style="color:  rgb(10,200,10);">Buff</span>.<span style="color: rgb(10,100,200);">Org</span> and help us help you better.
                                <br />
                                <br />
                                <div id="errors"></div><br/>
                                <div style="min-width: 200px; display: block; float: left;">Name:</div>
                                <div style="float: left;">
                                    <input type="text" name="name" <?php if(strpos($logMsg,'Login') === false){ echo ' value="'.$this->session->userdata('username').'" readonly="true" '; } ?>/>
                                </div>
                                <br/>
                                <br/>
                                <div style="min-width: 200px; display: block; float: left;">Email:</div><div style="float: left;"><input type="text" name="email" <?php if(strpos($logMsg,'Login') === false){ echo ' value="'.$this->session->userdata('email').'" readonly="true" '; } ?>/></div><br/>
                                <br />
                                <div style="vertical-align: top; display: block; min-width: 200px;  float: left;">Comments/Queries: </div><textarea cols="50" name="feedback" rows="5"></textarea>
                                <br />
                                <div style="text-align: center; display:block; margin-left: 505px;"><div class="button" onclick="checkForm()">SUBMIT</div></div>

                            </form>
                            <div id="feedbackList">
                                <?php foreach ($query->result() as $row) { ?>
                                    <div class="feedbackListItem">
                                        <div style=""><?php echo $row->feedback;?></div>
                                        <div style="float: right;">
                                            <span id="loading"></span>
                                            <div class="likeContainer" id="<?=$row->id;?>">
                                                <?php 
                                                    if(strpos($logMsg,'Login') === false)
                                                    {
                                                        echo '<div class="like">&#9786;</div><div class="dislike">&#9785;</div>';
                                                    }
                                                ?>
                                                <div class="likes"><?php echo $row->feedbackLikes;?>-likes </div>
                                                <div class="dislikes"><?php echo $row->feedbackDislikes;?>-dislikes </div>
                                            </div>- <?php echo $row->name;?></div>
                                        <div class="clear"></div>
                                    </div>
                                <?php }?> 
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
