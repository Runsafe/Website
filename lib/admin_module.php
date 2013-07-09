<?php
	class AdminModule extends MemberModule
	{
		public function __construct()
		{
			$hasDenied = false;

			if (Authenticator::IsLoggedIn())
			{
				if (!Authenticator::IsAdmin())
				{
					$hasDenied = true;
					$this->Deny();
				}
			}

			if (!$hasDenied)
				parent::__construct();
		}

		private function Deny()
		{
			$this->content = new Template('invalid_access');
			$this->title = 'Invalid Access';
		}
	}
?>
