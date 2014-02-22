$(function()
{
	var text = $('#main-logo-text');
	$(document).on('mouseover', '#main-logos img', function()
	{
		text.html($(this).attr('alt'));
	}).on('mouseout', '#main-logos img', function()
	{
		text.html('');
	});
});