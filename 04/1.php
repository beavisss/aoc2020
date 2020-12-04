<?php

$input = file_get_contents('input.txt');
$passports = explode("\n\n" , $input);

$requiredFields = [
	'byr',
	'iyr',
	'eyr',
	'hgt',
	'hcl',
	'ecl',
	'pid',
];

$validCount = 0;
foreach ($passports as $passport) {
	$valid = true;
	foreach ($requiredFields as $field) {
		if (strpos($passport, $field) === false) {
			$valid = false;
			break;
		}
	}

	if ($valid) {
		$validCount++;
	}
}

echo $validCount;