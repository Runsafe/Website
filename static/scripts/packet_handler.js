var Packet = {
	SpleefScore: 1,
	Login: 2,
	LinkCharacter: 3,
	PVPGetPoints: 4,
	PVPBuyItem: 5,
	PVPSignUp: 6,
	EditDogResponse: 7,
	DeleteDogResponse: 8
};

var PacketHandler = {
	events: {},

	hook: function(packet_id, event)
	{
		if (PacketHandler.events.packet_id === undefined)
			PacketHandler.events[packet_id] = [];

		PacketHandler.events[packet_id].push(event);
	},

	run: function(packet_id, data)
	{
		if (packet_id in PacketHandler.events)
		{
			var events = PacketHandler.events[packet_id];
			for (var event_pointer in events)
				events[event_pointer](data);
		}
	},

	send: function(packet_id, parameters)
	{
		var params = parameters||{};
		params.pid = packet_id;

		$.getJSON('packet_handler.php', params, function(data)
		{
			PacketHandler.run(packet_id, data);
		});
	}
};
