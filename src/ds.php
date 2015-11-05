<?php

// Set the timezone
$timezone = ($argc > 2) ? $argv[2] : 'America/Los_Angeles';
date_default_timezone_set($timezone);

// If no time is specified, get the current time. Otherwise convert given time to timestamp.
$query = ($argc > 1) ? $argv[1] : null;
if (is_numeric($query)) {
	$time = (int) $query;
} else if ($query) {
	$time = strtotime($query);
} else {
	$time = time();
}

// Time formats to display
$formats = [
	'Wordy' => 'F j, Y, g:i a',
	'MySQL' => 'Y-m-d H:i:s',
	'Full' => 'Y-m-d g:i:s A T',
	'ISO8601' => 'Y-m-d\TH:i:sP',
];

?>
<xml version="1.0">
<items>
<item uid="0" arg="<?= $time ?>" valid="yes">
    <title><?= $time ?></title>
</item>
<?php foreach ($formats as $name => $value): ?>
<item uid="<?= $name ?>" arg="<?= date($value, $time) ?>" valid="yes">
    <title><?= date($value, $time) ?></title>
    <subtitle><?= $name ?></subtitle>
</item>
<?php endforeach; ?>
</items>
