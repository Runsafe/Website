<?php
	class MemberModule extends Module
	{
		public function __construct()
		{
			if (Authenticator::IsLoggedIn())
				parent::__construct();
			else
				$this->Deny();
		}

		private function Deny()
		{
			$this->content = new Template('login');
			$this->content->attempt = true;
			$this->title = 'Log-in';
		}
	}
?>
