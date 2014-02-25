<?php
	require_once('../KrameWork/KrameSystem.php');

	session_name('runsafe');
	session_set_cookie_params(0, '/', '.runsafe.no');

	$system = new KrameSystem();

	$system->getErrorHandler()->addEmailOutputRecipient('kruithne@runsafe.no');
	$system->addAutoLoadPath('../modules');
	$system->addAutoLoadPath('../engine');
	$system->addAutoLoadPath('../engine/interfaces');
?>