<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	if (!Accounts::isLoggedIn())
		header('Location: http://runsafe.no/login.php');
	else
		echo new HuckleberryAccountPage();
?>