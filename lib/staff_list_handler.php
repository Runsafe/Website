<?php
	class StaffListHandler
	{
		public static function getStaffList()
		{
			$staff = Array();

			$query = DB::prepare('
				SELECT parent, (SELECT name FROM player_db WHERE LOWER(name) = LOWER(child)) AS playerName FROM permissions_inheritance WHERE (parent = "Superuser" OR parent = "Moderator" OR parent = "Manager" OR parent = "Admin") AND type = 1'
			);
			$query->execute();

			$data = Array();
			while ($result = $query->fetchObject())
				$data[$result->playerName] = $result->parent;

			foreach (StaffListHandler::$priority as $rank)
			{
				foreach ($data as $player => $playerRank)
				{
					if (strtolower($playerRank) == strtolower($rank))
					{
						$staff[$player] = $rank;
						unset($data[$player]);
					}
				}
			}

			return $staff;
		}

		private static $priority = Array(
			'Admin', 'Manager', 'Moderator', 'Superuser'
		);
	}
?>