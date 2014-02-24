<?php
	class ContentParser
	{
		public static function parseBB($bb)
		{
			foreach (self::$patterns as $pattern => $replacement)
				$bb = preg_replace(sprintf('/%s/i', $pattern), $replacement, $bb);

			return sprintf('<p>%s</p>', $bb);
		}

		private static $patterns = Array(
			'\n\n' => '</p><p>',
			'\n' => '<br/>',
			'\[(c|centre|center)\]' => '<span style="text-align: center">',
			'\[\/(c|centre|center)\]' => '</span>',

			'\[(|\/)(h|header)\]' => '<${1}h3>',
			'\[(|\/)(b|u|i)\]' => '<${1}${2}>',
			'\[(color|colour)=([0-9A-Z]{6})\]' => '<span style="color: #${2}">',
			'\[\/(color|colour)]' => '</span>'
		);
	}
?>