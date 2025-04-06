1. Login (any) ✅
2. Logout (any) ✅
3. Create Account (admin) ✅
4. Delete Account (admin) ✅
5. Modify Account (any) ✅
6. View Accounts (admin) ✅
7. Filter Accounts (admin) ✅
8. Sort Accounts (admin) ✅
9. Reset Password (any) ✅

10. Add Property (admin) ✅
11. Delete Property (admin) ✅
12. Modify Property (admin) ✅
13. View Properties (any) ✅
14. Filter Properties (admin) ✅
15. Sort Properties (admin) ✅

16. Create Role (admin) ✅
17. Delete Role (admin) ✅
18. Modify Role Name (admin) ✅
19. Modify Role Permission (admin) ✅
20. View Roles (admin) ✅
21. Filter Roles (admin) ✅
22. Sort Roles (admin) ✅

23. Create Deal (broker) ✅
25. Delete Deal (broke5) ✅
25. Modify Deal (broker) ✅
26. View Deals (broker) ✅
27. Filter Deals (broker) ✅
28. Sort Deals (broker) ✅

29. View System Logs (admin) ✅
30. Filter System Logs (admin) ✅
31. Sort System Logs (admin) ✅

## Table 1: Functional Requirement FR001
<table>
	<tr>
		<td>Function Name</td>
		<td>Login (any)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any user with an account is allowed to login into the system using a username and a password</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- First login requires a password reset<br>
		- Username and password must be validated<br>
		- After a successful login, a session must be created<br>
		- A login session must be destroyed after 1 hour of inactivity<br>
		- Login time should be logged in the database<br>
		- Log action</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>3 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- System could be prone to SQL injection<br>
		- Incorrectly validating username and password<br>
		- Spam login to slow down the system<br>
		- Scripts or bots trying to login</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Password Reset requirment</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User already has an account created for him<br>
		- User has already reset his password atleast once</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A session is created for the user and a timer for it is set<br>
		- User is redirected to the home page</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 2: Functional Requirement FR002
<table>
	<tr>
		<td>Function Name</td>
		<td>Logout (any)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in user is allowed to logout of the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Session must be destroyed after logging out<br>
		- Logout time should be logged in the database<br>
		- Log action</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>1 day</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- If session is not correctly destroyed, there will be a possibility of a breach into the system<br>
		- For example, if an admin tries to logout at home and leaves his laptop open, his children could come playing and easily gain access into the system without having to login again due to the sessions still being alive</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Login requirment</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- The session is destroyed for the user<br>
		- User is redirected to the login page</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 3: Functional Requirement FR003
