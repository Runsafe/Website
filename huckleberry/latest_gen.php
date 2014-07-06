<?php
	// Prevent execution if not on command-line.
	if (PHP_SAPI !== 'cli')
		die("'Go away before 'a taunt ya for a second time!");

	$output = "{\\rtf1\\ansi";
	$lines = explode("\r\n", file_get_contents('latest_raw.txt'));

	foreach ($lines as $line)
	{
		if (strlen($line) > 0)
		{
			if (substr($line, 0, 1) == '*')
				$output .= "{\\b " . substr($line, 1) . " \\b0}\\page";
			else
				$output .= "{- " . $line . "}\\page";
		}
		else
		{
			$output .= "\\page";
		}
	}

	$output .= "}";
	file_put_contents("latest.txt", $output);
?>