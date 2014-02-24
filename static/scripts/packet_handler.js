var Packet = {
	Login: 1
};

var PacketHandler = {
	currentPacket: 1,
	callbackData: {},
	events: {},

	hook: function(packet_id, event)
	{
		if (PacketHandler.events.packet_id === undefined)
			PacketHandler.events[packet_id] = [];

		PacketHandler.events[packet_id].push(event);
	},

	run: function(packet_id, data)
	{
		if (packet_id in this.events)
		{
			var events = this.events[packet_id];

			if (data.uid != undefined)
			{
				for (var event_pointer in events)
					events[event_pointer](data, this.callbackData[data.uid]);

				delete this.callbackData[data.uid];
			}
			else
			{
				for (var event_pointer in events)
					events[event_pointer](data);
			}
		}
	},

	send: function(packet_id, parameters)
	{
		PacketHandler.fire(packet_id, parameters, false, arguments);
	},

	post: function(packet_id, parameters)
	{
		PacketHandler.fire(packet_id, parameters, true, arguments);
	},

	fire: function(packet_id, parameters, post, args)
	{
		var params = parameters||{};
		params.pid = packet_id;
		params.uid = this.currentPacket;

		var func = (post ? $.post : $.get);

		if (args.length > 2)
			this.callbackData[params.uid] = args[2];

		func('https://runsafe.no/packet_handler.php', params, function(data)
		{
			PacketHandler.run(packet_id, $.parseJSON(data));
		});
		this.currentPacket++;
	}
};

function packetContext(obj, func)
{
	return function()
	{
		if (arguments[1] != undefined)
			obj[func](arguments[0], arguments[1]);
		else if (arguments[0] != undefined)
			obj[func](arguments[0]);
		else
			obj[func]();
	};
}