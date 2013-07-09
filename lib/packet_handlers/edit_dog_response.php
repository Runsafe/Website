<?php
	class EditDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			if (Authenticator::IsLoggedIn() && Authenticator::IsAdmin())
			{
				$id = REST::Get('id');
				$pattern = REST::Get('pattern');
				$reply = REST::Get('reply');

				if ($id != null && $pattern != null && $reply != null)
				{
					DogHandler::EditResponse($id, $pattern, $reply);
					$this->output['success'] = 1;
				}
			}
		}
	}
?>