<?php
	class CompPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/comp.php');
			parent::__construct('Minecraft', $template, 'minecraft_navigation.php');
			$this->addStylesheet('comp.css');
		}
	}
?>