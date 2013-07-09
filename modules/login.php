<?php
	class LoginPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('../templates/login.php');
			$this->title = 'Log-in';
		}
	}
?>