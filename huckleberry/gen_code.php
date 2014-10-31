<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	if (Accounts::isLoggedIn() && Accounts::getAccountData()->getAccountId() == 2)
		echo Huckleberry::generateRedeemCode();
?>