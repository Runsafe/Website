<?php
	class EditDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			if (Authenticator::IsLoggedIn() && Authenticator::IsAdmin())
			{
				$id = REST::Get('id');
				$pattern = html_entity_decode(REST::Get('pattern'));
				$reply = html_entity_decode(REST::Get('reply'));

				if ($id != null && $pattern != null && $reply != null)
				{
					if ($id == "new")
					{
						$this->output['success'] = DogHandler::AddNewResponse($pattern, $reply);
					}
					else
					{
						DogHandler::EditResponse($id, $pattern, $reply);
						$this->output['success'] = $id;
					}
				}
			}
		}
	}
?>