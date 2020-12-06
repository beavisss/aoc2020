<?php

$groups = explode("\n\n", file_get_contents('input.txt'));

$sum = 0;
foreach ($groups as $group) {
	$answers = str_split($group);
	$answers = array_unique(array_filter($answers, fn($value) => trim($value) !== ''));
	$sum += count($answers);
}

echo $sum;