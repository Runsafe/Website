<?php
	class KW_MetaTable extends KW_Repository
	{
		public function prepare()
		{
			$this->exists = $this->db->prepare('SHOW TABLES LIKE \'_metatable\'');
			$this->load = $this->db->prepare('SELECT * FROM `_metatable`');
			$this->save = $this->db->prepare('
INSERT INTO `_metatable` (`table`,`version`) VALUES (:table,:version)
	ON DUPLICATE KEY UPDATE `version`=VALUES(`version`)');
		}

		public function getName()
		{
			return '_metatable';
		}

		public function getVersion()
		{
			return 1;
		}

		public function getQueries()
		{
			return array(
				1 => array('
CREATE TABLE `_metatable` (
	`table` VARCHAR(50),
	`version` INTEGER,
	PRIMARY KEY(`table`)
)'
				)
			);
		}
	}
?>
