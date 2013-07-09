<?php
	class EditDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			$id = REST::Get('response_id');
			$pattern = REST::Get('response_pattern');
			$reply = REST::Get('response_reply');

			// ToDo: Handle this.
		}
	}
?>