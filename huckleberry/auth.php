<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$username = REST::Get('username');
	$password = REST::Get('password');
	$return = 'invalid';

	if ($username !== NULL && $password !== NULL)
	{
		$account = Accounts::verifyAccount($username, $password);
		if ($account != false)
		{
			$return = 'noinvite';
			$query = DB::Web()->prepare('SELECT hb_user FROM accounts WHERE ID = :id');
			$query->setValue(':id', $account);

			$user = $query->getFirstRow();
			if ($user !== null && $user->hb_user !== null)
			{
				$auth_key = md5($user->hb_user . time());
				DB::Web()->prepare('UPDATE accounts SET hb_key = :key WHERE ID = :id')->setValue(':key', $auth_key)->setValue(':id', $account)->execute();
				$return = 'USER' . $user->hb_user . ',' . $auth_key;
			}
		}
	}

	echo $return;
?>