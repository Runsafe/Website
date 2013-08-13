<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title><?php echo $this->title; ?></title>
		<link rel="stylesheet" type="text/css" href="http://static.minecraft.runsafe.no/css/default.css"/>
		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="http://static.minecraft.runsafe.no/scripts/core.js"></script>
		<script language="javascript" type="text/javascript" src="http://static.minecraft.runsafe.no/scripts/packet_handler.js"></script>
	</head>
	<body>
		<div id="selected-item"></div>
		<div id="container">
			<div id="header">
				<div id="login-corner">
					<?php
						if (Authenticator::IsLoggedIn())
							echo sprintf('You are logged in as %s. <a href="logout.php">[Log Out]</a>', Authenticator::GetLoggedInUsername());
						else
							echo 'You are not logged in. <a href="login.php">[Log In]</a>';
					?>
				</div>
			</div>
			<div id="navigation">
				<ul>
					<a href="index.php"><li>About Our Server</li></a>
					<a href="spleef.php"><li>Spleef Leaderboard</li></a>
					<a href="pvp_leaderboard.php"><li>PvP Rankings</li></a>
					<a href="pvp_shop.php"><li>PvP Shop</li></a>
					<a href="http://shadowphoenixguild.co.uk/forum/"><li>Forum</li></a>
					<a href="map.php"><li>Creative Map</li></a>
					<a href="http://wiki.runsafe.no/index.php/Main_Page"><li>Wiki</li></a>
					<a href="account.php"><li>Account</li></a>
				</ul>
			</div>
			<div id="content">
			<?php echo $this->content; ?>
			</div>
			<div id="footer">
				<div id="copyright"><a href="http://www.minecraft.net/">Minecraft</a> &copy; <a href="http://www.mojang.com/">Mojang AB</a></div>
				<div id="credits">Website by <a href="http://www.kruithne.net/">Kruithne</a>, Hosting by <a href="http://runsafe.no/">Runsafe</a></div>
			</div>
		</div>
	</body>
</html>