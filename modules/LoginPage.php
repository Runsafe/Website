<?php
	class LoginPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/login.php');
			parent::__construct('Log-in', $template);
			$this->addStylesheet('form.css');
			$this->addScript('login.js');
		}
	}
?>