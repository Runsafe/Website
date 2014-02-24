$(function()
{
	var manager = {
		load: function()
		{
			this.emailField = $('#email');
			this.passField = $('#password');

			$(document).on('click', '#submit', function()
			{
				context(this, 'attemptLogin');
			});
		},

		attemptLogin: function()
		{
			var email = this.emailField.val().trim(),
				pass = this.passField.val().trim();

			if (email.length == 0)
				this.showError('Please enter your e-mail address');

			if (pass.length == 0)
				this.showError('Please enter your password');
		},

		showError: function(error)
		{

		}
	};
	manager.load();
});