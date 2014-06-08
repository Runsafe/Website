<?php
	class PetsPage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/pets.php');
			parent::__construct('Companion Pets', $template, 'minecraft_navigation.php');
			$this->addStylesheet('form.css');
			$this->addStylesheet('pets.css');
			$this->addScript('forms.js');
		}
	}
?>