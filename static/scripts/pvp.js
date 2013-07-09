$(function(){
	var pvp_event =
	{
		load: function()
		{
			pvp_event.status = $('#signup');
			PacketHandler.hook(Packet.PVPSignUp, pvp_event.handleResponse);
			PacketHandler.send(Packet.PVPSignUp);
			$(document).on('click', '#do', pvp_event.signup);
		},
		handleResponse: function(data)
		{
			if (data.status == true)
				pvp_event.status.html('You are signed up for the PvP event!');
			else
				pvp_event.status.html('You are not signed up for the PvP event yet. <a id="do">Click here to sign-up.</a>')
		},
		signup: function()
		{
			PacketHandler.send(Packet.PVPSignUp, {signup: 1})
		}
	};

	pvp_event.load();
});
