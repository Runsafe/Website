<?php
	class RunsafeHomePage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/runsafe_home.php');
			parent::__construct('Homepage', $template);
		}
	}
?>