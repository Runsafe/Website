<?php
	class MinecraftMainPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/minecraft_main.php');
			parent::__construct('Minecraft', $template, 'minecraft_navigation.php');
		}
	}
?>