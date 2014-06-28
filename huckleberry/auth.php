<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$username = REST::Get('username');
	$password = REST::Get('password');
	$return = 'invalid';

	if ($username !== NULL && $password !== NULL)
		if (AuthHandler::verifyCredentials($username, $password))
			$return = 'success';

	echo $return;
?>