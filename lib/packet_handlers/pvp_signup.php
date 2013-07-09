<?php
	class PvpSignupPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$signup = REST::Get('signup');
			$status = PVPEvent::IsSignedUp();
			$this->output['status'] = $status;

			if (!$status)
			{
				if ($signup !== null)
				{
					PVPEvent::SignUp();
					$this->output['status'] = true;
				}
			}
		}
	}
?>