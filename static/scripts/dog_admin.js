$(function(){
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
			var id = $(this).parent().attr('id');
			if ($.inArray(id, dog_admin.edited) == -1)
				dog_admin.edited.push(id);

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
				var id = dog_admin.edited[node_pointer];
				var node = $('#' + id);

				PacketHandler.send(Packet.EditDogResponse, {
					id: id,
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

				if (parent.length)
				{
					parent.children('input').css('background-color', 'white');
				}
				else
				{
					var newField = $('#new');
					newField.children('input').css('background-color', 'white');
					newField.attr('id', data.success);
					dog_admin.container.append(dog_admin.newField.clone());
				}

			}
		},
		deleteResponse: function()
		{
			var parent = $(this).parent();
			PacketHandler.send(Packet.DeleteDogResponse, {id: parent.attr('ID')});
			parent.remove();
		},
		load: function()
		{
			$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
			$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
			$(document).on('keydown', '.dog-response input', dog_admin.editResponse);
			$(document).on('click', '.dog-response .delete', dog_admin.deleteResponse);

			PacketHandler.hook(Packet.EditDogResponse, dog_admin.handleResponseSave);
			dog_admin.container = $('#dog-responses');
			dog_admin.newField = $('<div class="dog-response" id="new"><input type="text" class="pattern"/><input type="text" class="reply"/></div>');
		},
		edited: []
	};

	dog_admin.load();
});
