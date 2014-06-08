<?php
	require_once('../KrameWork/KrameSystem.php');

	KW_ClassLoader::addClassPath('../modules');
	KW_ClassLoader::addClassPath('../engine');
	KW_ClassLoader::addClassPath('../engine/interfaces');

	session_name('runsafe');
	session_set_cookie_params(0, '/', '.runsafe.no');

	$system = new KrameSystem();

	$system->getErrorHandler()->addEmailOutputRecipient('kruithne@runsafe.no');
?>