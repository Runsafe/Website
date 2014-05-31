<?php
	class RecoveryPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/recovery.php');
			parent::__construct('Recover Account', $template, 'runsafe_navigation.php');
			$this->addStylesheet('form.css');
			$this->addScript('forms.js');
			$this->addScript('recovery.js');
		}
	}
?>