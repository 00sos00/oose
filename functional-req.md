### Table 1:
<table>
	<tr>
		<td>Function Name</td>
		<td>Sign in</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, any broker or admin will be able to sign in with a username and password that were previously stored in the database by the developers</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>2 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A session should be created for the user to stay logged in for at most 1 hour</td>
	</tr>
</table>

### Table 2:
<table>
	<tr>
		<td>Function Name</td>
		<td>ِAdd Property</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, only admins are able to add properties to the database through a GUI</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>1 day</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>Should be aware of enter correct property information like price and location</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A property entity should be created and added to the database</td>
	</tr>
</table>

### Table 3:
<table>
	<tr>
		<td>Function Name</td>
		<td>Remove Property</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, only admins are able to remove properties from the database through a GUI</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>1 day</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>Should be aware of accidently removing important properties</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A property entity should be removed from the database</td>
	</tr>
</table>

### Table 4:
<table>
	<tr>
		<td>Function Name</td>
		<td>Logout</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, brokers or admins can log out of their account</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>1 day</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>The session that was created when signing in should be destroyed</td>
	</tr>
</table>