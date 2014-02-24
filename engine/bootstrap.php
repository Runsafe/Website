<?php
	require_once('../KrameWork/KrameSystem.php');

	$system = new KrameSystem();

	$system->getErrorHandler()->addEmailOutputRecipient('kruithne@runsafe.no');
	$system->addAutoLoadPath('../modules');
	$system->addAutoLoadPath('../engine');
	$system->addAutoLoadPath('../engine/interfaces');
?>