<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$dir = 'client/libs/';
	foreach (scandir($dir) as $file)
	{
		if ($file == '.' || $file == '..')
			continue;

		echo $file . ':' . md5_file($dir . $file) . ',';
	}
?>