<?php
	require_once('../lib/interfaces/IModule.php');
	class Module implements IModule
	{
		public function __construct()
		{
			$this->Build();
		}

		public function __toString()
		{
			$site = new Template('site');

			if ($this->title !== null)
				$site->title = $this->title;

			$site->content = $this->content;

			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->HandlePost();

			return $site->__toString();
		}

		public function HandlePost() {}
		public function Build() {}

		protected $title;
		protected $content;
	}
?>
