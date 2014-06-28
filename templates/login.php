<h1>Log-in to Runsafe</h1>
<p>To log-in simply enter your e-mail address and password. If you don't have an account you can use the form below to register one!</p>
<p id="login-status" class="form-status form-success"><?php if ($this->logout != null) echo 'You have been logged out.'; ?></p>
<table class="form-table form-table-submittable">
	<tr>
		<th>E-mail:</th>
		<td><input type="text" class="input-text" id="email"/></td>
	</tr>
	<tr>
		<th>Password:</th>
		<td><input type="password" class="input-text" id="pass"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="input-button" id="submit" value="Log-in"/>
		</td>
	</tr>
</table>
<h1>Register New Account</h1>
<p id="register-status" class="form-status form-success"></p>
<table class="form-table form-table-submittable">
	<tr>
		<th>E-mail:</th>
		<td><input type="text" class="input-text" id="reg-email"/></td>
	</tr>
	<tr>
		<th>Password:</th>
		<td><input type="password" class="input-text" id="reg-pass"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="input-button" id="reg-submit" value="Register"/>
		</td>
	</tr>
</table>
<p><a href="recovery.php">Forgot your password? Click here to recover account access!</a></p>