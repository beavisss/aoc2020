<?php

$input = explode("\n", file_get_contents('input.txt'));
$lines = count($input);

$acc = 0;
$line = 0;
$processed = [];
while ($line <= $lines) {
	if (in_array($line, $processed)) {
		echo 'HOTOVO:' . $acc;
		return;
	} else {
		$processed[] = $line;
	}

	$current = $input[$line];

	[$command, $signal] = explode(" ", $current);
	$operator = substr($signal, 0, 1);
	$number = substr($signal, 1, 3);

	if ($command == "nop") {
		echo "nop \n";
	}

	if ($command == "acc") {
		echo sprintf("line: %s, acc is changing from %s to %s \n", $line, $acc, $signal);
		if ($operator == "+") {
			$acc += $number;
		} else {
			$acc -= $number;
		}
	}

	if ($command == "jmp") {
		echo sprintf("line: %s, changing line to %s \n", $line, $signal);
		if ($operator == "+") {
			$line += $number;
		} else {
			$line -= $number;
		}
	} else {
		$line++;
	}
}
