<?php
	class RunsafeHomePage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/runsafe_home.php');
			parent::__construct('Homepage', $template, 'runsafe_navigation.php');
			$this->addStylesheet('runsafe_main.css');
			$this->addScript('runsafe_main.js');
		}
	}
?>