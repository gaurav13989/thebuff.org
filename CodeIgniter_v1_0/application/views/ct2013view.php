<!doctype HTML>
<html>
<head>
	<title>Champions League 2013 - Faantashi Leej</title>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<style type="text/css">
		body {
			margin: 0px;
			font-family: monospace;
		}
		#tank {
			position:relative;
			display: table;	
			width: 100%;
			height: 100%;
		}
		#water {
			position:;
			display: table-cell;
			vertical-align: middle;	

		}
		#fish {
			height: 500px;
			background-color: #223344;	
			width: 100%;
		}
		#wall {
			display: block;
			width: 750px;
			margin-left:auto;
			margin-right:auto;
			height: 100%;
			overflow: scroll;
		}
		#innerTank {
			position: absolute;
			background-color: #FFF;
			width: 750px;
			margin-left: auto;
			margin-right: auto;
			height: 100%;
			display: block;
		}
		.button {
			cursor: pointer;
			text-align: center;
			background-color: #AABBCC;
			margin-bottom: 2px;
			padding: 5px;
			font-size: 12px;
		}
		.buttonExtra {
			display: ;
		}
	</style>
	<script type="text/javascript">
		$(function(){

			$('.button').hover(function(){
				//$(this).find('.buttonExtra').slideDown();
				$(this).css('background-color','#7788AA');
				$(this).css('color','white');

			},function(){
				//$(this).find('.buttonExtra').hide();
				$(this).css('background-color','#AABBCC');
				$(this).css('color','black');
			});

			$('.button').click(function(){

				// change class of all .button to .buttonTemp

				var id = $(this).attr('id');

				// load left area with match details

				// change class of all .buttonTemp to .button				

			});

		});
	</script>
</head>
<body>

<div id="wall">
<div id="innerTank">
<div id="tank">
<div id="water">
<div id="fish">

<div style="float: left; width: 80%; height: 100%; display: block;">
	<div style="margin-top: 5px; margin-left: 5px; background-color: #EEEEEE; height: 490px; width: 590px;"></div>
</div>
<div style="float: right; width: 20%; height: 100%; display: block;">
	<div style="margin-top: 5px; margin-left: 5px; background-color: #EEEEEE; height: 490px; width: 140px; overflow-y: auto;">

	<div class="button" id="m1">
		<div class="buttonName">1st Match, Group B - India v South Africa</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Thu Jun 6<br/>
			Venue: Sophia Gardens, Cardiff
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">2nd Match, Group B - Pakistan v West Indies</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Fri Jun 7<br/>
			Venue: Kennington Oval, London
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">3rd Match, Group A - England v Australia</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Sat Jun 8<br/>
			Venue: Edgbaston, Birmingham
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">4th Match, Group A - New Zealand v Sri Lanka</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Sun Jun 9<br/>
			Venue: Sophia Gardens, Cardiff
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">5th Match, Group B - Pakistan v South Africa</div>
		<div class="buttonExtra">
			At: 17:30 IST<br/>
			On: Mon Jun 10<br/>
			Venue: Edgbaston, Birmingham
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">6th Match, Group B - India v West Indies</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Tue Jun 11<br/>
			Venue: Kennington Oval, London
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">7th Match, Group A - Australia v New Zealand</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Wed Jun 12<br/>
			Venue: Edgbaston, Birmingham
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">8th Match, Group A - England v Sri Lanka</div>
		<div class="buttonExtra">
			At: 17:30 IST<br/>
			On: Thu Jun 13<br/>
			Venue: Kennington Oval, London
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">9th Match, Group B - South Africa v West Indies</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Fri Jun 14<br/>
			Venue: Sophia Gardens, Cardiff
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">10th Match, Group B - India v Pakistan</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Sat Jun 15<br/>
			Venue: Edgbaston, Birmingham
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">11th Match, Group A - England v New Zealand</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Sun Jun 16<br/>
			Venue: Sophia Gardens, Cardiff
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">12th Match, Group A - Australia v Sri Lanka</div>
		<div class="buttonExtra">
			At: 17:30 IST<br/>
			On: Mon Jun 17<br/>
			Venue: Kennington Oval, London
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">1st Semi-Final - TBC v TBC</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Wed Jun 19<br/>
			Venue: Kennington Oval, London
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">2nd Semi-Final - TBC v TBC</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Thu Jun 20<br/>
			Venue: Sophia Gardens, Cardiff
		</div>
	</div>
	<div class="button" id="m1">
		<div class="buttonName">Final - TBC v TBC</div>
		<div class="buttonExtra">
			At: 15:00 IST<br/>
			On: Sun Jun 23<br/>
			Venue: Edgbaston, Birmingham
		</div>
	</div>


	</div>
</div>
<div style="clear: both;"></div>


</div>
</div>
</div>
</div>
</div>
</body>

</html>