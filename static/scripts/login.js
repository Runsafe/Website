$(function()
{
	var manager = {
		load: function()
		{
			this.emailField = $('#email');
			this.passField = $('#pass');
			this.regEmailField = $('#reg-email');
			this.regPassField = $('#reg-pass');
			this.status = $('#login-status');
			this.registerStatus = $('#register-status');

			$(document).on('click', '#submit', context(this, 'attemptLogin'));
			$(document).on('click', '#reg-submit', context(this, 'attemptRegister'));
			PacketHandler.hook(Packet.Login, packetContext(this, 'handleResponse'));
			PacketHandler.hook(Packet.RegisterAccount, packetContext(this, 'handleRegisterResponse'));

			if (this.status.html().length > 0)
				this.status.slideDown();
		},

		attemptRegister: function()
		{
			var email = this.regEmailField.val().trim(),
				pass = this.regPassField.val().trim();

			if (email.length == 0)
			{
				this.registerStatus.setError('Please enter your e-mail address.');
				return;
			}

			if (pass.length == 0)
			{
				this.registerStatus.setError('Please enter a password.');
				return;
			}

			this.registerStatus.setPending('Logging in, please wait...');
			PacketHandler.send(Packet.RegisterAccount, {
				email: email,
				pass: pass
			});
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

		handleRegisterResponse: function(data)
		{
			if (data.success != undefined)
			{
				if (data.success == 1)
				{
					this.registerStatus.setSuccess('Account registered! Use the log-in form above to log-in!');
				}
				else
				{
					if (data.error != undefined)
					{
						this.registerStatus.setError(data.error);
					}
					else
					{
						this.registerStatus.setError('There was an error handling the error.. crap.');
					}
				}
			}
			else
			{
				this.registerStatus.setError('Unable to register, some kind of derp in the matrix!');
			}
		},

		handleResponse: function(data)
		{
			if (data.success != undefined)
			{
				if (data.success == 1)
				{
					this.status.setSuccess('Successfully logged in! Redirecting..');
					if (history.length > 0)
						history.go(-1);
					else
						window.location =  'https://runsafe.no/';
				}
				else
				{
					this.status.setError('Invalid e-mail/password.');
				}
			}
			else
			{
				this.status.setError('Unable to log-in, internal server error! Oops.');
			}
		}
	};
	manager.load();
});