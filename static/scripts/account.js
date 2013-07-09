$(function(){
	var Account = {
		load: function()
		{
			Account.characterField = $('#character-field');
			Account.tokenField = $('#token-field');
			Account.errorField = $('#login-notice');
			Account.linkedCharacterField = $('#linked-character');

			$(document).on('click', '#link-button', Account.link);
			PacketHandler.hook(Packet.LinkCharacter, Account.postLink);
		},
		link: function()
		{
			var character = Account.characterField.val().trim(),
				token = Account.tokenField.val().trim();

			if (character.length == 0 && token.length == 0)
				Account.showError('Please enter your character name and the in-game token.');
			else
				PacketHandler.send(Packet.LinkCharacter, {character: character, token: token});
		},
		postLink: function(data)
		{
			if (data.response !== undefined)
			{
				switch (data.response)
				{
					case 0: Account.showError('Invalid token given, try generating a new one in-game.'); break;
					case 1: Account.setLinkedCharacter(data.character); Account.done(); break;
					default: Account.showError('Unknown error, please contact an admin and say "Goobers".'); break;
				}
			}
			else
			{
				Account.showError('Unknown error, please contact an admin.');
			}
		},
		done: function()
		{
			Account.hideError();
			alert('Your character has been linked to your account, success!');
			Account.characterField.val('');
			Account.tokenField.val('');
		},
		showError: function(message)
		{
			Account.errorField.html(message);
			Account.errorField.slideDown();
		},
		hideError: function()
		{
			Account.errorField.slideUp();
		},
		setLinkedCharacter: function(character)
		{
			Account.linkedCharacterField.html(character);
		}
	};

	Account.load();
});
