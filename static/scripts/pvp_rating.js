var Rating = {};

$(function(){
	Rating = {
		load: function()
		{
			PacketHandler.hook(Packet.PvPRating, PvPRating.handlerScoreReturn);

			Rating.playerNameField.on('keypress', function(data)
			{
				if (data.keyCode == 13)
					Rating.checkScore();
			});
		},

		checkScore: function()
		{
			var playerName = Rating.playerNameField.val();
			if (playerName.length > 0)
				PacketHandler.send(Packet.PvPRating, {
					playerName: playerName
				});
		},

		handlerScoreReturn: function(data)
		{
			if (data.rating != undefined)
				Rating.outputField.html(
					'<img src="http://minecraft.runsafe.no/map/tiles/faces/16x16/{0}.png"/>{0} has a rating of {1}'.format(
						data.playerName,
						data.rating
					)
				);
		},

		playerNameField: $('#player'),
		outputField: $('#pvprating-lookup')
	};

	Rating.load();
});
