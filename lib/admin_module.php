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
			$this->content = new Template('../templates/invalid_access.php');
			$this->title = 'Invalid Access';
		}
	}
?>
