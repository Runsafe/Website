<?php
	interface IModule
	{
		/**
		 * Called after the module is built.
		 *
		 * @return string The output of the module.
		 */
		public function renderModule();
	}
?>