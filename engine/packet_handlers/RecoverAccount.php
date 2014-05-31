<?php
	class RecoverAccount extends PacketHandler
	{
		public function Run()
		{
			$email = REST::Get('email');

			if ($email != null)
			{
				if (Accounts::emailInUse($email))
				{
					$template = EmailHandler::formatTemplate('../email_templates/password_recover.html', Array(
						'{recover_id}' => 'test'
					));
					EmailHandler::sendMail($template, 'Password Recovery', $email, true);

					$this->output('success', 1);
					return;
				}
				$this->output('success', 0);
			}
		}
	}
?>