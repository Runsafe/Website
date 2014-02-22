<?php
	require_once('../KrameWork/KrameSystem.php');
	$system = new KrameSystem();

	$system->getErrorHandler()->addEmailOutputRecipient('kruithne@runsafe.no');
	$system->addAutoLoadPath(getcwd());
	$system->addAutoLoadPath('../modules');
?>