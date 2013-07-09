var dog_admin = {};

dog_admin.focusResponse = function()
{
	$(this).parent().children('input').css('border', '1px solid black');
};

dog_admin.blurResponse = function()
{
	$(this).parent().children('input').css('border', '1px solid #B8B8B8');
};


dog_admin.load = function()
{
	$(document).on('focus', '.dog-response input', dog_admin.focusResponse);
	$(document).on('blur', '.dog-response input', dog_admin.blurResponse);
};

$(document).ready(dog_admin.load);