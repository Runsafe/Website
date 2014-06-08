<?php
  abstract class KW_Repository extends KW_DataContainer implements IRepository
	{
		public function setDB($db)
		{
			$this->db = $db;
		}

		protected $db;
	}
?>
