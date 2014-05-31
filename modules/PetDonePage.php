<?php
	class PetDonePage extends SiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/pet_done.php');
			parent::__construct('Purchase Done', $template, 'runsafe_navigation.php');
		}
	}
?>