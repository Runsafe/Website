<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.

	$packet = null;
	$uid = null;

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$packet = REST::Post('pid');
		$uid = REST::Post('uid');
	}
	else
	{
		$packet = REST::Get('pid');
		$uid = REST::Get('uid');
	}

	if ($packet !== null)
	{

	}
?>