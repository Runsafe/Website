<?php
	class KW_ErrorHandler
	{
		/**
		 * Construct an error handler for the KrameWork system.
		 *
		 * @param bool $alterLevel Can we alter the runtime error level?
		 * @param integer $maxErrors How many errors do we abort after, per execution?
		 */
		public function __construct($alterLevel = true, $maxErrors = 10)
		{
			$this->maxErrors = $maxErrors;
			if ($alterLevel)
				error_reporting(E_ALL);

			set_error_handler(array($this, "handleError"));
			set_exception_handler(array($this, "handleException"));
		}

		/**
		 * Add a recipient to the mail template for error reporting.
		 *
		 * @param string $recipient Address of the recipient to add.
		 */
		public function addEmailOutputRecipient($recipient)
		{
			$this->getMailObject()->addRecipients($recipient);
		}

		/**
		 * Return the mail object being held by the error handler which is used as a template.
		 *
		 * @return KW_Mail ErrorHandler mail template.
		 */
		public function getMailObject()
		{
			if ($this->mail === NULL)
				$this->mail = new KW_Mail();

			return $this->mail;
		}

		/**
		 * Set the path which will be used for logging errors.
		 *
		 * @param string $log Path to a directory or file.
		 */
		public function setOutputLog($log)
		{
			$this->log = $log;
		}

		/**
		 * Handles a PHP runtime error.
		 *
		 * @param int $type ID of the error that occurred.
		 * @param string $string Message describing the error.
		 * @param string $file File where the error occurred.
		 * @param int $line The line number where the error occurred.
		 * @return bool True if the error was handled, else false.
		 */
		public function handleError($type, $string, $file, $line)
		{
			if($this->errorCount++ > $this->maxErrors)
				die('Excessive errors, aborting');
			if (!error_reporting() & $type)
				return true;

			switch ($type)
			{
				case E_USER_ERROR: $type = 'FATAL'; break;
				case E_USER_WARNING: $type = 'WARNING'; break;
				case E_USER_NOTICE: $type = 'NOTICE'; break;
				case E_STRICT: $type = 'STRICT'; break;
				case E_USER_DEPRECATED: $type = 'DEPRECATED'; break;
				default: $type = 'UNKNOWN'; break;
			}

			$this->sendErrorReport($this->generateErrorReport($type, $line, $file, $string, debug_backtrace()));
			return true;
		}

		/**
		 * Handles an exception in the PHP runtime.
		 *
		 * @param Exception $exception The uncaught exception.
		 */
		public function handleException($exception)
		{
			if($this->errorCount++ > $this->maxErrors)
				die('Excessive errors, aborting');
			$this->sendErrorReport($this->generateErrorReport(
				'EXCEPTION', $exception->getLine(), $exception->getFile(), $exception->getMessage(), $exception->getTrace())
			);
		}

		/**
		 * Generate an error report.
		 *
		 * @param string $type Describe the error in roughly one word, such as EXCEPTION.
		 * @param int $line The line where this error occurred.
		 * @param string $file The file where this error occurred.
		 * @param string $error A description of the error.
		 * @return KW_ErrorReport An error report object ready for use.
		 */
		private function generateErrorReport($type, $line, $file, $error, $trace = null)
		{
			$report = new KW_ErrorReport();
			$report->setSubject('Error (' . $type . ') - ' . date("Y-m-d H:i:s"));
			$report->Type = $type;
			$report->Line = $line;
			$report->File = $file;
			$report->Error = $error;
			$report->trace = $trace;

			return $report;
		}

		/**
		 * Send an error report object using the handler mail template.
		 *
		 * @param KW_ErrorReport $report An error report to send.
		 */
		public function sendErrorReport($report)
		{
			if ($this->mail !== NULL)
			{
				$this->mail->clear();
				$this->mail->append((string) $report);

				if ($this->mail->getSubject() === NULL)
					$this->mail->setSubject($report->getSubject());

				if ($this->mail->getRecipientCount() > 0)
					$this->mail->send();
			}

			if ($this->log !== NULL)
			{
				if (@is_file($this->log))
				{
					file_put_contents($this->log, (string) $report, FILE_APPEND);
				}
				else if (@is_dir($this->log))
				{
					$log_file = $this->createLogFileName($this->log);
					file_put_contents($log_file, (string) $report);
				}
			}
		}

		private function getLogName($number)
		{
			return time() . '_' . $number . '.log';
		}

		private function createLogFileName($directory)
		{
			$number = 0;
			$file_name = $this->getLogName($number);
			while (file_exists($directory . DIRECTORY_SEPARATOR . $file_name))
			{
				$number++;
				$file_name = $this->getLogName($number);
			}

			return $directory . DIRECTORY_SEPARATOR . $file_name;
		}

		/**
		 * @var KW_Mail
		 */
		private $mail;

		/**
		 * @var string|null Will be NULL if not yet set.
		 */
		private $log;

		/**
		 * @var maxErrors Number of errors to process before aborting exection.
		 */
		private $maxErrors = 10;

		/**
		 * @var integer Number of errors this execution.
		 */
		private $errorCount = 0;
	}
?>
