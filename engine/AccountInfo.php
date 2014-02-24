<?php
	class AccountInfo extends DataObject
	{
		public function __construct($account_id)
		{
			$this->id = $account_id;
		}

		public function getAccountId()
		{
			return $this->id;
		}
	}
?>