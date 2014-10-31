$(function()
{
	var hb = {
		load: function()
		{
			this.fileField = $('#skin-upload');
			this.fileBtn = $('#skin-btn');
			this.uploading = false;

			$(document).on('click', '#skin-btn', function()
			{
				if (!hb.uploading)
					hb.fileField.click();
			});

			$(document).on('change', '#skin-upload', function()
			{
				hb.fileBtn.val('Uploading, hold onto your hat!');
				$('#skin-form').submit();
			});
		}
	};
	hb.load();
});