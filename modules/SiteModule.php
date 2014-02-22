<?php
	class SiteModule extends KW_Module
	{
		/**
		 * @param string $title The title of the page
		 * @param string $content Page content
		 */
		public function __construct($title, $content)
		{
			$this->template = new KW_Template('../templates/site_template.php');
			$this->template->title = $title;
			$this->template->content = $content;
		}

		/**
		 * Called after the module is built.
		 *
		 * @return string The output of the module.
		 */
		public function renderModule()
		{
			return $this->template;
		}

		protected $template;
	}
?>