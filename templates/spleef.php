<script type="text/javascript" src="http://static.minecraft.runsafe.no/scripts/spleef.js"></script>
<?php
	if ($this->character !== null)
	{
		?>
		<script>
			PacketHandler.send(Packet.SpleefScore, { playerName: '<?php echo $this->character; ?>' });
		</script>
		<?php
	}
?>
<h1>Spleef Leaderboard</h1>
<?php
	if ($this->scoreboard !== null)
	{
		?>
		<table id="spleef-leaderboard-top">
			<tr>
			<?php
				$leaders = array_slice($this->scoreboard, 0, 5);
				$place = 1;

				foreach ($leaders as $playerName => $playerScore)
				{
					echo sprintf(
						'<td style="background-image: url(\'http://minecraft.runsafe.no/map/tiles/faces/32x32/%1$s.png\');">%2$s. %1$s (%3$s)</td>',
						$playerName, $place, $playerScore
					);
					$place++;
				}
			?>
			</tr>
		</table>
		<div id="spleef-leaderboard-small">
			<div id="spleef-leaderboard-small-left">
			<?php
				$this->scoreboard = array_slice($this->scoreboard, 5);
				foreach ($this->scoreboard as $playerName => $playerScore)
				{
					echo sprintf(
						'<p><img src="http://minecraft.runsafe.no/map/tiles/faces/16x16/%1$s.png"/>%2$s. %1$s (%3$s)</p>',
						$playerName,
						$place,
						$playerScore
					);

					if ($place == 18)
						echo '</div><div id="spleef-leaderboard-small-right">';

					$place++;
				}
			?>
			</div>
		</div>
		<?php
	}
	else
	{
		?><p>Sorry, the leader board for spleef could not be loaded at this time.</p><?php
	}
?>
<div id="spleef-leaderboard-padder"></div>
<p>
	<label for="player">Lookup a player's score using their name: </label>
	<input type="text" id="player" class="input-text"/><input onclick="Spleef.checkScore();" type="button" id="lookup" value="Lookup" class="input-button"/>
</p>
<p id="spleef-lookup"></p>