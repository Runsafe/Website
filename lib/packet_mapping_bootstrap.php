<?php
	ClassLoader::registerPacketHandler(1, 'spleef_score.php', 'SpleefScorePacketHandler');
	ClassLoader::registerPacketHandler(2, 'login.php', 'LoginPacketHandler');
	ClassLoader::registerPacketHandler(3, 'link_character.php', 'LinkCharacterPacketHandler');
	ClassLoader::registerPacketHandler(4, 'pvp_get_points.php', 'PVPGetPointsPacketHandler');
	ClassLoader::registerPacketHandler(5, 'pvp_buy_item.php', 'PVPBuyItemPacketHandler');
	ClassLoader::registerPacketHandler(6, 'pvp_signup.php', 'PVPSignupPacketHandler');
	ClassLoader::registerPacketHandler(7, 'edit_dog_response.php', 'EditDogResponsePacketHandler');
	ClassLoader::registerPacketHandler(8, 'delete_dog_response.php', 'DeleteDogResponsePacketHandler');
?>