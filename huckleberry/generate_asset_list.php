<?php
	// Prevent execution if not on command-line.
	if (PHP_SAPI !== 'cli')
		die("'Go away before 'a taunt ya for a second time!");

	$dir = 'client/assets/';

	$dirs = Array();
	$data = Array();

	function explore($dir, $log = true)
	{
		global $data;

		if ($log)
		{
			global $dirs;
			$dirs[] = substr($dir, 14);
		}
		foreach (scandir($dir) as $file)
		{
			if ($file == '.' || $file == '..')
				continue;

			$path = $dir . $file;
			if (is_dir($path))
				explore($path . '/');
			else
				$data[] = substr($path, 14) . ':' . md5_file($path);
		}
	}

	explore($dir, false);
	file_put_contents('assets.dat', implode(chr(30), $dirs) . chr(31) . implode(chr(30), $data));
?>