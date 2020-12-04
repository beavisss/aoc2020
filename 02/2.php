<?php
$input = explode("\n", file_get_contents('input.txt'));

$valid = 0;
foreach ($input as $line) {
	[$count, $word, $pass] = explode(" ", $line);
	$word = substr($word, 0, 1);
	[$first, $second] = explode("-", $count);

	$firstIndex = substr($pass, $first, 1);
	$secondIndex = substr($pass, $second, 1);

	if ($word == $firstIndex || $word == $secondIndex) {
		$valid++;
	}
}

echo $valid;