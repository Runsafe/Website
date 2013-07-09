$(function(){
	var Shop = {
		points: 0,
		itemHTML: '<div id="{3}" class="purchase" style="background-image: url(\'http://static.minecraft.runsafe.no/images/{0}\');"><div class="purchase-title">{1} - {4} PvP Points</div>{2}</div>',
		ItemSets: {
			2: {
				name: 'Barbarians Axe',
				description: 'Let your blood-lust engage with this head-splitting axe.',
				cost: 150,
				icon: 'tile_iron_axe.png'
			},
			3: {
				name: 'Swiftness Vials',
				description: 'A set of three swiftness vials.',
				cost: 200,
				icon: 'tile_potion_swiftness.png'
			},
			4: {
				name: 'Resistive Gear',
				description: 'A full set of nature-magic enchanted gear designed for combat.',
				cost: 1000,
				icon: 'tile_leather_chest_green.png'
			},
			10: {
				name: 'Hunting Bow',
				description: 'A well crafting hunting bow, perfect for shooting players!',
				cost: 200,
				icon: 'tile_bow.png'
			},
			6: {
				name: 'Arrow Pouch',
				description: 'A small pouch consisting of 64 arrows.',
				cost: 20,
				icon: 'tile_arrow.png'
			},
			7: {
				name: 'Tar Bombs',
				description: 'A set of two tar bombs designed to slow players they hit.',
				cost: 60,
				icon: 'tile_potion_slowness_splash.png'
			},
			8: {
				name: 'Jar of Dirt',
				description: 'Throw the jar on the floor to teleport randomly around the arena.',
				cost: 100,
				icon: 'tile_potion_exp.png'
			},
			9: {
				name: 'Suspicious Mushrooms',
				description: 'You are not quite sure what this pack of five mushrooms will do..',
				cost: 100,
				icon: 'tile_mushroom_red.png'
			}
		},
		loadShop: function()
		{
			for (var pointer in Shop.ItemSets)
			{
				var node = Shop.ItemSets[pointer];
				Shop.interface.append(Shop.itemHTML.format(node.icon, node.name, node.description, pointer, node.cost));
			}
		},
		load: function()
		{
			Shop.interface = $('#pvp-shop');
			Shop.pointsDisplay = $('#points');
			Shop.loadShop();

			$(document).on('click', '.purchase', Shop.handleItemClick);
			PacketHandler.hook(Packet.PVPBuyItem, Shop.handleItemPurchase);
			PacketHandler.hook(Packet.PVPGetPoints, Shop.updatePoints);
			PacketHandler.send(Packet.PVPGetPoints);

			setInterval(Shop.getNewPoints, 5000);
		},
		updatePoints: function(data)
		{
			if (data.points !== undefined)
			{
				Shop.pointsDisplay.html(data.points);
				Shop.points = data.points;
			}
		},
		handleItemClick: function()
		{
			var id = parseInt($(this).attr('ID')),
				item = Shop.ItemSets[id];

			if (Shop.points >= item.cost)
			{
				var confirm = window.confirm('Are you sure you wish to purchase {0} for {1} points?'.format(item.name, item.cost));

				if (confirm)
					PacketHandler.send(Packet.PVPBuyItem, {item: id});
			}
			else
			{
				alert('You do not have enough to purchase that item.');
			}
		},
		handleItemPurchase: function(data)
		{
			alert("Item successfully bought! Use '/pvp checkout' in-game when you are done shopping.");
			Shop.getNewPoints();
		},
		getNewPoints: function()
		{
			PacketHandler.send(Packet.PVPGetPoints);
		}
	};

	Shop.load();
});
