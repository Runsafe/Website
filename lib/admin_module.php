<?php
	class AdminModule extends MemberModule
	{
		public function __construct()
		{
			if (Authenticator::IsAdmin() || !Authenticator::IsLoggedIn())
				parent::__construct();
			else
				$this->Deny();
		}

		private function Deny()
		{
			$this->content = new Template('invalid_access');
			$this->title = 'Invalid Access';
		}
	}
?>
