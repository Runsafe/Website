<?php
	abstract class KW_Module implements IModule
	{
		/**
		 * Compiles the module and its sub-modules and returns the output.
		 *
		 * @return string The output from the compiled module.
		 */
		public function __toString()
		{
			$data = new StringBuilder();

			try
			{
				foreach ($this->sub_modules as $sub_module)
					$data->append($sub_module->renderModule());

				$data->append($this->renderModule());
			}
			catch(Exception $e)
			{
				error_log($e->getMessage());
				return '';
			}

			return $data->__toString();
		}

		/**
		 * Adds a sub-module to the module.
		 *
		 * @param IModule $sub_module A sub-module to add.
		 */
		public function addSubModule($sub_module)
		{
			if ($sub_module instanceof IModule)
				$this->sub_modules[] = $sub_module;
		}

		/**
		 * @var IModule[] Stores sub-modules linked to this module.
		 */
		protected $sub_modules = Array();
	}
?>
