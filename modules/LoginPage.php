<?php
	class LoginPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/login.php');
			parent::__construct('Log-in', $template, 'runsafe_navigation.php');
			$this->addStylesheet('form.css');
			$this->addScript('forms.js');
			$this->addScript('login.js');

			if (Accounts::isLoggedIn())
			{
				Accounts::logout();
				$template->logout = true;
			}
		}
	}
?>