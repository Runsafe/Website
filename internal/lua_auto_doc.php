<?php
	require_once('../lib/bootstrap.php');

	// Script to automatically generate documentation for our LUA engine.
	define('LUA_DOC_WIKI_PAGE', 'LUA_Documentation'); // The page on the Wiki to edit

	// Test pilot for automatic Wiki editing.
	shell_exec(sprintf('cd /var/www/mediawiki/core/maintenance && php edit.php -s "Automatic Documentation" -b "%s" < /home/stanleyb/text', LUA_DOC_WIKI_PAGE));
?>