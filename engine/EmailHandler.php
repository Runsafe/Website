<?php
	class EmailHandler
	{
		/**
		 * Format an e-mail template
		 *
		 * @param string $template File to load
		 * @param array $formatting Array of formatting replacements
		 * @return mixed
		 */
		public static function formatTemplate($template, $formatting)
		{
			return str_replace(array_keys($formatting), array_values($formatting), file_get_contents($template));
		}

		/**
		 * Send an e-mail, how fancy!
		 *
		 * @param string $body The e-mail body
		 * @param string $subject E-mail subject
		 * @param string|array $recipients A single or array of recipients
		 * @param boolean $html Does the e-mail contain HTML?
		 */
		public static function sendMail($body, $subject, $recipients, $html = false)
		{
			$email = new KW_Mail();
			$email->append($body);

			if ($html)
				$email->setHeader('MIME-Version', '1.0')->setHeader('Content-type', 'text/html; charset=iso-8859-1');

			$email->setSubject($subject)->addRecipients($recipients)->setSender('Runsafe <noreply@runsafe.no>')->send();
		}
	}
?>