$(function(){
	var Spleef = {
		load: function()
		{
			PacketHandler.hook(Packet.SpleefScore, Spleef.handlerScoreReturn);

			Spleef.playerNameField.on('keypress', function(data)
			{
				if (data.keyCode == 13)
					Spleef.checkScore();
			});
			alert("Test");
		},

		checkScore: function()
		{
			var playerName = Spleef.playerNameField.val();
			if (playerName.length > 0)
				PacketHandler.send(Packet.SpleefScore, { playerName: playerName });
		},

		handlerScoreReturn: function(data)
		{
			if (data.score != undefined)
				Spleef.outputField.html('<img src="http://minecraft.runsafe.no/map/tiles/faces/16x16/{0}.png"/>{0} has {1} wins in spleef!'.format(data.playerName, data.score));
		},

		playerNameField: $('#player'),
		outputField: $('#spleef-lookup')
	};

	Spleef.load();
});
