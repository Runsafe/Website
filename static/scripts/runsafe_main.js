$(function()
{
	var text = $('#main-logo-text'),
		images = $('#main-logos').find('img');
	$(document).on('mouseover', '#main-logos img', function()
	{
		var tile = $(this),
			alt = tile.attr('alt');

		text.html(alt);

		images.stop(true);
		tile.fadeTo('fast', 1);
		images.each(function()
		{
			otherTile = $(this);
			if (alt !== otherTile.attr('alt'))
				otherTile.fadeTo('fast', 0.33);
		});
	}).on('mouseout', '#main-logos img', function()
	{
		text.html('');
	});

	$(document).on('mouseleave', '#main-logos', function()
	{
		images.stop(true);
		images.fadeTo('fast', 1);
	})
});