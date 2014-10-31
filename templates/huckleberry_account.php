<div id="hb-status">
	<table>
		<tr>
			<th>
				<img src="http://static.runsafe.no/images/hb_status_<?php echo $this->status ? "happy" : "upset"; ?>.png"/>
			</th>
			<td>
				<h2>Your Account Status:</h2>
				<p style="color: <?php echo $this->status ? "#006E2E" : "#B29026"; ?>"><?php echo $this->status_text; ?></p>
			</td>
		</tr>
	</table>
</div>
<?php
	if ($this->status)
	{
?>
		<h1>Change Your Skin!</h1>
		<?php if ($this->upload_status) echo '<p style="color: #006E2E">Skin uploaded, whey!</p>'; ?>
		<p>Huckleberry uses a different skin server from Minecraft, you can upload a skin easily by hitting the big button below and selecting one from your computer!</p>
		<form action="account.php" method="post" enctype="multipart/form-data" id="skin-form">
			<input type="file" name="skin-upload" id="skin-upload">
			<input class="form-button" type="button" id="skin-btn" value="Select an image to upload"/>
		</form>
<?php
	}
	else
	{
?>
		<h1>Redeem Invite Code</h1>
		<?php if ($this->redeem_fail != null) echo '<p style="color: #B29026">Sorry, that code is invalid!</p>'; ?>
		<p>If you have an invite code, you can redeem it here to gain access to Huckleberry!</p>
		<form action="account.php" method="post" id="redeem-form">
			<table>
				<tr>
					<th>Desired IGN:</th>
					<td><input type="text" class="form-field" name="redeem-user"/></td>
				</tr>
				<tr>
					<th>Invite Code:</th>
					<td><input type="text" class="form-field" name="redeem-code"/></td>
				</tr>
			</table>
			<input class="form-button" type="submit" id="redeem-btn" value="Create Account"/>
		</form>
<?php
	}
?>