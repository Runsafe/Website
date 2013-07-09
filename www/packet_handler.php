<?php
	require_once('../lib/bootstrap.php');
	require_once('../lib/packet_mapping_bootstrap.php');

	$packet = REST::Get('pid');
	if ($packet !== null)
	{
		$handler = ClassLoader::getPacketHandler($packet);
		if ($handler instanceof PacketHandler)
			echo $handler;
	}
?>