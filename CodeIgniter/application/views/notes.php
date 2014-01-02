<script type="text/javascript" src="jquery.min.js"></script>
<style type="text/css">
body {
	margin: 0px;
	font-family: sans-serif;
	background: url('body-bg.jpg') repeat-y;
	overflow-y: scroll;
}
a, a:hover,a:active,a:link, a:visited
{
	text-decoration: none;
	color: black;
}
#topbar {
	position: fixed;
	display: block;
	top:0px;
	left: 0px;
	width: 100%;
	height: 50px;
	background-color: rgba(255,255,255,1);
	box-shadow: 0px 0px 10px #666;
	z-index: 1;
}
#topbar #center {
	margin-left: auto;
	margin-right: auto;
	height: 50px;
	width: 900px;
	display: block;
}
#topbar #center .left {
	display: table;
	float: left;
	height: 50px;
	text-shadow: -1px -1px -20px #000,-1px -1px -20px #000;
	font-family: sans-serif;
	padding-left: 10px;
}
#topbar #center .right {
	display: table;
	float: right;
	height: 50px;
}
#topbar .left .item {
	display: table-cell;
	vertical-align: middle;
	color: gray;
	font-size: 30px;
	font-weight: bolder;
	cursor: pointer;
}
#topbar .right .item {
	text-align: center;
	width: 80px;
	display: table-cell;
	vertical-align: middle;
	color: rgb(66,57,46);
	font-size: 16px;
	font-weight: bolder;
	cursor: pointer;
}
#topbar .right .item:hover {
	color: gray;
}
#mainBody {
	margin-left: auto;
	margin-right: auto;
	width: 900px;
	position: relative;
	top: 50px;
	background-color: rgba(180,180,250,0.5);
	padding-top: 20px;
	padding-bottom: 40px;
	box-shadow: 0px 2px 2px #888;
}
#mainBodyOther {
	margin-left: auto;
	margin-right: auto;
	width: 900px;
	position: relative;
	top: 50px;
	background-color: rgba(255,255,255,0.8);
	padding-top: 50px;
	padding-bottom: 40px;
	box-shadow: 0px 2px 2px #888;
}
#sliderBlock {
	height: 250px;
	width: 600px;
	background-color: rgb(181,181,181);
	overflow: hidden;
	box-shadow: 0px 0px 15px #888;
}
#image1 {
	background: url('a.jpg');
	background-size: 600px 250px;
}
#image2 {
	background: url('b.jpg');
	background-size: 600px 250px;
}
#image3 {
	background: url('c.jpg');
	background-size: 600px 250px;
}
#image4 {
	background: url('d.jpg');
	background-size: 600px 250px;
}
#image5 {
	background: url('e.jpg');
	background-size: 600px 250px;
}
.images {
	max-height: 250px;
	width: 600px;
	background-color: rgb(241,241,241);

}
.image {
	background-size: 600px 250px;
	height: 250px;
	width: 600px;
	background-color: rgb(241,241,241);
	display: none;
}
.imageText {
	position: relative;
	bottom: 0px;
	left: 0px;
	height: 75px;
	background-color: rgba(212,223,229,0.7);
	padding: 5px;
	color: white;
}
.bottons {

	position: relative;
	top: 0px;
}
#prev {

}
#next {

}
.button {
	border-radius: 20px;
	text-align: center;
	display: inline-block;
	padding: 5px;
	border: 2px solid black;
	width: 20px;
	background-color: rgba(110,110,110,0.5);
	position: relative;
	top: -40px;
	float: right;
	margin-right: 10px;
	cursor: pointer;
}
.button:hover {
	background-color: rgba(181,181,181,0.8);
	color: white;
}
#slider {
	float: left;
	height: 250px;
	width: 600px;
}
.clear {
	clear: both;
}
#rightCol {
	float: right;
}
#whatshot {
	height: 240px;
	width: 280px;
	box-shadow: 0px 0px 20px gray;
	background-color: rgba(255,255,255,0.7);
	padding: 5px;
	position: absolute;
	top: 50px;
	left: 610px;
}
.title {
	font-size: 18px;
	font-weight: bold;
	padding: 5px;
	box-shadow: 0 5px 15px -8px gray;
	-webkit-box-shadow: 0 5px 15px -8px gray;
	-moz-box-shadow: 0 5px 15px -8px gray;
}
.menuItem {
	margin: 10px;
	margin-top: 20px;
	margin-bottom: 20px;
	padding-left: 20px; 
	background: url('bullet2.png') no-repeat;
	background-size: 16px 16px;
	cursor: pointer;
}
.menu {
	height: 190px;
	overflow-y: scroll;
	margin-top: 10px;
}

