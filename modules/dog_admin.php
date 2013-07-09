<?php
	class DogAdminPage extends AdminModule
	{
		public function Build()
		{
			$this->content = new Template('dog_admin');
			$this->title = 'Dog Administration';
		}
	}
?>
