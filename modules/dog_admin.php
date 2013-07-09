<?php
	class DogAdminPage extends AdminModule
	{
		public function Build()
		{
			$this->content = new Template('../templates/dog_admin.php');
			$this->title = 'Dog Administration';
		}
	}
?>