$.fn.setError = function(msg)
{
	return $(this).setStatus(msg, 'form-error');
};

$.fn.setPending = function(msg)
{
	return $(this).setStatus(msg, 'form-pending');
};

$.fn.setSuccess = function(msg)
{
	return $(this).setStatus(msg, 'form-success');
};

$.fn.setStatus = function(msg, styleClass)
{
	var t = $(this);
	if (t.html() != msg)
	{
		t.html(msg);
		t.removeClass('form-error form-success form-pending');
		t.addClass(styleClass);

		if (!t.is(":visible"))
			t.slideDown();
	}
	return t;
};

$(function()
{
	$(document).on('keypress', '.form-table input', function(data)
	{
		if (data.keyCode == 13)
			$(this).parents().find('.form-table').find('#submit').click();
	});
});