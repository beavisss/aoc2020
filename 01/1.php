<?php

$input = explode("\n", file_get_contents('input.txt'));
$desired = 2020;

foreach ($input as $first) {
	$first = (int) $first;
	foreach ($input as $second) {
		$second = (int) $second;
			if ($first + $second=== $desired) {
				echo sprintf('Found both candidates: %d + %d = %d', $first, $second, $desired);
				echo "\r\n";
				echo $first * $second;
				break 2;
			}
	}
}