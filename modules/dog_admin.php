<?php
	class DogAdminPage extends MemberModule
	{
		public function Build()
		{
			$this->content = new Template('../templates/dog_admin.php');
			$this->title = 'Dog Administration';
		}
	}
?>