<?php
	class Huckleberry
	{
		public static function getIGN()
		{
			$query = DB::Web()->prepare('SELECT hb_user FROM accounts WHERE ID = :id');
			$query->setValue(':id', Accounts::getAccountData()->getAccountId());

			$result = $query->getFirstRow();

			if ($result != null)
				return $result->hb_user;

			return null;
		}

		public static function redeemCodeIsValid($code)
		{
			$query = DB::Web()->prepare('SELECT COUNT(*) AS row_count FROM hb_codes WHERE code = :code');
			$query->setValue(':code', $code);

			$result = $query->getFirstRow();
			return $result->row_count > 0;
		}

		public static function redeemCode($code, $user)
		{
			// Delete the code.
			$query = DB::Web()->prepare('DELETE FROM hb_codes WHERE code = :code');
			$query->setValue(':code', $code);
			$query->execute();

			$query = DB::Web()->prepare('UPDATE accounts SET hb_user = :user WHERE ID = :id');
			$query->setValue(':user', $user);
			$query->setValue(':id', Accounts::getAccountData()->getAccountId());
			$query->execute();
		}

		public static function generateRedeemCode()
		{
			$out = "";

			while (strlen($out) == 0 || self::redeemCodeIsValid($out))
				$out = strtoupper(substr(str_shuffle(MD5(microtime())), 0, 30));

			$query = DB::Web()->prepare('INSERT INTO hb_codes (code) VALUES(:code)');
			$query->setValue(':code', $out);
			$query->execute();

			return $out;
		}
	}
?>