<?php
	class GitHubRepoSearcher
	{
		public function __construct($repository, $extensions = Array(), $search)
		{
			$this->url = sprintf('https://api.github.com/repos/runsafe/%s/contents', $repository);
			$this->extensions = $extensions;
			$this->search = $search;
			$this->matches = Array();
		}

		private function crawlTree($path = '')
		{
			$data = $this->getJSON($this->url . $path);
			foreach ($data as $node)
			{
				if ($node->type == 'file')
				{
					$parts = explode('.', $node->name, 2);
					$extension = (count($parts) ? $parts[1] : '');

					if (in_array($extension, $this->extensions))
						$this->searchFile($this->extendPath($path, $node->name));
				}
				else if ($node->type == 'dir')
				{
					$this->crawlTree($this->extendPath($path, $node->name));
				}
			}
		}

		private function searchFile($file_path)
		{
			$data = $this->getJSON($this->url . $file_path);
			if ($data->encoding == 'base64')
			{
				$decoded = base64_decode($data->content);
				if (strstr($decoded, $this->search) !== false)
					$this->matches[$file_path] = $decoded;
			}
		}

		private function getJSON($path)
		{
			return json_decode(file_get_contents($path . '?access_token=291c4fdddaf0caa45111242bbcfff7aba5eacd94'));
		}

		private function extendPath($path, $attach)
		{
			return sprintf('%s/%s', $path, $attach);
		}

		public function getMatches()
		{
			$this->crawlTree();
			return $this->matches;
		}

		private $url;
		private $extensions;
		private $search;
		private $matches;
	}
?>