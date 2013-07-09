var dog_admin = {};

dog_admin.focusResponse = function()
{
	dog_admin.getResponseInputs(this).css('border', '1px solid black');
};

dog_admin.blurResponse = function()
{
	dog_admin.getResponseInputs(this).css('border', '1px solid #B8B8B8');
};

dog_admin.editResponse = function()
{
	dog_admin.getResponseInputs(this).css('background-color', '#DBA2A2');
};

dog_admin.getResponseInputs = function(obj)
{
	return $(obj).parent().children('input');
};

dog_admin.load = function()
{
	$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
	$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
	$(document).on('keydown', '.dog-response input', dog_admin.editResponse);
};

$(document).ready(dog_admin.load);