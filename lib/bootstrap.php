<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	session_start();

	require_once('constants.php');
	require_once('config.php');
	require_once('class_loader.php');

	//Core
	ClassLoader::registerClass('DB', 'database.php');
	ClassLoader::registerClass('PhorumDB', 'phorum_database.php');
	ClassLoader::registerClass('REST', 'rest_handler.php');
	ClassLoader::registerClass('Session', 'session_handler.php');
	ClassLoader::registerClass('Transporter', 'transporter.php');
	ClassLoader::registerClass('Template', 'template.php');
	ClassLoader::registerClass('PacketHandler', 'packet_handler.php');
	ClassLoader::registerClass('Authenticator', 'authenticator.php');
	ClassLoader::registerClass('Transporter', 'transporter.php');

	// Module types
	ClassLoader::registerClass('Module', 'module.php');
	ClassLoader::registerClass('MemberModule', 'member_module.php');
	ClassLoader::registerClass('AdminModule', 'admin_module.php');

	// Specific page handlers
	ClassLoader::registerClass('StaffListHandler', 'staff_list_handler.php');
	ClassLoader::registerClass('SpleefHandler', 'spleef_handler.php');
	ClassLoader::registerClass('PvPRankingsHandler', 'pvp_rankings_handler.php');
	ClassLoader::registerClass('AccountManager', 'account_manager.php');
	ClassLoader::registerClass('PVPShopHandler', 'pvp_shop_handler.php');
	ClassLoader::registerClass('PVPEvent', 'pvp_event.php');
	ClassLoader::registerClass('DogHandler', 'dog_handler.php');

	spl_autoload_register('ClassLoader::loadClass');
?>