<table>
	<tr>
		<td>Function Name</td>
		<td>Create Account (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin should be able to create accounts for fellow users</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- The admin should ask the user what his preferred username would look like<br>
		- An account should be created with the requested username and a randomly generated password<br>
		- Password must be hashed using a secure hashing algorithm<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login requirment</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User has permission to create accounts</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- An account is created and stored in database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 4: Functional Requirement FR004
<table>
	<tr>
		<td>Function Name</td>
		<td>Delete Account (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin should be able to delete accounts for fellow users</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Confirmation is to be asked for before deletion of any account<br>
		- An account must be permenantly deleted<br>
		- Log action</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>1 day </td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- Deleting wrong accounts</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Login & Create Account requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User has permission to delete accounts</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- An account is deleted from the database<br>
		- Page is refreshed<br>
		- Account deletion should be logged in the database</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 5: Functional Requirement FR005
<table>
	<tr>
		<td>Function Name</td>
		<td>Modify Account (any)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in user can modify his account info such as username, password, phone number etc...</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Changes on the client side must appear in the database as well</td>
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
		<td>
		- This requirment depends on the Login & Create Account requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in profile page</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Changes applied in database<br>
		- Page is refreshed<br></td>
	</tr>
</table>
<br><br><br><br><br>




## Table 6: Functional Requirement FR006
<table>
	<tr>
		<td>Function Name</td>
		<td>View Accounts (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can view a list of all the registered accounts in the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- View a list of accounts<br>
		- Ability to select one or more accounts and delete them<br>
		- Clicking on an account redirects to that account's profile page</td>
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
		<td>
		- This requirment depends on the Login & Create Account & Delete Account requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in accounts page</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>List of accounts is queried from the database</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 7: Functional Requirement FR007
<table>
	<tr>
		<td>Function Name</td>
		<td>Filter accounts (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can filter the list of accounts by multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Filter by name<br>
		- Filter by last login date<br>
		- Filter by phone number<br>
		- Filter by email</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>2 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- SQL injection</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in accounts page</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>List of accounts is queried using a conditioned query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 8: Functional Requirement FR008
<table>
	<tr>
		<td>Function Name</td>
		<td>Sort Accounts (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can sort the list of accounts by multiplie criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Sort by name<br>
		- Sort by last login</td>
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
		<td>
		- This requirment depends on the Login requirment</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is on logged-in and is in the accounts page<br>
		- Has permission to view accounts</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- List of accounts is queried using an ordered query</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 9: Functional Requirement FR009
<table>
	<tr>
		<td>Function Name</td>
		<td>Reset Password (any)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in user can request a password reset</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Upon requesting a reset, an email should be sent to continue the operation<br>
		- Validate new password<br>
		- Hash new password and apply changes in the database</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>3 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- Forgetting to validate or hash new password<br>
		- Email service is down (send error back)<br>
		- SQL injection</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Login requirment</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is on login page<br>
		- Hasn't reset password in the last hour unless first time</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Success message appears<br>
		- User is redirected to login page again</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 10: Functional Requirement FR010
<table>
	<tr>
		<td>Function Name</td>
		<td>Add Property (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can register a property into the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Property coordinates should be supplied<br>
		- Should register owner info as well<br>
		- Handle property image & video storing<br>
		- Log action</td>
	</tr>
	<tr>
		<td>Cost and schedule</td>
		<td>3 days</td>
	</tr>
	<tr>
		<td>Risks</td>
		<td>
		- SQL injection</td>
	</tr>
	<tr>
		<td>Dependencies with other requirements</td>
		<td>
		- This requirment depends on the Login & View Properties requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to add properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Property is registered into the system<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 11: Functional Requirement FR011
<table>
	<tr>
		<td>Function Name</td>
		<td>Delete Property (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can delete a property from the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Should ask for confirmation first<br>
		- Permenantly delete<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Properties requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to delete properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Property is deleted from the system<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 12: Functional Requirement FR012
<table>
	<tr>
		<td>Function Name</td>
		<td>Modify Property (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can modify property information</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Clicking on an edit button next to property opens a pop up<br>
		- After changing needed information, click save to update the database<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Properties requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to modify properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Property is updated in the database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 13: Functional Requirement FR013
<table>
	<tr>
		<td>Function Name</td>
		<td>View Properties (any)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can view properties as a list</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Each property has an edit and a delete button<br>
		- Display in grid-like form where columns represent specific property information like price for example</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to view properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>List of properties is queried from the database</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 14: Functional Requirement FR014
<table>
	<tr>
		<td>Function Name</td>
		<td>Filter Properties (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can filter properties based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Filter by property location<br>
		- Filter by property price</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to view properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>Properties list is queried using a conditioned query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 15: Functional Requirement FR015
<table>
	<tr>
		<td>Function Name</td>
		<td>Sort Properties (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can sort properties based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Sort by property price</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in properties page<br>
		- User has permission to view properties</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>List of properties is queryied using an ordered query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 16: Functional Requirement FR016
<table>
	<tr>
		<td>Function Name</td>
		<td>Create Role (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can create and register a role into the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Click on create button to create role<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to create roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Role is registered into the database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 17: Functional Requirement FR017
<table>
	<tr>
		<td>Function Name</td>
		<td>Delete Role (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can delete a role from the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Click on delete button to create role<br>
		- Ask for confirmation before deletion<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to delete roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Role is deleted from the database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 18: Functional Requirement FR018
<table>
	<tr>
		<td>Function Name</td>
		<td>Modify Role Name (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can modify a role name and save changes</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Change role name in a text input<br>
		- After doing changes, click save to update database<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to modify roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Role name is modifed and updated in the database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 19: Functional Requirement FR019
<table>
	<tr>
		<td>Function Name</td>
		<td>Modify Role Permission (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can enable/disable a single permission for any selected role</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Changes to the permission checkboxes apply changes to the database right away<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to modify roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- Role permission is modifed and updated in the database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 20: Functional Requirement FR020
<table>
	<tr>
		<td>Function Name</td>
		<td>View Roles (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can view a list of all the registered roles in the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Show roles in a row form</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to view roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- List of roles is queried from the database</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 21: Functional Requirement FR021
<table>
	<tr>
		<td>Function Name</td>
		<td>Filter Roles (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can filter the list of roles by multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Filter by name<br>
		- Filter by permissions</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to view roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- List of roles is queried using a conditioned query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 22: Functional Requirement FR022
<table>
	<tr>
		<td>Function Name</td>
		<td>Sort Roles (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can sort the list of roles by name</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Low</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Sort by name</td>
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
		<td>
		- This requirment depends on the Login & View Roles requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in roles page<br>
		- User has permission to view roles</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- List of roles is queried using an ordered query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 23: Functional Requirement FR023
<table>
	<tr>
		<td>Function Name</td>
		<td>Create Deal (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can create a deal between two external users and register it into the system database</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Supply information about buyer and owner<br>
		- Specify payment type and status<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Deals requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to create deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A deal is established and registered into the system's database<br>
        - Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 24: Functional Requirement FR024
<table>
	<tr>
		<td>Function Name</td>
		<td>Delete Deal (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can delete a deal from the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- ASk for confirmation before deletion<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Deals requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to delete deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A deal is deleted from the system's database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 25: Functional Requirement FR025
<table>
	<tr>
		<td>Function Name</td>
		<td>Modify Deal (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can modify a deal</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Modify all deal details<br>
		- Log action</td>
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
		<td>
		- This requirment depends on the Login & View Deals requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to modify deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A deal is modified and updated in the system's database<br>
		- Page is refreshed</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 26: Functional Requirement FR026
<table>
	<tr>
		<td>Function Name</td>
		<td>View Deals (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can view a list of all the registered deals in the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- View in tabular form</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to view deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of deals is queried from the database</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 27: Functional Requirement FR027
<table>
	<tr>
		<td>Function Name</td>
		<td>Filter Deals (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can filter the list of deals based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Filter by date<br>
		- Filter by payment type<br>
		- Filter by payment status</td>
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
		<td>
		- This requirment depends on the Login & View Deals requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to view deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of deals is queried from the database using a filtered query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 28: Functional Requirement FR028
<table>
	<tr>
		<td>Function Name</td>
		<td>Sort Deals (broker)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in broker can sort the list of deals based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Sort by date<br>
		- Sort by price</td>
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
		<td>
		- This requirment depends on the Login & View Deals requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in deals page<br>
		- User has permission to view deals</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of deals is queried from the database using an ordered query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 29: Functional Requirement FR029
<table>
	<tr>
		<td>Function Name</td>
		<td>View System Logs (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can view a list of all logged actions in the system</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>High</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- View in row form</td>
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
		<td>
		- This requirment depends on the Login requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in system logs page<br>
		- User has permission to view system logs</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of logs is queried from the database</td>
	</tr>
</table>
<br><br><br><br><br>




## Table 30: Functional Requirement FR030
<table>
	<tr>
		<td>Function Name</td>
		<td>Filter System Logs (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can filter the list of logs based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Filter by action name<br>
		- Filter by action date</td>
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
		<td>
		- This requirment depends on the Login & View System Logs requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in system logs page<br>
		- User has permission to view system logs</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of logs is queried from the database using a filtered query</td>
	</tr>
</table>
<br><br><br><br><br>





## Table 31: Functional Requirement FR031
<table>
	<tr>
		<td>Function Name</td>
		<td>Sort System Logs (admin)</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
		In this function, any logged-in admin can sort the list of logs based on multiple criteria</td>
	</tr>
	<tr>
		<td>Critically</td>
		<td>Medium</td>
	</tr>
	<tr>
		<td>Technical issues</td>
		<td>
		- Sort by action name<br>
		- Sort by action date</td>
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
		<td>
		- This requirment depends on the Login & View System Logs requirments</td>
	</tr>
	<tr>
		<td>Pre-Condition</td>
		<td>
		- User is already logged in with a session created for him<br>
		- User is in system logs page<br>
		- User has permission to view system logs</td>
	</tr>
	<tr>
		<td>Post-Condition</td>
		<td>
		- A list of logs is queried from the database using an ordered query</td>
	</tr>
</table>
<br><br><br><br><br>