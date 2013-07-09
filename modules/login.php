<?php
	class LoginPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('login');
			$this->title = 'Log-in';
		}
	}
?>
