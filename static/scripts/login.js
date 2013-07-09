$(function(){ 
	var LoginHandler =
	{
		login: function()
		{
			console.log(LoginHandler);
			var username = LoginHandler.usernameField.val(),
				password = LoginHandler.passwordField.val();

			if (username.length < 1 || password.length < 1)
			{
				LoginHandler.showError('Please enter both your username and password.');
				return;
			}

			PacketHandler.send(Packet.Login, {username: username, password: password});
		},
		handleLoginResponse: function(data)
		{
			if (data.response != undefined)
			{
				if (data.response == 0)
					LoginHandler.showError('Invalid username and/or password.');
				else
				{
					LoginHandler.hideError();
					window.location = window.location.href;
				}
			}
			else
			{
				this.showError('There was an unknown error, please try again later.');
			}
		},
		showError: function(error)
		{
			LoginHandler.errorBox.html(error);
			LoginHandler.errorBox.slideDown();
		},
		hideError: function()
		{
			LoginHandler.errorBox.slideUp();
		},
		load: function()
		{
			LoginHandler.usernameField = $('#username-field');
			LoginHandler.passwordField = $('#password-field');

			LoginHandler.usernameField.on('keypress', function(data)
			{
				if (data.keyCode == 13)
					LoginHandler.passwordField.focus();
			});


			LoginHandler.passwordField.on('keypress', function(data)
			{
				if (data.keyCode == 13)
					LoginHandler.login();
			});

			LoginHandler.errorBox = $('#login-notice');

			PacketHandler.hook(Packet.Login, LoginHandler.handleLoginResponse);
			$(document).on('click', '#login-button', LoginHandler.login);
		}
	};

	LoginHandler.load();
});
