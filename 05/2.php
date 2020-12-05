<?php

$input = explode("\n", file_get_contents('input.txt'));

$tickets = [];
foreach ($input as $ticket) {
	$tickets[] = getSeatID($ticket);
}

sort($tickets);

$min = array_shift($tickets);
$max = array_pop($tickets);
$missing = range($min, $max);

foreach ($tickets as $t) {
	unset($missing[array_search($t, $missing)]);
}

foreach ($missing as $m) {
	if (in_array($m + 1, $tickets) && in_array($m - 1, $tickets)) {
		echo $m;
		break;
	}
}

function getSeatID(string $ticket): int 
{
	$left = 'L';
	$right = 'R';
	$front = 'F';
	$back = 'B';

	$minRow = 0;
	$maxRow = 127;
	$rowInfo = str_split(substr($ticket, 0, 7));

	foreach ($rowInfo as $row) {
		$mid = ($maxRow - $minRow + 1) / 2;

		if ($row === $front) {
			$maxRow -= $mid;
		} else {
			$minRow += $mid;
		}
	}

	$minCol = 0;
	$maxCol = 7;
	$colInfo = str_split(substr($ticket, 7, 3));

	foreach ($colInfo as $col) {
		$mid = ($maxCol - $minCol + 1) / 2;

		if ($col === $left) {
			$maxCol -= $mid;
		} else {
			$minCol += $mid;
		}
	}

	return $maxRow * 8 + $maxCol;
}