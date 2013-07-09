<?php
	require_once("../lib/bootstrap.php");

	Authenticator::Logout();
	Transporter::Transport('index.php');
?>