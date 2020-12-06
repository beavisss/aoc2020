<?php

$groups = explode("\n\n", file_get_contents('input.txt'));

$sum = 0;
foreach ($groups as $key => $group) {
	$users = explode("\n", $group);

	$groupAnswers = [];
	foreach ($users as $user) {
		$answers = str_split($user);
		$answers = array_unique(array_filter($answers, fn($value) => trim($value) !== ''));
		$groupAnswers[] = $answers;
	}

	if (count($groupAnswers) === 1) {
		$sum += count($groupAnswers[0]); 
	} else {
		$sameAnswers = call_user_func_array('array_intersect', $groupAnswers);
		if (count($sameAnswers) === 0) {
			continue;
		}
		$sum += count($sameAnswers);	
	}
}

echo $sum;