<?php
	class HomePage extends Module
	{
		public function Build()
		{
			$this->content = new Template('../templates/home.php');
			$this->title = 'Home';

			$this->content->staff = StaffListHandler::getStaffList();
		}
	}
?>