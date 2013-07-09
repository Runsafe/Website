<?php
	class PvPShopPage extends MemberModule
	{
		public function Build()
		{
			$this->title = 'PvP Shop';

			if (AccountManager::GetLinkedCharacter() !== null)
				$this->content = new Template('pvp_shop');
			else
				$this->content = new Template('require_link');
		}
	}
?>
