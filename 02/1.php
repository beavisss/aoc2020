<?php

$input = explode("\n", file_get_contents('input.txt'));

$valid = 0;
foreach ($input as $line) {
	[$count, $word, $pass] = explode(" ", $line);
	$word = substr($word, 0, 1);
	[$min, $max] = explode("-", $count);

	$occurrences = substr_count($pass, $word);

	if ($occurrences >= $min && $occurrences <= $max) {
		$valid++;
	}
}

echo $valid;