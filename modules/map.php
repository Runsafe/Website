<?php
	class MapPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('../templates/map.php');
			$this->title = 'Creative World Map';
		}
	}
?>