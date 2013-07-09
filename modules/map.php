<?php
	class MapPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('map');
			$this->title = 'Creative World Map';
		}
	}
?>
