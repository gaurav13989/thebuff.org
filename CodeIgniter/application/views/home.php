<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src=<?php echo '"'.base_url().'js/jquery.min.js"';?>></script>
<link rel="stylesheet" type="text/css" href=<?php echo '"'.base_url().'css/thebuff.css"';?> />
<title>TheBuff - Home</title>
<style type="text/css">

</style>
<script type="text/javascript">


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
	                   	<!-- 2 sections on the home page. Left one has contents and right section has menu -->
	                	<div id="sectionA" class="sections">
	                		<div id="homeTitle">HOME</div>
	                		<div id="homeBody">
	                			
	                		</div>
	                	</div>
	                	<div id="sectionB" class="sections">
	                		<div class="homeItems"><div class="homeItemTitle">HOME</div>
	                			<div class="homeContent" id="home">
	                				<div style="padding-right: 50px; display: inline;"></div>
	                				TheBuff.Org is an idea, an idea that I will not be able to describe clearly in words right now because I was way too busy with the construction of this site :P . 
	                				I must tell you it is no child's play to create/maintain a website.
	                				But then too as you are here you should know atleast something about our intentions.<br />
	                				<br />
	                				<div style="padding-right: 50px; display: inline;"></div> We bring to you TheBuff.Org with a picture of a free, educated and beautiful world in mind. 
	                				I may sound foolish, with a wordlist and GRE section on this website, but it is how we decided to start. Our mission will be clear to you as time passes. 
	                				But till then TheBuff.Org will be host to FreeGre, which brings for graduates a portal where they can prepare and test themselves for the 3 hour long test that decides the grad-school they may go to.
	                				<br />
	                				<br />
	                				<div style="padding-right: 50px; display: inline;"></div>As you can see we are a relatively new site and are yet under construction. The main sections we
	                				 are working on currently are the EVENTS, NOTE, WORDS and CAREERS sections, which will then be followed by FreeGre, which will carry 20 free full revised GRE tests
	                				  along with other preparation material.
	                				<br />
	                				<br />
	                				<div style="padding-right: 50px; display: inline;"></div>
	                				Please visit our <a href=<?php echo '"'.base_url('CodeIgniter/index.php/app/words').'"'; ?>> "WORDS"</a> and <a href=<?php echo '"'.base_url('CodeIgniter/index.php/app/feedback').'"'; ?>> "FEEDBACK"</a> sections and do leave us your feedback. Thank you.
									<br />
	                				<br />
	                				<div style="float: right;"></div>
	                			</div>
	                		</div>
	                		<div class="homeItems"><div class="homeItemTitle">EVENTS</div>
	                			<div class="homeContent">
	                				<?php 
	                				if($queryEvents->num_rows() != 0)
			                		{
	                					foreach ($queryEvents->result() as $row) { 
	                						echo '<div class="eventsContainer">';
	                						echo '	<div class="eventName">';
	                						echo 		$row->eventName;
	                						echo '	</div>';
	                						echo '	<div class="eventDescription">';
	                						echo 		$row->eventDescription;
	                						echo '	</div>';
	                						echo '	<div class="eventEndDate">';
	                						if($row->eventEndDate != "0000-00-00 00:00:00")
	                						{
	                							$endDate = date_create($row->eventEndDate);
	                							echo date_format($endDate,'d-m-Y');
	                						}	
	                						echo '	</div>';	 	                						
	                						echo '	<div class="eventStartDate">';
	                						if($row->eventStartDate != "0000-00-00 00:00:00")
	                						{
	                							$startDate = date_create($row->eventStartDate);
	                							echo date_format($startDate,'d-m-Y');
	                						}
	                						echo '	</div>';               						
	                						echo '	<div class="eventCreator">';
	                						echo 		$row->eventCreator;
	                						echo '	</div>';
	                						echo '<div class="clear"></div>';
	                						echo '</div>';
	                					}
	                				}
	                				else
	                					echo "We will keep you bugged with all our releases here."
	                				?>
	                			</div>
	                		</div>
	                		<div class="homeItems"><div class="homeItemTitle">NOTE</div>
	                			<div class="homeContent">
	                				<?php 
		                				if($queryNotes->num_rows() != 0)
			                			{
			                				foreach ($queryNotes->result() as $row) { 
			                					echo '<div class="notesContainer">';
			                					echo 	'<div class="noteTitle">';
			                					echo 		$row->noteTitle;
			                					echo 	'</div>';
			                					echo 	'<div class="noteBody">';
			                					echo 		$row->noteBody;
			                					echo 	'</div>';
			                					echo 	'<div class="noteCreator">';
			                					echo 		$row->noteCreator;
			                					echo 	'</div>';
			                					echo 	'<div class="clear"></div>';
			                					echo '</div>';
			                				}
			                			}
		                				else
		                					echo "No notes yet. This area will host articles written by students about their experience with The GRE. So stay tuned."
	                				?>	                				
	                			</div>
	                		</div>
	                	</div>
	                	<div class="clear"></div>
	                	<!-- end of 2 sections -->
	                </div>
	            </div>
	        </div>
		</div>    
	</div>
</body>
</html>
