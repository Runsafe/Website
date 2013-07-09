var dog_admin = {
	focusResponse: function()
	{
		dog_admin.getResponseInputs(this).css('border', '1px solid black');
	},
	blurResponse: function()
	{
		dog_admin.getResponseInputs(this).css('border', '1px solid #B8B8B8');
	},
	editResponse: function()
	{
		dog_admin.getResponseInputs(this).css('background-color', '#DBA2A2');
	},
	getResponseInputs: function()
	{
		return $(obj).parent().children('input');
	},
	load: function()
	{
		$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
		$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
		$(document).on('keydown', '.dog-response input', dog_admin.editResponse);
	}
};

$(document).ready(dog_admin.load);