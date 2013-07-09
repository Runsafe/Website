<?php
	class AdminModule extends MemberModule
	{
		public function __construct()
		{
			if (Authenticator::IsLoggedIn())
			{
				if (Authenticator::IsAdmin())
				{
					parent::__construct();
					return;
				}
			}
			$this->Deny();
		}

		private function Deny()
		{
			$this->content = new Template('invalid_access');
			$this->title = 'Invalid Access';
		}
	}
?>
