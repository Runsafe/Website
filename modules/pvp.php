<?php
	class PvPPage extends MemberModule
	{
		public function Build()
		{
			$this->title = 'PvP Event';

			if (AccountManager::GetLinkedCharacter() !== null)
				$this->content = new Template('../templates/pvp.php');
			else
				$this->content = new Template('../templates/require_link.php');
		}
	}
?>