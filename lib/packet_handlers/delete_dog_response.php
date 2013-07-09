<?php
	class DeleteDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			if (Authenticator::IsLoggedIn() && Authenticator::IsAdmin())
			{
				$id = REST::Get('id');

				if ($id != null)
					DogHandler::DeleteResponse($id);
			}
		}
	}
?>