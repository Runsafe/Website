<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$username = REST::Get('username');
	$password = REST::Get('password');
	$return = 'invalid';

	if ($username !== NULL && $password !== NULL)
	{
		$account = Accounts::verifyAccount($username, $password);
		if (is_int($account))
		{
			$return = 'noinvite';
			$query = DB::Web()->prepare('SELECT hb_user FROM accounts WHERE ID = :id');
			$query->setValue(':id', $account);

			$user = $query->getFirstRow();
			if ($user !== null && $user->hb_user !== null)
				$return = 'success';
		}
	}

	echo $return;
?>