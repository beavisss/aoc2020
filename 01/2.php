<?php

$input = explode("\n", file_get_contents('input.txt'));
$desired = 2020;

foreach ($input as $first) {
	$first = (int) $first;
	foreach ($input as $second) {
		$second = (int) $second;
		foreach ($input as $third) {
			$third = (int) $third;
			if ($first + $second + $third === $desired) {
				echo sprintf('Found all candidates: %d + %d + %d = %d', $first, $second, $third, $desired);
				echo "\r\n";
				echo $first * $second * $third;
				break 3;
			}
		}
	}
}