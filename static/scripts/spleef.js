var Spleef = {};

Spleef.checkScore = function()
{
	var playerName = Spleef.playerNameField.val();
	if (playerName.length > 0)
		PacketHandler.send(Packet.SpleefScore, { playerName: playerName });
};

Spleef.handlerScoreReturn = function(data)
{
	if (data.score != undefined)
		Spleef.outputField.html('<img src="http://minecraft.runsafe.no/map/tiles/faces/16x16/{0}.png"/>{0} has {1} wins in spleef!'.format(data.playerName, data.score));
};

$(document).ready(function()
{
	PacketHandler.hook(Packet.SpleefScore, Spleef.handlerScoreReturn);
	Spleef.playerNameField = $('#player');

	Spleef.playerNameField.on('keypress', function(data)
	{
		if (data.keyCode == 13)
			Spleef.checkScore();
	});

	Spleef.outputField = $('#spleef-lookup');
});