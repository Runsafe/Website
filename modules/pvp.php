<?php
	class PvPPage extends MemberModule
	{
		public function Build()
		{
			$this->title = 'PvP Event';

			if (AccountManager::GetLinkedCharacter() !== null)
				$this->content = new Template('pvp');
			else
				$this->content = new Template('require_link');
		}
	}
?>
