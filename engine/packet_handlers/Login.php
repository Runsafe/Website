<?php
	class Login extends PacketHandler
	{
		public function Run()
		{
			$email = REST::Get('email');
			$pass = REST::Get('pass');

			if ($email != null && $pass != null)
			{
				$verify = Accounts::verifyAccount($email, $pass);
				if ($verify == null)
					$this->output('success', 0);
				else
					$this->output('success', 1);
			}
		}
	}
?>