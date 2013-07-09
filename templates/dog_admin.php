<script type="text/javascript" src="http://static.minecraft.runsafe.no/scripts/dog_admin.js"></script>
<h1>Dog Administration</h1>
<?php
	if ($this->responses != null)
	{
		if (count($this->responses))
		{
			?><div id="dog-responses"><?php
			foreach ($this->responses as $response)
			{
				?>
					<div class="dog-response" id="<?php echo $response->ID; ?>">
						<input type="text" class="pattern" value="<?php echo $response->pattern; ?>"/>
						<input type="text" class="reply" value="<?php echo $response->reply; ?>"/>
					</div>
				<?php
			}
			?>
			<div class="dog-response" id="new">
				<input type="text" class="pattern"/>
				<input type="text" class="reply"/>
			</div></div>
			<?php
		}
		else
		{
			?><p>There are no DOG responses, try adding one?</p><?php
		}
	}
	else
	{
		?><p>Sorry, we could not produce a list of DOG responses right now!</p><?php
	}
?>