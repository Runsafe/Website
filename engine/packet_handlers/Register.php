<?php
	class Register extends PacketHandler
	{
		public function Run()
		{
			$this->output('success', 0);
			$email = REST::Get('email');
			$pass = REST::Get('pass');
			$error = NULL;


			if ($email != null && $pass != null)
			{
				if (!Accounts::emailIsValid($email))
					$error = 'Invalid e-mail address';
				else if (Accounts::emailInUse($email))
					$error = 'E-mail address already registered';
			}
			else
			{
				$error = 'Invalid input';
			}

			if ($error == NULL)
			{
				Accounts::registerAccount($email, $pass);
				$this->output('success', 1);
			}
			else
			{
				$this->output('error', $error);
			}
		}
	}
?>