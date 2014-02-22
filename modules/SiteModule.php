<?php
	class SiteModule extends KW_Module
	{
		/**
		 * @param string $title The title of the page
		 * @param string $content Page content
		 */
		public function __construct($title, $content)
		{
			$this->styles = Array();
			$this->scripts = Array();

			$this->template = new KW_Template('../templates/site_template.php');
			$this->template->title = $title;
			$this->template->content = $content;
		}

		protected function addStylesheet($file)
		{
			$this->styles[] = $file;
		}

		protected function addScript($file)
		{
			$this->scripts[] = $file;
		}

		/**
		 * Called after the module is built.
		 *
		 * @return string The output of the module.
		 */
		public function renderModule()
		{
			$this->template->styles = $this->styles;
			$this->template->scripts = $this->scripts;
			return $this->template;
		}

		protected $template;
		private $styles;
		private $scripts;
	}
?>