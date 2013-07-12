<h1>About Our Server</h1>
	<p>The Shadow of the Phoenix Minecraft server was originally setup for a small group of guild members to play Minecraft together on. As more and more of the members friends started to join it developed into a larger community. Slowly over time it has grown into a public server with a wide community driving it.</p>
<h2>Forum</h2>
	<p>We have a shiny new forum set up for your use here: <a href="http://shadowphoenixguild.co.uk/forum/list.php?4">http://shadowphoenixguild.co.uk/forum/list.php?4</a>
<h2>Gameplay</h2>
	<p><b>Survival</b> - This world is for anyone who loves one of the core aspects of Minecraft: adventuring. It comes complete with monsters, dungeons and all that good stuff aswell as world-PvP and no restrictions on what you can destroy! To survive in this world against not only the perils of Minecraft but the players aswell, you'll need to be smart about your choice of housing location!</p>
	<p><b>Creative</b> - This is our primary world where most of our players spend their time. Here you are able to build freely using creative mode (flying and infinite items). To avoid griefing and allow a flexible working area for your creations the entire world if split up into plots using our own custom generation system. Players are welcome to as many plots as they desire and they can even be joined to make larger plots. You can also work together with your friends in a single plot!</p>
	<p><b>Spleef</b> - This world has recently been merged into a plot within creative world but still functions as it's own world there. Our spleef areans functions completely automatically and allows players to play spleef with ease, you don't even need to be a builder to play!</p>
<h2>Staff</h2>
	<div id="staff-list">
		<div id="staff-left">
			<?php
				$currentStaff = 0;
				foreach ($this->staff as $staffName => $staffCaption)
				{
					echo sprintf(
						'<p style="background-image: url(\'http://minecraft.runsafe.no/map/tiles/faces/32x32/%1$s.png\');" class="staff-listing"><b>%1$s</b><br/>%2$s</p>',
						$staffName,
						$staffCaption
					);

					if ($currentStaff == floor(count($this->staff) / 2))
						echo '</div><div id="staff-right">';

					$currentStaff++;
				}
			?>
		</div>
		<div id="staff-list-padder"></div>
	</div>
