<h1>3rd May 2014</h1><br/>
<b>General Changes:</b><br/>
- You are now unable to put levels into a bottle without an empty space in your inventory to prevent loosing the enchantment bottle.<br/>
- The Bank has been redesigned slightly to try and prevent clumbsy oafs from dropping items behind the bars.<br/>
- When sending a book using the "/mail sendbook" command, a success message is displayed to confirm it sent.<br/>
- Dergons no longer lay on the ground having seizures and should be fully functional.<br/>
- Dergons now spawn more often.<br/>
<br/>
<b>Clan Changes:</b><br/>
- You can now decline pending clan invitations using "/clan decline <clan>".<br/>
- Pending clan invites to invalid clans are now correctly removed automatically.<br/>
- Fixed a bug that would cause the "pending invites" message to show up when you have no clan invites pending.<br/>
<br/>
<b>Commands:</b><br/>
- The "/npc" command and it's functionality has been removed.<br/>
- The "/sit" command has been removed.<br/>
- The "/boundaryimmune" command has been removed and is now permission-based.<br/>
<br/>
<b>Companion Pets:</b><br/>
- The Bart (Sheep) companion pet now randomly changes colour every <s>ten</s> five minutes.<br/>
- New companion pet Flappy (Bat) is now available to buy from our website.<br/>
- New companion pet Mittens (Cat) is now available to buy from our website.<br/>
- New companion pet Murps (Cat) is now available to buy from our website.<br/>
- New companion pet Fluffers (Cat) is now available to buy from our website.<br/>
<br/>
<b>Technical/Framework Changes:</b><br/>
- Some debugging has been removed from when players enter portals which should reduce server lag during heavy-traffic time periods.<br/>
<br/>
<h1>16th April 2014</h1><br/>
<b>General Changes</b><br/>
- Wolf Tracking has been removed, another similar feature may be added in the future but for now it will remain a removed feature.<br/>
- Orb of Molten Soaking now correctly removes itself from a players inventory when used if the stack is at 1.<br/>
- Scaffolding no longer turns into pistons when placed against a block with redstone current in it.<br/>
- Market trades should no longer randomly give out lower amounts than specified.<br/>
<br/>
<h1>14th March 2014</h1><br/>
<b>General Changes</b><br/>
- A new world has been added: Azuren! Azuren is Runsafe's version of The End, containing new mobs, dungeons and a custom generation design!<br/>
- Arrows shot from an explosive bow no longer persist in the world.<br/>
- New achievement: Suddenly, silverfish! - Activate a dungeon in the Azuren world.<br/>
<br/>
<h1>13th March 2014</h1><br/>
<b>General Changes</b><br/>
- When joining a clan by being one of the initial players who signed the charter, all pending clan invites are successfully removed.<br/>
- Squid mounts should no longer drop bacon when they die.<br/>
- If a squid mount takes more damage than it has health, the excess damage points will be inflicted on the rider.<br/>
- The squid mount item now has a 5 second cooldown.<br/>
- If a player is dead, their world tag will display as a grey cross.<br/>
<br/>
<b>Technical/Server Changes</b><br/>
- Fixed a number of issues related to player arguments to commands.<br/>
<h1>1st March 2014</h1><br/><br/>
<b>General Changes</b><br/>
- Scaffolding no longer turns into pistons when used against redstone blocks.<br/>
- Dergons are now more random about how they choose a target, preventing players from “farming” them as much.<br/>
- Implemented a “/roll” command.<br/>
<h1>28th February 2014</h1><br/>
<b>General Changes</b><br/>
- Fixed internal server errors.<br/>
- The PvP arena now uses iron enchanted armour rather than leather armour to improve fight quality.<br/>
- The default armour suit given when joining PvP now matches the new iron enchanted armour available.<br/>
- Dergon Thunder no longer triggers in no-pvp zones.<br/>
- Dergons correctly track damage done to them properly and will award to the correct clan.<br/>
- Jukeboxes now eject anything inside them when a player tries to play a chord book in them.<br/>
- When sending mail, your inventory will correctly update to show the cost which was removed.<br/>
- The server no longer attempts to turn players into items when they are fished with a fishing rod.<br/>
- The blood effect that is shown when a player steps into a hopper has been dramatically improved.<br/>
- Dergon Eggs will correctly drop a Dergon Egg item when broken.<br/>
- Four flags have been removed from the spleef arena to prevent players cheating.<br/>
<br/>
<b>Technical/Server Changes</b><br/>
- Commands that take a world as an argument should now take exact matches before partial matches.<br/>
- Locked objects are loaded and unloaded with the world.<br/>
- DOG responders may now be assigned permissions limiting who can trigger them.<br/>
<br/>
<b>Staff/Admin Only Changes</b><br/>
- The mute command now takes an optional duration argument.<br/>
- It is no longer possible to mute offline players in game.<br/>
- The “/rank” command may now be used on offline players<br/><br/>
<h1>24th February 2014</h1><br/>
<b>General Changes</b><br/>
- Various internal server errors have been fixed.<br/>
- Portals no longer randomly stop working due to a permission persistence issue.<br/>
- Better support for numerical arguments to commands.<br/>
<br/>
<b>Fishing</b><br/>
- Every Monday at 1AM GMT a fishing tournament will be held at spawn. The winner of the event will get an awesome new squid mount which can be used in water!<br/>
- New special items can be obtained by fishing at spawn!<br/>
<br/>
<b>Achievements</b><br/>
- “The Scavenger” - Fish up one of the rare special items from spawn!<br/>
- “Fishies be mine! Leave dem fishies!” - “Winner of the weekly fishing tournament!”<br/>
<br/>
<b>Staff/Admin Only Changes</b><br/>
- The kit command now supports tab-complete.<br/>
- A bug preventing staff from setting player-notes has been resolved.<br/>
- The “/enchant” command now supports the new Lure/Luck enchants.<br/>
- The “/enchant” command now supports tab-complete.<br/>
- The “/enchant” command now supports multiple enchants at once.<br/>
- To apply an enchant at not max power, add :n to the enchant name, ie.: “/enchant luck:2”<br/>
- Commands that take an entity name can now be tab-completed.<br/>
- Teleportation is now slightly smarter when you try teleporting to someone whom is floating in thin air.<br/>
- /whois now can list the players location and their pex rank(s).<br/>
- Fixed a bug that would sometimes cause regeneration to fail once a plot was deleted.<br/>
- The “/setportal” command now takes a permission string as an optional third parameter.<br/>
- Teleporting to a position now accepts two arguments as an alternate usage.<br/>