::-webkit-scrollbar {
    width: 8px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
.homeStory {
	display: block;
	margin-top: 10px;
	margin-bottom: 5px;
	min-height: 100px;
	height: 100px;
	box-shadow: 2px 2px 3px #888;
}
.leftVertical {
	float: left;
	width: 5px;
	height: 100%;
	
	background-color: gray;
}
.story {
	margin-top: 10px;
	max-height: 90px;
	background-color: rgba(240,240,240,0.8);
	width: auto;
	overflow-y: auto;
	padding: 5px;
}
#gray {
	background-color: rgba(180,180,180,0.5);
}
#red {
	background-color: rgba(250,0,0,0.5);
}
#blue {
	background-color: rgba(0,0,250,0.5);
}
#green {
	background-color: rgba(0,250,0,0.5);
}
#white {
	background-color: rgba(255,255,255,0.8);	
}
.storyTitle {
	padding: 3px;
	font-family: sans-serif;
	font-style: oblique;
	font-weight: bolder;
}
.storyPara {
	padding: 3px;
	font-size: 14px;
}
#footer {
	margin-top: 40px;
	font-size: 13px;
	text-align: center;
}
.footerDivider {
	display: inline-block;
	background-color: gray;
	width: 1px;
	border-radius: 10px;
	margin-left: 10px;
	margin-right: 10px;
}
.footerItem {
	display: inline;
}
#leftCol {
	float: left;
	width: 600px;
}
#leftColTitle {
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	background-color: rgba(255,255,255,0.2);
	color: rgba(101,101,101,0.9);
	font-size: 24px;
	margin-bottom: 10px;
	text-shadow: 0px 0px 1px #555;
}
.leftColStory {
	height: auto;
	margin-bottom: 10px;
}
.LCStitle {
	float: right;
	height: 20px;
	padding: 10px;
	background-color: rgba(100,145,195,0.7);
	width: 545px;
	cursor: pointer;
}
.LCSbody {
	width: 578px;
	margin-left: auto;
	margin-right: auto;
	min-height: 5px;
	max-height: 600px;
	overflow-y: auto;
	background-color: rgba(255,255,255,1);
	height: 5px;
	padding-left: 10px;
	padding-right: 10px;
	box-shadow: 0px 0px 3px #888;
	font-size: 13px;
}
.LCStitleHt {
	height: 40px;
}
.space {
	margin: 10px;
}
#topbar #centerMenu {
	margin-left: auto;
	margin-right: auto;
	height: 30px;
	width: 900px;
	display: block;
	position: relative;
	background-color: rgba(10,10,10,1);
	box-shadow: 0px 2px 2px  #000;
	text-align: center;
	padding-top: 10px;
}
.menuItemOther {
	display: inline;
	margin-left: 55px;
	margin-right: 55px;
	color: gray;
	cursor: pointer;
}
.menuItemOther:hover {
	color: white;
	text-shadow: 0px 0px 4px #FFF;
}
#currentPage {
	color: white;
	text-shadow: 0px 0px 4px #FFF;
}
.padTopMainBody {
	padding-top: 50px;
}
#home {
	min-height: 200px;
}
.column {
	float: left;
	width: 270px;
	margin: 10px 10px 10px 10px;
	position: relative;
	min-height: 200px;
	box-shadow: 2px 0 2px #888;
}
.grp {
	margin: 5px;

}
.grpTitle {
	margin-top: 10px;
	padding-left: 5px;
	padding-bottom: 3px;
	box-shadow: 0px 4px 5px -3px #888;
	font-weight: bold;
}
.grpBody {
	padding: 5px;
	width: 260px;
}
.grpItem {
	padding: 3px;
	width: 260px;
	word-wrap: break-word;
	font-size: 14px;
}
.bullet {
	background: url('bullet.png');
}
.openNewWinIcon {
	float: right;
	display: inline-block;
	width: 30px;
	height: 40px;
	background: url('open-in-new.png') no-repeat;
	background-size: 16px 16px;
	background-position: center;
	background-color: rgba(100,145,195,0.7);
}
</style>
<script type="text/javascript">

$(function(){
	
	$('.LCStitle').click(function(){
		
		var windowHt = $(window).height();
		windowHt = windowHt - 150;

		var ht = windowHt + "px";
		if($(this).parent().next().height() != "5")
		{
			ht = "5px";
		}
		$(this).parent().next().animate({
			height: ht,
		},function(){
			if(ht != "5px")
			{
				$('html, body').animate({scrollTop: $(this).offset().top-140}, 1000);		
			}
		});
	});

	$('.LCStitle').hover(function(){

		if($(this).parent().next().height() != "5")
		{
			$(this).attr('title','Click to close');
		}
		else
		{
			$(this).attr('title','Click to open');	
		}

	});

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

	$('.menuItemOther').each(function(){
		if($(this).html() == 'NOTES')
		{
			$(this).attr('id','currentPage');
		}
	});
});

