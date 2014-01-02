<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/js/newHome.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/v1_0.css"/>
	<title>TheBuff - Page under construction!</title>
	<style type="text/css">

	</style>
<script type="text/javascript">
$(function(){
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
});
</script>
</head>
<body>
	<?php
		$this->load->view('topbar');
	?>
	<div id="mainBody">
		<div id="home" style="width: 100%">
			<div id="leftCol" style="width: 100%;">
				<div id="leftColTitle">CAREERS - We are now open!</div>
				<div id="leftColBody" >
					<div class="leftColStoryEvnt">
						<div class="event"  style="width: 890px; background-color: rgb(120,120,200);background-color: rgba(120,220,200,0.6);">	
							<div class="eventBody">
								<div class="eventTitle">Web Team - 4 Positions</div>
								<div class="eventDesc">
									<ul>
										<li>Should have knowledge of HTML, CSS, jQuery/JavaScript, Php and MySQL</li>
										<li>Experience with XML is a plus</li>
										<li>Individuals must own a PC or a laptop with Windows XP(32-bit)/7(32-bit) OS</li>
										<li>No other criteria such as age or current field of education</li>
										<li>Send us your resumes and previous work at "careers@thebuff.org" with "Web Careers Application" as the subject</li>
									</ul>
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Creative team - 2 Positions</div>
								<div class="eventDesc">
									<ul>
										<li>Should be good at drawing/painting or should be able to conceive creative ideas</li>
										<li>Experience with Photoshop/Corel Draw is a plus</li>
										<li>No other criteria such as age or current field of education</li>
										<li>Send us your resumes and portfolios at "careers@thebuff.org" with "Creative Careers Application" as the subject</li>
									</ul>
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Editorial team - 1 Position</div>
								<div class="eventDesc">
									<ul>
										<li>Should be an excellent communicator</li>
										<li>Should be good at expressing thoughts clearly in simple English</li>
										<li>Should be ready to act as a Public Relations Rep. when needed</li>
										<li>Previous experience as an editor is a plus</li>
										<li>No other criteria such as age or current field of education</li>
										<li>Send us your resumes and previous work at "careers@thebuff.org" with "Editorial Careers Application" as the subject</li>
									</ul>
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Management Team</div>
								<div class="eventDesc">
									<ul>
										<li>MBA fresher interns positions will open soon</li>
										<li>You may send in your resumes at "careers@thebuff.org" with "Management Careers Application" as the subject</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="event"  style="width: 890px; background-color: rgb(220,220,150);background-color: rgba(220,220,150,0.6);">
							<div class="eventBody">
								<div class="eventTitle" style="font-size: 16px; padding-bottom: 15px">Some questions you may have in mind</div>
								<div class="eventTitle">What do I get in return?</div>
								<div class="eventDesc">
									<ul>
										<li>Well that is not what you ask when you apply to be a part of a project that is aiming to free this world from the strangles of commercialization in education</li>
										<li>We won't be able to pay you until we get donations from our users</li>
										<li>Till then the only things you get in return are:
											<ol>
												<li>Experience</li>
												<li>A lot to learn</li>
												<li>Being a part of a wonderful start-up</li>
												<li>And an opportunity to make history</li>
											</ol>
										</li>
									</ul>	
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">Who is financing you?</div>
								<div class="eventDesc">
									<ul>
										<li>Larry Page, Bill Gates, Warren Buffett, Mark Zuckerberg, Lakshmi Mittal and many more have been trying very hard to be a part of this project, but for now, our own resources have been enough to help us sustain</li>
									</ul>	
								</div>
								<div style="padding: 5px;"></div>
								<div class="eventTitle">How will you decide among us?</div>
								<div class="eventDesc">
									<ul>
										<li>Every resume we receive will be screened and the best ones will be interviewed for further selection</li>
										<li>You will be notified about your interview via email</li>
										<li>Interviews will be carried out on Google Hangouts or face to face depending on the situation</li>
										<li>Selected individuals will be called on their contact numbers specified in the resume</li>
									</ul>	
								</div>
								<div class="eventDesc">
									For any other questions, silly or serious, no matter what you have to ask us write in to us at contact@thebuff.org; because you should question everything!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="clear"></div>
	<?php
		$this->load->view('footer');
	?>
	</div>
</div>
</body>
</html>
