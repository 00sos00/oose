### Table 1:
<table>
	<tr>
		<td>Function Name</td>
		<td>Encryption</td>
	</tr>
	<tr>
		<td>Description</td>
		<td> This function encrypt any sensitive data like cleints personal details (phone number , email address,..)  </td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>choosing strong encryption algorithms (e.g., AES) by PHP</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>2 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>data theft</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>None</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Input data to store</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>Data is encrypted</td>
	</tr>
</table>



### Table 2:



<table>
	<tr>
		<td>Function Name</td>
		<td>Password Hashing with salting </td>
	</tr>
	<tr>
		<td>Description</td>
		<td>  the system must hash and salt passwords  </td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Critical</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>using a secure algorithm (e.g., bcrypt or Argon2) by PHP</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>2 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>Passwords may be Cracked</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>Sign up and Sign in functionalities</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>Broker submits a password</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>password hashed && salted and stored in database </td>
	</tr>
</table>
