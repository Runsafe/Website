<script type="text/javascript" src="http://static.minecraft.runsafe.no/scripts/account.js"></script>
<h1>Account</h1>
<p>Your Runsafe Account (used here and on the forums) needs to be linked to your Minecraft character in order to use some online services such as the PvP shop. To get the token to link your account type "<b>/account token</b>" into the server chat.</p>
<p><b>Linked Character:</b> <span id="linked-character"><?php echo ($this->linkedCharacter === null ? 'You have no linked character' : $this->linkedCharacter); ?></span></p>
<h1>Change your linked character</h1>
<div id="login-notice">Please try again later.</div>
<table id="login-table">
	<tr>
		<th>Minecraft Character:</th>
		<td><input type="text" id="character-field" class="form-input-text"/></td>
	</tr>
	<tr>
		<th>Token:</th>
		<td><input type="text" id="token-field" class="form-input-text"></td>
	</tr>
	<tr>
		<th></th>
		<td><input type="button" id="link-button" value="Link Character" class="form-input-button"/></td>
	</tr>
</table>