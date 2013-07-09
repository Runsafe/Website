<?php
	class EditDogResponsePacketHandler extends PacketHandler
	{
		public function Run()
		{
			$orig_pattern = REST::Get('orig_pattern');
			$orig_reply = REST::Get('orig_reply');
			$new_pattern = REST::Get('new_pattern');
			$new_reply = REST::Get('new_reply');

			// ToDo: Handle this.
		}
	}
?>