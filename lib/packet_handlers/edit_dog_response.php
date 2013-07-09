<?php
	class EditDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			if (Authenticator::IsLoggedIn() && Authenticator::IsAdmin())
			{
				$id = REST::Get('response_id');
				$pattern = REST::Get('response_pattern');
				$reply = REST::Get('response_reply');

				if ($id != null && $pattern != null && $reply != null)
				{
					DogHandler::EditResponse($id, $pattern, $reply);
					$this->output['success'] = 1;
				}
			}
		}
	}
?>