<h1>PvP Rankings (Ordered by rating)</h1>
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
		?><p>Sorry, the PvP rankings could not be loaded at this time.</p><?php
	}
?>
<div id="spleef-leaderboard-padder"></div>