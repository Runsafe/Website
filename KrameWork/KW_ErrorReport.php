<?php
	class KW_ErrorReport
	{
		/**
		 * Constructs an error report object.
		 */
		public function __construct()
		{
			$this->addInfo($this->formatValue('Time', date('l jS \of F Y h:i:s A')));
		}

		/**
		 * Adds information to the report.
		 *
		 * @param string|array $info A string or array section to add to the report.
		 */
		public function addInfo($info)
		{
			$this->data[] = $info;
		}

		/**
		 * Adds a key/value combination to the report using the built-in format.
		 *
		 * @param string $key The key for the value.
		 * @param string $value They value.
		 */
		public function __set($key, $value)
		{
			$this->addInfo($this->formatValue($key, $value));
		}

		/**
		 * Pushes helpful information into the array given.
		 *
		 * @param array $array The array to push the information into.
		 */
		private function bundleReportInformation(&$array)
		{
			$array[] = Array(
				$this->formatValue('PHP Version', PHP_VERSION),
				$this->formatValue('Server OS', PHP_OS)
			);

			if (KrameSystem::sessionIsStarted())
				$array[] = Array('SESSION' => $this->bundleArray($_SESSION));

			$array[] = Array('GET' => $this->bundleArray($_GET));
			$array[] = Array('POST' => $this->bundleArray($_POST));
		}

		/**
		 * Format a key/value into a simple string.
		 *
		 * @param mixed $key The key for the string.
		 * @param mixed $value The value for the string.
		 * @return string Formatted string.
		 */
		private function formatValue($key, $value)
		{
			return $key . ': ' . $value;
		}

		/**
		 * Traverses down the array and generates a report section for it.
		 *
		 * @param array $source The source array.
		 * @param array|null $array The report section.
		 * @param null|string $main_key The current key in traversing context.
		 * @return array The section in it's current state.
		 */
		private function bundleArray($source, $array = NULL, $main_key = NULL)
		{
			if ($array === NULL)
				$array = Array();

			foreach ($source as $key => $value)
			{
				if (is_array($value) || is_object($value))
				{
					$node_key = is_string($key) ? $key : gettype($value);
					$new_key = ($main_key === NULL ? $node_key : $main_key . '/' . $node_key);
					return $this->bundleArray($value, $array, $new_key);
				}
				else
				{
					$new_key = $main_key === NULL ? $key : $main_key . '/' . $key;
					$array[$new_key] = $value;
				}
			}
			return $array;
		}

		/**
		 * Returns the report all nice and formatted.
		 *
		 * @return string Formatted report string.
		 */
		public function __toString()
		{
			$output = new StringBuilder();
			$data = $this->data;

			$this->bundleReportInformation($data);
			$this->prepareOutputData($data, $output);

			return (string) $output;
		}

		/**
		 * Loops through the array given, appending everything in sections (split by array) to the output.
		 *
		 * @param mixed $data
		 * @param StringBuilder $output
		 */
		private function prepareOutputData($data, $output)
		{
			foreach ($data as $node)
			{
				if (is_array($node))
				{
					$output->append("\r\n", 2);
					$this->prepareOutputData($node, $output);
				}
				else
				{
					$output->append($node)->append("\r\n");
				}
			}
		}

		/**
		 * Set the subject for this error report.
		 *
		 * @param string $subject Subject to set.
		 */
		public function setSubject($subject)
		{
			$this->subject = $subject;
		}

		/**
		 * Get the subject for this error report.
		 *
		 * @return string|null Subject for this report, will be NULL if not yet set.
		 */
		public function getSubject()
		{
			return $this->subject;
		}

		/**
		 * @var array
		 */
		private $data = Array();

		/**
		 * @var string
		 */
		private $subject;
	}
?>