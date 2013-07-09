<?php
	class LinkCharacterPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$character = REST::Get('character');
			$token = REST::Get('token');

			$this->output['character'] = $character;
			$this->output['response'] = (AccountManager::LinkCharacter($character, $token) ? 1 : 0);
		}
	}
?>