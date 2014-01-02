<?php

$doc  = simplexml_load_file(base_url()."xml/textCompletion/textCompletion".$no.".xml");
$questions = $doc->children();

echo "
<script type='text/javascript'>
	var score = 0;
	var totalBlanks = 0;
	$('.option').click(function(){
		var blankNo = $(this).parent().attr('class').replace('group','');
		$(this).parent().parent().prev().prev().find('.inp'+blankNo).val($(this).html());
	});

	$('.reset').click(function(){
		$(this).parent().find('input[type=text]').each(function(){
			$(this).val('');
		});
		$(this).next().next().html('');
		$(this).next().next().next().slideUp();
	});

	$('.checkAns').click(function(){
		var inputs = $(this).parent().find('input[type=text]');
		var answers = $(this).parent().find('.correctOptions div[class^=blank]');
		var result = new Array();
		var comment = '';
		for(var i = 0; i< answers.length; i++)
		{
			totalBlanks++;
			if(inputs[i].value == '')
				result[i] = \"<span style='color: blue'>Blank \"+(i+1)+\" not answered.</span>\";
			else if(inputs[i].value == answers[i].innerHTML)
			{
				score++;
				result[i] = \"<span style='color: green;'>Blank \"+(i+1)+\" answered correctly.</span>\";
				$(this).parent().find('.explaination').slideDown();
			}	
			else
			{
				result[i] = \"<span style='color: red;'>Blank \"+(i+1)+\" answered incorrectly.</span>\";
				$(this).parent().find('.explaination').slideDown();
			}
		}
		for(var j = 0; j<result.length; j++)
		{
			comment = comment+' '+result[j];
		}	
		$(this).parent().find('.comment').html(comment);
	});
	$('.checkAll').click(function(){
		totalBlanks = 0;
		score = 0;
		$('.checkAns').trigger('click');
		$('body').animate( { scrollTop: \"0\" } , 500);
		var scoreVal = '<div>Your Score</div><div>'+score+' / '+totalBlanks+'</div>';
		$('#score').html(scoreVal);
		$('#score').show();
	});
	$('.resetAll').click(function(){
		$('#score').html('');
		$('#score').hide();
		$('.reset').trigger('click');
		$('body').animate( { scrollTop: \"0\" } , 500);
	});
</script>
<div style='font-size: 10px; font-style: italic'>Click on an option for selecting it!</div>
<div id='score'></div>
";
$questionNo = 1;

foreach($questions as $question){
	echo "<div id='question".$questionNo."' class='question'>";
	$sentence = $question->sentence;
	$originalSentence = $question->sentence;
	for($blankCount = 1; $blankCount <= substr_count($originalSentence, "####"); $blankCount++)
	{
		$sentence = preg_replace("/####/", "<input type='text' class='inp".$blankCount."'/>", $sentence, 1	);
	}
	echo "<div class='sentence'>".$questionNo++.". ".$sentence."</div>";
	echo "<div class='blanks'>".$question->blanks."</div>";
	$optionSets = $question->optionSets;
	$optionsGroups = $optionSets->children();
	$i = 1;
	echo "<div class='groups'>";
	foreach($optionsGroups as $options)
	{
		$optionGroup = $options->children();
		echo "<div class='group".$i."'>";	
		foreach($optionGroup as $option)
		{
			echo "<div class='option'>";
			echo $option;
			echo "</div>";
		}
		echo "</div>";
		$i++;
	}
	echo "<div style='clear: both;'></div>";
	echo "</div>";
	$j = 1;
	echo "<div class='correctOptions'>";
	$correctOptions = $question->correctOptions->children();
	foreach($correctOptions as $blank)
	{
		echo "<div class='blank".$j."'>";
		echo $blank;
		echo "</div>";
		$j++;
	}
	echo "</div>";
	echo "<input type='button' class='reset' value='Reset'/>";
	echo "<input type='button' class='checkAns' value='Check Answer'/>";
	echo "<span class='comment'></span>";
	echo "<div class='explaination'>";
	echo $question->explaination;
	echo "</div>";
	echo "</div>";
}
echo "<input type='button' class='resetAll' value='Reset All'/>";
echo "<input type='button' class='checkAll' value='Check All Answers'/>";