<html>
	<head>
		<title><?php echo $title; ?> :: Runsafe</title>
		<link rel="stylesheet" type="text/css" href="https://static.runsafe.no/css/global.css"/>
		<link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
		<?php
			foreach ($styles as $style)
				echo '<link rel="stylesheet" type="text/css" href="https://static.runsafe.no/css/' . $style . '"/>';
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://static.runsafe.no/scripts/global.js"></script>
		<script src="https://static.runsafe.no/scripts/packet_handler.js"></script>
		<?php
			foreach ($scripts as $script)
				echo '<script src="https://static.runsafe.no/scripts/' . $script . '"></script>';
		?>
	</head>
	<body>
		<div id="backdrop">
			<div id="header">
				<div id="header-content">
					<img src="https://static.runsafe.no/images/runsafe_logo.png" id="logo" alt="Runsafe - An Entire Internets"/>
					<ul id="navigation">
						<?php echo $this->navigation; ?>
					</ul>
					<div id="nav-account">
						<a href="https://runsafe.no/login.php"><?php echo Accounts::isLoggedIn() ? 'Logout' : 'Log-in'; ?></a>
					</div>
				</div>
				<div class="divider"></div>
			</div>
			<div id="page">
				<div id="content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="divider"></div>
			<div id="footer-content">&copy; Runsafe <?php echo date('Y'); ?></div>
		</div>
	</body>
</html>