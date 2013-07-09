<?php
	class LoginPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$username = REST::Get('username');
			$password = REST::Get('password');

			$this->output['response'] = 0;

			if ($username !== null && $password !== null)
				if (Authenticator::AuthenticateUser($username, $password))
					$this->output['response'] = 1;
		}
	}
?>