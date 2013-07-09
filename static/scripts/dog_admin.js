var dog_admin = {
	focusResponse: function()
	{
		dog_admin.getResponseInputs(this).css('border', '1px solid black');
	},
	blurResponse: function()
	{
		dog_admin.getResponseInputs(this).css('border', '1px solid #B8B8B8');
		dog_admin.saveResponses();
	},
	editResponse: function()
	{
		dog_admin.edited.push($(this).parent());
		dog_admin.getResponseInputs(this).css('background-color', '#DBA2A2');
	},
	getResponseInputs: function(obj)
	{
		return $(obj).parent().children('input');
	},
	saveResponses: function()
	{
		for (node_pointer in dog_admin.edited)
		{
			var node = $(dog_admin.edited[node_pointer]);

			PacketHandler.send(Packet.EditDogResponse, {
				id: node.attr('ID'),
				pattern: node.children('.pattern').val(),
				reply: node.children('.reply').val()
			});
		}
		dog_admin.edited = [];
	},
	handleResponseSave: function(data)
	{
		if (data.success != undefined)
		{
			var parent = $('#' + data.success);

			if (parent.length > 1)
			{
				parent.children('input').css('background-color', 'white');
			}
			else
			{
				var newField = $('#new');
				newField.children('input').css('background-color', 'white');
				newField.attr('ID', data.success);
				dog_admin.container.append('<div class="dog-response" id="new"><input type="text" class="pattern"/><input type="text" class="reply"/></div>');
			}

		}
	},
	load: function()
	{
		$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
		$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
		$(document).on('keydown', '.dog-response input', dog_admin.editResponse);

		PacketHandler.hook(Packet.EditDogResponse, dog_admin.handleResponseSave);
		dog_admin.container = $('#dog-responses');
	},
	edited: []
};

$(document).ready(dog_admin.load);