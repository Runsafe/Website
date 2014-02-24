$(function()
{
	var manager = {
		load: function()
		{
			this.emailField = $('#email');
			this.passField = $('#pass');
			this.status = $('#login-status');

			$(document).on('click', '#submit', context(this, 'attemptLogin'));
			PacketHandler.hook(Packet.Login, packetContext(this, 'handleResponse'));

			if (this.status.html().length > 0)
				this.status.slideDown();
		},

		attemptLogin: function()
		{
			var email = this.emailField.val().trim(),
				pass = this.passField.val().trim();

			if (email.length == 0)
			{
				this.status.setError('Please enter your e-mail address.');
				return;
			}

			if (pass.length == 0)
			{
				this.status.setError('Please enter your password.');
				return;
			}

			this.status.setPending('Logging in, please wait...');
			PacketHandler.send(Packet.Login, {
				email: email,
				pass: pass
			});
		},

		handleResponse: function(data)
		{
			if (data.success != undefined)
			{
				if (data.success == 1)
					this.status.setSuccess('Successfully logged in! Redirecting..');
				else
					this.status.setError('Invalid e-mail/password.');
			}
			else
			{
				this.status.setError('Unable to log-in, internal server error! Oops.');
			}
		}
	};
	manager.load();
});