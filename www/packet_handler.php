<?php
	require_once('../engine/bootstrap.php'); // Include bootstrap.
	require_once('../engine/packet_mapping_bootstrap.php');
	$system->addAutoLoadPath('../engine/packet_handlers');

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
		$handler = PacketSystem::getHandler($packet);
		if ($handler instanceof IPacketHandler)
		{
			if ($uid !== null)
				$handler->output('uid', $uid);

			echo $handler;
		}
	}
?>