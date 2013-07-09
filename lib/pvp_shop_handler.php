<?php
	class PVPShopHandler
	{
		public static function GetPoints()
		{
			$linked_char = AccountManager::GetLinkedCharacter();
			$query = DB::prepare('SELECT points FROM peeveepee_scores WHERE playerName = :char');
			$query->bindValue(':char', $linked_char);
			$query->execute();

			if ($score = $query->fetchObject())
				return $score->points;

			return 0;
		}

		public static function BuyItem($item_id)
		{
			$points = self::CanBuyItem($item_id);
			if ($points !== false)
			{
				$query = DB::prepare('INSERT INTO peeveepee_purchases (player, setID) VALUES(:player, :id)');
				$query->bindValue(':player', AccountManager::GetLinkedCharacter());
				$query->bindValue(':id', $item_id);
				$query->execute();

				$query = DB::prepare('UPDATE peeveepee_scores SET points = points - :cost WHERE playerName = :player');
				$query->bindValue(':cost', $points);
				$query->bindValue(':player', AccountManager::GetLinkedCharacter());
				$query->execute();
				return true;
			}
			return false;
		}

		private static function CanBuyItem($item_id)
		{
			$query = DB::prepare('SELECT cost FROM peeveepee_shop WHERE ID = :id');
			$query->bindValue(':id', $item_id);
			$query->execute();

			if ($result = $query->fetchObject())
				if (self::GetPoints() >= $result->cost)
					return $result->cost;

			return false;
		}
	}
?>