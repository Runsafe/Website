<?php
	class AccountPage extends MemberModule
	{
		public function Build()
		{
			$this->content = new Template('account');
			$this->title = 'Account';

			$this->content->linkedCharacter = AccountManager::GetLinkedCharacter();
		}
	}
?>
