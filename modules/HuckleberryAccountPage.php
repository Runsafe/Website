<?php
	class HuckleberryAccountPage extends HBSiteModule
	{
		public function __construct()
		{
			$template = new KW_Template('../templates/huckleberry_account.php');
			parent::__construct($template);

			$this->addScript('hb.js');

			$this->handleRedeem($template);
			$template->upload_status = $this->handleUpload();

			//$template->user = Accounts::getAccountData();
			$ign = Huckleberry::getIGN();
			if ($ign == null)
			{
				$template->status = false;
				$template->status_text = "Not invited.";
			}
			else
			{
				$template->status = true;
				$template->status_text = "Active: " . $ign . "!";
			}
		}

		private function handleUpload()
		{
			if (isset($_FILES["skin-upload"]) && Accounts::isLoggedIn())
				return move_uploaded_file($_FILES["skin-upload"]["tmp_name"], "skins/" . Huckleberry::getIGN() . ".png");

			return false;
		}

		private function handleRedeem($template)
		{
			$user = REST::Post('redeem-user');
			$code = REST::Post('redeem-code');

			$template->redeem_fail = true;
			if ($user != null && $code != null)
			{
				if (strlen($user) < 17 && Huckleberry::redeemCodeIsValid($code))
				{
					Huckleberry::redeemCode($code, $user);
					$template->redeem_fail = null;
				}
			}
		}
	}
?>