$(function()
{
	var manager = {
		load: function()
		{
			this.emailField = $('#email');
			this.status = $('#recover-status');

			$(document).on('click', '#submit', context(this, 'attemptRecover'));

			PacketHandler.hook(Packet.RecoverAccount, packetContext(this, 'handleResponse'));
		},

		attemptRecover: function()
		{
			var email = this.emailField.val().trim();

			if (email.length > 0)
			{
				this.status.setPending('Please wait...');
				PacketHandler.send(Packet.RecoverAccount, {
					email: email
				})
			}
			else
			{
				this.status.setError('Please enter your e-mail address.');
			}
		},

		handleResponse: function(data)
		{
			if (data.success != undefined)
			{
				switch (data.success)
				{
					case 0:
						this.status.setError('No account with that e-mail address exists.');
					break;

					case 1:
						$('.form-table').fadeOut();
						this.status.setSuccess('Success! Check your e-mail inbox for instructions on resetting your password.');
					break;
				}
			}
			else
			{
				this.status.setError('Unable to recover account, internal server error!');
			}
		}
	};
	manager.load();
});