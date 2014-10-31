<?php
	class HBSiteModule extends SiteModule
	{
		/**
		 * @param string $content Page content
		 */
		public function __construct($content)
		{
			$this->styles = Array();
			$this->scripts = Array();

			$this->template = new KW_Template('../templates/hb_site_template.php');
			$this->template->content = $content;
			//$this->template->navigation = new KW_Template('../templates/' . $navigation);
		}
	}
?>