<?php
	class HomePage extends Module
	{
		public function Build()
		{
			$this->content = new Template('home');
			$this->title = 'Home';

			$this->content->staff = StaffListHandler::getStaffList();
		}
	}
?>
