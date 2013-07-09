<?php
	class PvPShopPage extends MemberModule
	{
		public function Build()
		{
			$this->title = 'PvP Shop';

			if (AccountManager::GetLinkedCharacter() !== null)
				$this->content = new Template('../templates/pvp_shop.php');
			else
				$this->content = new Template('../templates/require_link.php');
		}
	}
?>