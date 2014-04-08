<?php
	class KW_Mail extends StringBuilder
	{
		/**
		 * Add a recipient who will receive this mail.
		 *
		 * @param string|array $recipients The address of the recipient.
		 * @return KW_Mail $this Instance of the object mail.
		 */
		public function addRecipients($recipients)
		{
			if (is_array($recipients))
				$this->recipients = array_merge($this->recipients, $recipients);
			else
				$this->recipients[] = $recipients;

			return $this;
		}

		/**
		 * Load the text from a file.
		 * @param string $file File to load.
		 */
		public function loadFromFile($file)
		{
			$this->append(file_get_contents($file));
		}

		/**
		 * Get the amount of recipients this mail will be sent to.
		 *
		 * @return int Amount of recipients.
		 */
		public function getRecipientCount()
		{
			return count($this->recipients);
		}

		/**
		 * Set the subject of the mail to be sent.
		 *
		 * @param string $subject The subject for the mail.
		 * @return KW_Mail $this Instance of the object mail.
		 */
		public function setSubject($subject)
		{
			$this->subject = $subject;
			return $this;
		}

		/**
		 * Get the subject for this mail object.
		 *
		 * @return string|null Subject for this object, will be NULL if not yet set.
		 */
		public function getSubject()
		{
			return $this->subject;
		}

		/**
		 * Set the address for which this mail originated from.
		 *
		 * @param string $sender The address of the sender.
		 * @return KW_Mail $this Instance of the object mail.
		 */
		public function setSender($sender)
		{
			return $this->setHeader("From", $sender);
		}

		/**
		 * Set a header to be used when sending this mail.
		 *
		 * @param string $header The header to set.
		 * @param string $value The value of the header.
		 * @return KW_Mail $this Instance of the object mail.
		 */
		public function setHeader($header, $value)
		{
			$this->headers[$header] = $value;
			return $this;
		}

		/**
		 * Send this mail.
		 *
		 * @throws KW_Exception
		 */
		public function send()
		{
			if (!count($this->recipients))
				throw new KW_Exception("Mail cannot be sent without recipients");

			if ($this->subject === NULL)
				throw new KW_Exception("Mail cannot be sent without a subject");

			$headers = Array();
			foreach ($this->headers as $header => $value)
				$headers[] = $header . ': ' . $value;

			mail(implode(',', $this->recipients), $this->subject, $this->__toString(), implode("\r\n", $headers));
		}

		/**
		 * @var string[]
		 */
		private $recipients = Array();

		/**
		 * @var string
		 */
		private $subject;

		/**
		 * @var array
		 */
		private $headers = Array();
	}
?>