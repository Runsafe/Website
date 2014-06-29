<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$dir = 'client/assets/';

	function explore($dir)
	{
		foreach (scandir($dir) as $file)
		{
			if ($file == '.' || $file == '..')
				continue;

			$path = $dir . DIRECTORY_SEPARATOR . $file;
			if (is_dir($path))
				explore($path);
			else
				echo $path . ':' . md5_file($path) . ',';
		}
	}

	explore($dir);

	foreach (scandir($dir) as $file)
	{
		if ($file == '.' || $file == '..')
			continue;

		echo $file . ':' . md5_file($dir . $file) . ',';
	}
?>