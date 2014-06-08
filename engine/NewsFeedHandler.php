<?php
	class NewsFeedHandler
	{
		public static function getNewsFeed()
		{
			$cached = Cache::get('news_feed');
			if ($cached != null)
				return $cached;

			$xml = simplexml_load_file('https://wiki.runsafe.no/api.php?action=query&format=xml&titles=Runsafe_News&prop=revisions&rvprop=content');
			$process = self::processFeed($xml->query->pages->page->revisions->rev);

			Cache::set('news_feed', $process, time() + 1800);
			return $process;
		}

		private static function processFeed($feed)
		{
			foreach (self::$replacements as $pattern => $replace)
				$feed = preg_replace($pattern, $replace, $feed);

			return $feed;
		}

		private static $replacements = Array(
			'/[\']{3}(.+?)[\']{3}/i' => '<b>${1}</b>',
			'/[\']{2}(.+?)[\']{2}/i' => '<i>${1}</i>',
			'/\[\[ Image:(.+?)\]\]/i' => '',
			'/\[\[(.+?)\]\]/i' => '<a href="https://wiki.runsafe.no/index.php?title=${1}">${1}</a>',
			'/\[(.+?)\s(.+?)\]/i' => '<a href="${1}">${2}</a>',
			'/===(.+)===/i' => '<h2>${1}</h2>',
			'/==(.+)==/i' => '<h1>${1}</h1>',
			'/\*\*{1}(.*)/i' => '<p class="indent">${1}</p>',
			'/\*{1}(.*)/i' => '<p>${1}</p>'
		);
	}
?>