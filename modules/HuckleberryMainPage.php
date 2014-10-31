<?php
	class HuckleberryMainPage extends HBSiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/huckleberry_main.php');
			parent::__construct($template);
		}
	}
?>