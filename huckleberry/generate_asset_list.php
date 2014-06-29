<?php
	// Prevent execution if not on command-line.
	if (PHP_SAPI !== 'cli')
		die("'Go away before 'a taunt ya for a second time!");

	$dir = 'client/assets/';

	$data = Array();
	function explore($dir)
	{
		global $data;
		foreach (scandir($dir) as $file)
		{
			if ($file == '.' || $file == '..')
				continue;

			$path = $dir . $file;
			if (is_dir($path))
				explore($path . '/');
			else
				$data[] = $path . ':' . md5_file($path);
		}
	}

	explore($dir);
	file_put_contents('assets.dat', implode(chr(30), $data));
?>