<?php
	class AccountPage extends MemberModule
	{
		public function Build()
		{
			$this->content = new Template('../templates/account.php');
			$this->title = 'Account';

			$this->content->linkedCharacter = AccountManager::GetLinkedCharacter();
		}
	}
?>