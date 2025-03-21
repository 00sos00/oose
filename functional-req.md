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

### Table 5:
<table>
	<tr>
		<td>Function Name</td>
		<td>Add role</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can create roles and assign permissions to them</td>
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
		<td>2 day</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>Should be aware of assigning wrong permissions</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A role should be created and added to the database</td>
	</tr>
</table>

### Table 6:
<table>
	<tr>
		<td>Function Name</td>
		<td>Remove role</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can remove roles from the database</td>
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
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>The role should be removed from the database</td>
	</tr>
</table>

### Table 7:
<table>
	<tr>
		<td>Function Name</td>
		<td>Assign role</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can assign roles to any account</td>
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
		<td>Should be aware of assigning the role to wrong accounts</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A role should be assigned to an account</td>
	</tr>
</table>

### Table 8:
<table>
	<tr>
		<td>Function Name</td>
		<td>Unassign role</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can unassign roles from any account</td>
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
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>A role should be unassigned from an account</td>
	</tr>
</table>

### Table 9:
<table>
	<tr>
		<td>Function Name</td>
		<td>ُEnable permission</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can enable a single permission for any created role</td>
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
		<td>Should be aware of enabling wrong permissions</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>The permission should be enabled for the selected role</td>
	</tr>
</table>

### Table 10:
<table>
	<tr>
		<td>Function Name</td>
		<td>Disable permission</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>In this function, admins can disable a single permission for any created role</td>
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
		<td>Should already be signed in as an admin</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>The permission should be disabled for the selected role</td>
	</tr>
</table>