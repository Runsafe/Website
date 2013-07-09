<?php
	class AdminModule extends MemberModule
	{
		public function __construct()
		{
			if (!Authenticator::IsAdmin())
			{
				if(!Authenticator::IsLoggedIn())
					parent::__construct();
				else
					$this->Deny();
			}
			else
				parent::__construct();
		}

		private function Deny()
		{
			$this->content = new Template('../templates/invalid_access.php');
			$this->title = 'Invalid Access';
		}
	}
?>
