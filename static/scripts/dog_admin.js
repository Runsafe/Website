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
			dog_admin.edited.push(this);
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
				var node = dog_admin.edited[node_pointer];
				var inputs = dog_admin.getResponseInputs(node);
				inputs.css('background-color', 'white');
			}
			dog_admin.edited = [];
		},
		load: function()
		{
			$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
			$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
			$(document).on('keydown', '.dog-response input', dog_admin.editResponse);
		},
		edited: []
	};

	dog_admin.load();
});
