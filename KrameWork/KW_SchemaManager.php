<?php
	class KW_SchemaManager
	{
		public function __construct(KW_DatabaseConnection $db)
		{
			$this->db = $db;
			$this->addTable(new KW_MetaTable());
		}

		/**
		 * Add a new table to be managed.
		 *
		 * @param ISchemaTable $spec A table specification.
		 */
		public function addTable($spec)
		{
			if(isset($this->tables[$spec->getName()]))
				throw new Exception('Duplicate table specification "'.$spec->getName().'"');
			$this->tables[$spec->getName()] = $spec;
			if($spec instanceof IRepository)
			{
				$spec->setDB($this->db);
				$spec->prepare();
			}
		}

		/**
		 * Fetch a table by name
		 *
		 * @param string $name Name of table to return the specification of.
		 */
		public function __get($name)
		{
			if(isset($this->tables[$name]))
				return $this->tables[$name];
		}

		/**
		 * Called to execute schema management once all tables have been defined.
		 */
		public function update()
		{
			$this->loadVersionTable();
			foreach($this->tables as $spec)
				if($spec->getVersion() > $this->getCurrentVersion($spec->getName()))
					$this->upgrade($spec);
		}

		/**
		 * Auto-update a table according to the specification.
		 *
		 * @param ISchemaTable $spec The table specification to act upon.
		 */
		public function upgrade($spec)
		{
			$save = $this->_metatable->save;
			$sql = $spec->getQueries();
			$from = $this->getCurrentVersion($spec->getName());
			$to = $spec->getVersion();
			error_log('Updating '.$spec->getName().' from '.$from.' to '.$to);
			$save->table = $spec->getName();
			for($i = $from + 1; $i <= $to; ++$i)
			{
				if(isset($sql[$i]))
					foreach($sql[$i] as $step)
						$this->db->execute($step);
				$save->version = $i;
				$save->execute();
				$this->version[$spec->getName()] = $to;
			}
		}

		/**
		 * Read the current table version.
		 *
		 * @param string $table Name of table whose version is wanted.
		 */
		public function getCurrentVersion($table)
		{
			if(!isset($this->version[$table]))
				return 0;
			return $this->version[$table];
		}

		/**
		 * Load current version information from the database.
		 */
		public function loadVersionTable()
		{
			if(!$this->_metatable->exists->execute()->getRows())
				return;
			foreach($this->_metatable->load->execute()->getRows() as $row)
				$this->version[$row->table] = $row->version;
		}

		private $version = array();
		private $tables;
		private $db;
	}
?>