</script>
<div id="topbar">
	<div id="center">
		<div class="left">
			<div class="item">
				<a href="http://www.thebuff.org"><img src="thebuff.png" height="50px" width="auto"/></a>
			</div>
		</div>
		<div class="right">
			<div class="item">
				Register
			</div>
			<div class="item">
				Login
			</div>
			<div class="item">
				Logout
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div id="centerMenu">
		<a href=""><div class="menuItemOther">HOME</div></a>
		<a href=""><div class="menuItemOther">WORDS</div></a>
		<a href=""><div class="menuItemOther">TESTS</div></a>
		<a href=""><div class="menuItemOther">NOTES</div></a>
		<a href=""><div class="menuItemOther">EVENTS</div></a>
	</div>
</div>
<div id="reportBug" style="border-top-radius: 10px; width: 170px; height: 260px; position: fixed; top: 190px; left: -170px;">
	<div id="reportBugBody" style="border-top-radius: 10px; width: 100%; height: 260px; position: relative; background-color: rgba(120,180,160,0.5); padding: 5px;">
		<div style="padding: 2px;">Name:</div><input type="text" style="min-width: 160px; max-width: 160px; margin: 5px;"/>
		<div style="padding: 2px;">Page:</div><input type="text" style="min-width: 160px; max-width: 160px; margin: 5px;"/>
		<div style="padding: 2px;">Comment:</div><textarea style="min-width: 160px; max-width: 160px; margin: 5px; min-height: 120px;max-height: 120px;"></textarea>
	</div>
	<div id="reportBugTag" style="border-top-radius: 10px; width: 30px; height: 150px; position: relative; background-color: rgba(240,100,100,0.9); top: -150px; left: 180px; cursor: pointer;">
		<img src="reportBug.png" style="margin-left: 2px;"/>
	</div>
</div>
<div id="mainbodyOther">

	<div id="leftCol">
		<div id="leftColBody" style="min-height: 450px;">
			
			<div class="leftColStory">
				<div>
					<div class="leftVertical LCStitleHt"></div>
					<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
					<div class="LCStitle">This is the title of note1 - PLEASE CLICK HERE!!!</div>
					<div class="clear"></div>
				</div>
				<div class="LCSbody">
					<div class="space"></div>
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					asd<br />
					<div class="space"></div>
				</div>
			</div>
			<div class="leftColStory">
				<div>
					<div class="leftVertical LCStitleHt"></div>
					<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
					<div class="LCStitle">This is the title of note2</div>
					<div class="clear"></div>
				</div>
				<div class="LCSbody">
					<div class="space"></div>

					<div class="space"></div>
				</div>
			</div>
			<div class="leftColStory">
				<div>
					<div class="leftVertical LCStitleHt"></div>
					<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
					<div class="LCStitle">This is the title of note3</div>
					<div class="clear"></div>
				</div>
				<div class="LCSbody">
					<div class="space"></div>

					<div class="space"></div>
				</div>
			</div>
			<div class="leftColStory">
				<div>
					<div class="leftVertical LCStitleHt"></div>
					<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
					<div class="LCStitle">This is the title of note4</div>
					<div class="clear"></div>
				</div>
				<div class="LCSbody">
					<div class="space"></div>

					<div class="space"></div>
				</div>
			</div>
			<div class="leftColStory">
				<div>
					<div class="leftVertical LCStitleHt"></div>
					<a href="note.html" target="_blank" title="Open in a new tab"><div class="openNewWinIcon">&nbsp;</div></a>
					<div class="LCStitle">This is the title of note5</div>
					<div class="clear"></div>
				</div>
				<div class="LCSbody">
					<div class="space"></div>

					<div class="space"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="rightCol">
		<div id="whatshot">
			<div class="title">Whats hot!</div>
			<div class="menu">
				<div class="menuItem">hottopic1</div>
				<div class="menuItem">hottopic2</div>
				<div class="menuItem">hottopic3</div>
				<div class="menuItem">hottopic4</div>
				<div class="menuItem">hottopic5</div>
				<div class="menuItem">hottopic6</div>
				<div class="menuItem">hottopic7</div>
				<div class="menuItem">hottopic8</div>
				<div class="menuItem">hottopic9</div>
				<div class="menuItem">hottopic10</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>

	<div id="footer">
		<div class="footerItem"><a href="javascript:void();">About Us</a></div>
		<div class="footerDivider">&nbsp;</div>
		<div class="footerItem"><a href="javascript:void();">Contact Us</a></div>
		<div class="footerDivider">&nbsp;</div>
		<div class="footerItem"><a href="javascript:void();">Careers</a></div>
		<div class="footerDivider">&nbsp;</div>
		<div class="footerItem"><a href="javascript:void();">Offices</a></div>
		<div class="footerDivider">&nbsp;</div>
		<div class="footerItem"><a href="javascript:void();">Feedback</a></div>
		<div class="footerDivider">&nbsp;</div>
		<div class="footerItem"><a href="javascript:void();">FAQs</a></div>		
	</div>
</div>
