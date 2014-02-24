<?php
	class FourOhFourPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/404.php');
			parent::__construct('404 - Page Not Found', $template, 'runsafe_navigation.php');
		}
	}
?>