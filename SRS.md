# Real Estate Management System

## 1. Introduction

### 1.1 Purpose of this Document

This document is mainly for the current (and future) developers of **The Real Estate Management System**. This document focuses on describing each and every aspect in the system so that future updates and maintanance can easily be applied without any contradictions.

### 1.2 Scope of this Document

This document covers everything from _A_ to _Z_ . It covers the business model and its processes to the enhancements made with the software development and every update happened on the system. It also includes technical and non-technical descriptions about the business and the software. All the team members participated in building this document on differnet approaches from collectiong data and meets with the client to formatting the document to be on this organized form. This document is written in **Markdown** Language (.md) and that's to ensure readability on virtual platforms i.e. Github. The first release of this document was before the launch of the software so future updates and changes in the document may occur.

### 1.3 Overview

**Real Estate Management System** is a web-based system that allows Real Estate Agents to easily manage the units and customer needs. The system provides an interface for agents to easily communicate and arrange deals with owners and buyers. Agents can view their units, clients, and owners. They also have access to a dashboard to track financial growth and unit status, location, and details.

**Key features include:**

- **Listing Properties**
  - Add new properties for rent or sale.
  - Update property status (available, sold, or rented).
- **Managing Deals**
  - Track property status and transactions.
  - Follow up with clients until unit handover.
- **Commission & Payments**
  - Monitor financial transactions and commissions.
  - Manage rent payments and revenue tracking.
- **Automated Messaging System**
  - Message customers (non-buyers) for units availability.
  - Message Investors and Businessmen for available properties.

### 1.4 Business Context

**Luxville** is sponsoring the production of this model, as all information and business requirements are mostly captured from this company.
**Business Mission:**

- **Provide** the most suitable **property**(unit) for **customers** based on budget, location, and preferences
- **Market** properties on behalf of owners
- **Connect** **owners** with **buyers**.

**Organizational Objectives:**
**Expand their market reach** while **maintaining an organized and efficient approach** of **deal managament** with **high user satisfaction**. Currently their real estate operations are focused on 6th of October city. However, their long-term plan is to scale operations to cover Sheikh Zayed, New Cairo (Tagamoa), and expand across Egypt.

---

## 2. General Description

---

### 2.1 Product Functions

The system functions as an all-in-one management solution for a LuxVille, organizing key operations such as property management and transaction documentation. It ensures accurate tracking of deals , finances and property status, improving efficieny and provide more organized real estate operations.

### 2.2 Similiar System Information

This system is designed as a **stand-alone** real estate management platform, offering features for property administration and transaction documentation. While it operates independently, it supports integration with third-party services such as cloud storage (Google Drive, AWS) for document management, communication platforms for automated notifications ( Whatsapp ), and relational databases (MySQL) for efficient data storage and retrieval. Unlike standard property management software, this system is designed to fit the company's workflows, making operations more efficient and well-organized.

 <!-- Standard property management software is generic and not customized.
    ✅ Your system is tailored to fit your company’s specific workflows.  
    
    3ayz a rephrase 
      -->

### 2.4 User Problem Statement

**Luxville** faces several challenges due to the absence of a structured management system, **including**:

- **Property and Schedule Conflicts** - Mismanagement of property availability and meeting arrangements.
- **Data Redundancy and Loss** - Inefficient record-keeping causing missing or duplicate information.
- **Slow Data Retrieval** - Difficulty accessing transaction records and property details.
- **Lack of Updates** - Outdated information affecting decision-making and operations.
- **Difficult Follow-Ups** - Lack of an automated system to track operations

  <!-- Difficult Follow-Ups - Unknown market range ???????????? -->

---

## 3. Functional Requiremtns

> 1. Login (any) 
> 2. Logout (any) 
> 3. Create Account (admin) 
> 4. Delete Account (admin) 
> 5. Modify Account (any) 
> 6. View Accounts (admin) 
> 7. Filter Accounts (admin) 
> 8. Sort Accounts (admin) 
> 9. Reset Password (any) 
> 10. Add Property (admin) 
> 11. Delete Property (admin) 
> 12. Modify Property (admin) 
> 13. View Properties (any) 
> 14. Filter Properties (admin) 
> 15. Sort Properties (admin)  
> 16. Create Role (admin) 
> 17. Delete Role (admin) 
> 18. Modify Role Name (admin) 
> 19. Modify Role Permission (admin) 
> 20. View Roles (admin) 
> 21. Filter Roles (admin) 
> 22. Sort Roles (admin)
> 23. Create Deal (broker) 
> 25. Delete Deal (broke5) 
> 25. Modify Deal (broker) 
> 26. View Deals (broker) 
> 27. Filter Deals (broker) 
> 28. Sort Deals (broker)
> 29. View System Logs (admin) 
> 30. Filter System Logs (admin) 
> 31. Sort System Logs (admin) 

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

---

## 4. Interface Requirements

### 4.1. User Interfaces

#### 4.1.1. GUI

- **Agent Performance Dashboard** – track agent success metrics like closed deals & response time.
- **Browse Listing** - allow agents to search and filter properties based on price, location, and status.
- **View Property Details** - provide full detailed descriptive data about the property such as location, area, status, price per m<sup>2</sup>, number of rooms, and all data related to the unit.
- **View Clients** - list all previous clients that have done any ( or none ) deals.
- **View Owners** - list all current ( and previous ) owner-property history ( past listings, sold properties, etc.. ).
- **View Deals** - list all done-deals with detailed descriptions and e-documents ( if applicable ).
- **Manage Users and Permissins** - provides a controlling interface to give/remove privilages to users.
- **Track Financial Growth** - provide a dashboard with graphs and detailed transaction processes that happened in a ssselected range of time. ( for admins only )
- **Automated Reports and Analysis** - exportable table view reporting specific action over a selected range of time.
- **Auto-messaging System** - interface for setting the message, target, and software to send the messages upon ( Whatsapp, Email, or SMS ).
- **Alerts** - recieve notifications when clients are to leave, or expiry date of the contract is about to end.
- **Alerts Management** - set and modify notifications based on user desire.
- **User-log Tracker** - list all actions (CRUDs) made by all users that affect the database. ( for admins only )
- **Interactive Maps ( Additional )** - provide visual representations of the actual area covered by the company's units. That will open up many other features in the future such as searching on the map, finding the best fit, and recommend the best area to search for units in.

Visual designs/diagrams are to be added..

#### 4.1.2. API

- **Google Maps API**
  Used to display properties on map, show streets, and calculate distances. It's for a additional features that will be published soon. One of which is the Heatmap and area coverage visualizer.
- **Google Places API**
  Used to convert unit loaction into coordinates that can be further used in visualizations.
- **Google Cloud Storage**
  Used to store photos, videos, and documents about the properties.
- **Firebase**
  Used for secure login and user authentication.
- **Google Cloud Audit Logging**
  Used to monitor user actions affectiing the database.
- **Twilio API**
  Used for auto-messaging on Whatsapp and SMS.
- **Google Sheets API**
  Used for auto report generation and exportation.

#### 4.1.3. Diagnostics or ROM

not specified yet.

### 4.2. Hardware Interfaces

- **Database Server (MySQL)**
  for storing property listings and all data.
- **Cloud Storage (Firebase)**
  for storing media and documents related to the properties.
- **Desktops & Laptops (Windows, macOS)**
  to run the web-based system.
- **Wi-Fi Routers & Internet Connectivity**
  to grant access to the system and ensure real-time accurate data.

### 4.3. Communications Interfaces

The system relies on multiple connections to ensure security and efficieny in data exchange.

- **HTTP/HTTPS**
  to ensure secure data exchange on the website.
- **Wi-Fi connectivity**
  connection to wifi is _required_ to ensure real-time accurate data and avoid conflicts and misleading non-updated data.
- **MySQL**
  connection to the database should be active during the life span of the website to ensure real-time data view.

#### Third-Parties

- **Firebase**
- **Google Maps API**
- **Googel Places API**
- **Twilio API**
- **Google Sheets API**
- **Google Cloud Audit Logging**
- **Google Cloud Storage**

### 4.4. Software Interfaces

#### Display

- **Properties**
  List all properties with short description and quick action button.
- **Clients**
  List all clients.
- **Propety-Owners**
  List all property-owners with thier properties and a short description like ( number of sold properties, location, avg cut ).
- **Deals**
  List all deals ( not completed, pending, completed ) with description of the deal.
- **Transactions**
  List all transactions of all agents and all their winnings.
- **User-Logs**
  List all user-logs and attempts to modify data that affects the database or the cloud storage or any sort of unethical attempt.
- **Users**
  List all users and accounts created with their privialges and roles assigned to them.
- **Notifications**
  Show all unread notifications and their date.

#### Track and Update Processes

- **Properties**
  follow the step-by-step approach to complete a process on the property and either set it free back or occupied if a client completes the deal.
- **Clients**
  follow the step-by-step approach while updating the status of a client and rating the procedure with that client.
- **Propety-Owners**
  follow the step-by-step approach while updating the status of the property-owner and rating the procedure with that owner.
- **Deals**
  follow the step-by-step approach then record deal state at the end (complete, incomplete).

#### Modify (Add, Edit, Delete)

- **Properties**
  add, edit or delete data about the property or even delete the property as a whole.
- **Clients**
  add, edit or delete data about a client ( except ratings are only calculated through deals ) or even delete the client himself.
- **Propety-Owners**
  add, edit or delete data about a property-owner ( except ratings are only calculated through deals ) or even delete the owner himself and his properties.
  _<blockquote>Deleting the owner results in deleting the property he currently owns, so make sure the property is assigned to the right owner before deletion.</blockquote>_
- **Deals**
  add, edit or delete data about the deal or even delete the deal itself.
  edit and delete functions are only available to admin and the roles he picks to have access.
- **Transactions**
  add, edit or delete data about transactions(income/expense) or even delete the transaction itself.
  edit and delete functions are only available to admin and the roles he picks to have access.
- **User-Logs**
  delete user-logs. only available to admins.
- **Users**
  add, edit or delete users of the website. only available to admins.
- **Notifications**
  create and edit the content, target, time, and duration of alerts.
- **Automated Messages**
  create and edit the content, target, time, and platform to send the messages upon.
- **User Privilages**
  grant and remove access to specific funtions for selected authorized roles.

#### Visualize

- **Financial State**
  visualize as graphs and cross sectors.
- **Clients Classes**
  visualize with statistical functions.
- **Market Price**
  visualize the average across years.
- **Completed Deals**
  show percentage of deal completions.
- **Coverage Area** ( additional feature )
  visualize properties on the maps with heatmap indicating coverage area of each property.

  ---

  ## 6. Design Constraints

  ### 6.2 Hardware Limitations

  The system needs a stable setup for smooth performance. While it doesn’t require high-end hardware, some limitations should be considered:

  - **Network Dependence** - System performance maybe affected by unstable internet connections.
  - **Device Compatibility** - System requires compatible hardware for proper functioning, as mentioned in **"Section 5: Performance Requirements".**
  - **Storage Constraints** - Data growing over time may require additional cloud storage
    <!--
    Increasing Data Over time -- instead of data growing
    Scalability – As operations expand, hardware upgrades may be needed to maintain efficiency. -->

  ---

  ## 7 Other non-functional attributes

  ### 7.1 Security

  ### 7.2 **Binary Compatibility**

  > Not applicable, as the system is a web-based application and does not rely on compiled program or library.

  <!--
  Binary Compatibility refers to the ability of software (a compiled program or library) to run on different versions of an operating system, platform, or runtime environment without requiring recompilation or modification.
  -->

  ### 7.3 **Reliability**

  > N/A

  ### 7.4 **Maintainability**

  > The system allows modifications to specific features without affecting the overall application.

  > The system is well-documented , including inline comments.

  > A structured developer guide is be available to support debugging, updates, and the maintenance of software standards across the project.

  ### 7.5 **Portability**

  > Not applicable, as the system runs as a web application. It is primarily designed for desktop use and does not support mobile devices.

  ### 7.6 **Extensibility**

  > @safa

  ### 7.7 **Reusability**

  > Each UI component, including forms, buttons and navigation bars are implemented reusable modular way to maintain consistency throughout the system.
  > System Backend follows a well-structured modular implementation allowing features to be easily used accross the system.

  ### 7.8 **Application Affnity/Compatibility**

  > The system is designed to be compatible with the necessary third-parties to support the desired functionalities, including data storage, communication and location features as mentioned in **"4.1.2. API"**.

  ### 7.9 **Resource Utilization**

  ### 7.10 **Serviceability**

  > Not applicable, as troubleshooting is performed manually throughout the code without dedicated serviceability features such as automated alert and diagnostic tools.

  ***

  ## 8. Preliminary Object-Oriented Domain Analysis

  ### 8.1. Inheritance Relationships

  <table border="3">
    <tr>
      <th></th>
      <th>User Class</th>
      <th>Permission Class</th>
      <th>Property Class</th>
      <th>Deal Class</th>
      <th>Transaction Class</th>
    </tr>
    <tr>
      <th>Diagram</th>
      <td><img src="UserClassDiagram.jpg" width="600"></td>
      <td><img src="PermissionClassDiagram.jpg" width="600"></td>
      <td><img src="PropertyClassDiagram.jpg" width="600"></td>
      <td><img src="DealClassDiagram.jpg" width="600"></td>
      <td><img src="TransactionClassDiagram.jpg" width="600"></td>
    </tr>
    <tr>
      <th>Parent Classes</th>
      <td>User</td>
      <td>Permission</td>
      <td>Property</td>
      <td>Deal</td>
      <td>Transaction</td>
    </tr>
    <tr>
      <th>Inhereted Classes</th>
      <td>
        <ul>
          <li>SystemUser</li>
          <li>
            ExternalUser
            <ul>
              <li>Buyer</li>
              <li>Seller</li>
              <li>Owner</li>
              <li>Client</li>
            </ul>
          </li>
        </ul>
      </td>
      <td>
        <ul>
          <li>GeneralPermissions</li>
          <li>OperationalPermissions</li>
          <li>AdministrativePermissions</li>
          <li>FinancialPermissions</li>
          <li>MarketingPermissions</li>
        </ul>
      </td>
      <td>
        <ul>
          <li>House</li>
          <li>Apartment</li>
          <li>Studio</li>
          <li>Office</li>
          <li>Land</li>
        </ul>
      </td>
      <td>
        <ul>
          <li>RentingDeal</li>
          <li>SellingDeal</li>
        </ul>
      </td>
      <td>
        <ul>
          <li>Revenue</li>
          <li>Expense</li>
        </ul>
      </td>
    </tr>
  </table>

  ### 8.2. Class descriptions

  #### 8.2.1. Class Name

  - **User**

    > an **abstract** class that represents anyone using the system.

  - **ExternalUser**

    > is-a **User** that has **no-permissions** to view, modify, or update anything on the system.

  - **Buyer**

    > is-a **ExternalUser** who has already purchased or rented a property.

  - **Seller**

    > is-a **ExternalUser** who owns(or transferred the ownership in case of selling not renting) a property and has already sold it or rented it.

  - **Client**

    > is-a either **Seller** or **Buyer** or possibly both.

  - **Owner**

    > is-a either **Seller** or **Buyer** or possibly both.
    > has-a **Property**.

  - **SystemUser**

    > is-a **User** who has-a **Role**(s) and has rights to modify or update specific parts of the system or to perform operations.

  - **Role**

    > has-a set of **Permissions** assigned to a **SystemUser**.

  - **Permissions**

    > an **abstract** class that specifies a set of operational rights assigned to **SystemUser**.

  - **GeneralPermissions**

    > is-a set of **privileges** that allows **User** accessing fundemental system features.

  - **OperationalPermissions**

    > is-a set of **privileges** that defines permissions related to business operations.

  - **AdminstrativePermissions**

    > is-a set of **privileges** for system administrators and managers.

  - **FinancialPermissions**

    > is-a set **privileges** that defines access to financial transactions, and reporting within the system.

  - **MarketingPermissions**

    > is-a set of **privileges** that defines access to message generation and alerts configurations.

  - **Property**

    > an **abstract** class represents a real estate
    > asset that can be bought, sold, or rented.

  - **House**

    > is-a **Property** representing a residential building designed for living.

  - **Apartment**

    > is-a **Property** that is a unit within a larger residential complex.

  - **Office**

    > is-a **Property** that is used for commercial and business purposes.

  - **Studio**

    > is-a Property representing a small, self-contained living space typically designed for a single occupant.

  - **Deal**

    > an **abstract** representing a contractual agreement between a buyer and seller.

  - **RentingDeal**

    > is-a **Deal** that involves leasing a Property for a specific duration

  - **SellingDeal**

    > is-a **Deal** where ownership of a Property is transferred.

  - **Transaction**

    > an **abstract** class representing financial activities related to deals and payments.

  - **Revenue**
    > is-a **Transaction** that records incoming financial gains.
  - **Expense**

    > is-a **Transaction** that tracks outgoing costs.

  - **StatisticalAnalysis**

    > has-a **Deal** and **Transaction**, analyzing financial transactions.

  - **Report**

    > a **stand-alone** class used for generating insights from **StatisticalAnalysis** class.

  - **AuditLog**

    > a **stand-alone** class records system activities and tracks modifications for security.

  - **Message**

    > a **stand-alone** class used for communication between **SystemUser** and **ExternalUser**.

  - **Notification**
    > a **stand-alone** class used to notify **SystemUsers** with alerts.

  #### 8.2.2. List of Standalone Classes

  - **Role**
  - **Notification**
  - **Appointment**
  - **Messages**
  - **StatisticalAnalysis**
  - **Report**
  - **AuditLog**
  - **GUI**
  - **Query**
  - **JSONCoder**

  #### 8.2.3. List of Superclasses

  - **User**
  - **Permission**
  - **Property**
  - **Deal**
  - **Transaction**

  #### 8.2.4. List of Subclasses

  ###### User

  - **ExternalUser**
  - **Buyer**
  - **Seller**
  - **Client**
  - **Owner**
  - **SystemUser**

  ###### Permission

  - **GeneralPermissions**
  - **OperationalPermissions**
  - **AdministrativePermissions**
  - **FinancialPermissions**
  - **MarketingPermissions**

  ###### Property

  - **House**
  - **Apartment**
  - **Studio**
  - **Office**
  - **Land**

  ###### Deal

  - **RentingDeal**
  - **SellingDeal**

  ###### Transaction

  - **Revenue**
  - **Expense**

  #### 8.2.5. Purpose

  - **User**

    > Defines the base entity for all internal/external users and provides authentication and identity management for system users.

  - **ExternalUser**

    > Represents Users who do not have internal system permissions or viewing access i.e. Clients, Property-Owners, Buyers, and Sellers.

  - **Authentication**

    > Ensures secure access to the system with valid database authentication and manages user sessions throughout the system lifespan.

  - **Buyer**

    > The buyer/renter side of the deal that contributes in the **deal** completion. In case of Selling Deal, the ownership of the property transfers **to** him.

  - **Seller**

    > The current owner of the property that contributes in the **deal** completion. In case of Selling Deal, the ownership of the property is transferred **from** him.

  - **Client**

    > An **ExternalUser** who is seeking help to find the appropriate unit (property) either for linving or invve

  - **Owner**

    > The current owner/seller of a property who is looking for an **ExternalUser** who is intersted in buying/renting a property. He seeks help to market for his properties.

  - **SystemUser**

    > represents the active **User** who can view, interact, and perform operations based on an assigned role.

  - **Role**

    > represents set of permissions assigned to **SystemUsers** to perform specific operations.

  - **Permissions**

    > Specifies **User** privileges within the system that limits his access to certain operations which eventually boosts confidentiality of the Company and enhances security by preventing unauthorized access.

  - **GeneralPermissions**

    > define basic privileges available to all active **Users** using the system i.e. viewing dashboards, profile management.

  - **OperationalPermissions**

    > is-a set of **privileges** that defines permissions related to business operations and step-by-step approach of completing the deals. These privialges include: Set Commission Rates, Negotiate Deals, Finalize Deals, Cancel Deals, Generate Invoices, Process Payments, Upload Documents, View Document, and Manage Media Files

  - **AdminstrativePermissions**

    > provides system administrators with **privileges** to manage **Users**, **Roles**, and **Permissions**. These privielges provide the following: Configure System Settings, Backup & Restore Data, Monitor User Activity, Disable Features, Delete Account, Delete Property Listings, View Users, Ban Clients, Assign Roles, Modify User Permissions, Edit Documents, and Delete Documents.

  - **FinancialPermissions**

    > is-a set **privileges** that defines access to financial transactions, and reporting within the system. These permissions enables the ability to View Financial Reports, View Payment History, View Deals, and Export Reports.

  - **MarketingPermissions**

    > is-a set of **privileges** that defines access to generate automated messages and notifications.

  - **Property**

    > is the main object in the business which deals and all operations relies upon. It's also referred to as **Unit**. Property defines every physical or legal asset that can be owned, rented, or sold. It includes, Land, House, Apartment, Studio, and Office. Properties are stored in the system only if documents are proven to be legal and valid. Each property has its own pricing that is given from the owner to market it for.

  - **House**
  - > is-a type of **property** that is a building with one owner and has no more than one family living in it.

  - **Apartment**

    > is-a type of **property** that is a part of a building and has only one owner to it.

  - **Office**

    > is-a type of **property** that is smaller than a studio and is mostly used for commercial use.

  - **Studio**

    > is-a type of **property** that can be shared and is usually rented and not sold.

  - **Land**

    > is-a type of **property** that refers to a wide land area that is used for constructions and building needs.

  - **Deal**

    > Ensures structured excution of transactions when agreement is reached between the **Buyer** & **Seller**. It standardize the process by defining clear terms and conditions. It is also associated with a financial operation such as **transaction** and **document**.

  - **RentingDeal**

    > provides a well-oragnized excution of property leasing agreement when terms are agreed between the **Client** & **Broker**. It standardize the rental process by definig clear rental terms and payment schedules. protecting the rights of both parties and minimizing conflicts. It is also associated with a financial operation such as **transaction** and **document**.

  - **SellingDeal**

    > Provides a well-organized execution of property sales agreements when terms are agreed between the **Buyer** & **Seller**. It standardizes the selling process by defining clear ownership transfer conditions and legal documentation. by protecting the rights of both parties, preventing any conflicts and ensuring a clear transition of property ownership. It is also associated with financial operations such as **transaction** and **document**.

  - **Transaction**

    > Represents the financial aspects and flow of a deal. It ensures security and transparent payments between parties and prevents any conflicts.

  - **Revenue & Expense**

    > Categorizes financial transactions into income and costs.

  - **StatisticalAnalysis**

    > Used for processing financial data related to **deals** and **transactions** providing insights into **revenue**, **expense** and overall performance. It enhances decision making for **SystemUsers**.

  - **Report**

    > Reports is generated based on **StatisticalAnalysis** insights, providing **SystemUsers** clear view of financial performance. It helps in decision making by providing revenue and expenses detailed reports.

  - **AuditLog**

    > Maintains a detailed record of all system modifications, tracking changes made by **Users**. This helps in maintaing transparency within the system.

  - **Message**

    > provides clear automated messaging system between **ExternalUsers** & **SystemUsers** within the system.

  - **Notification**

    > Real-time alerts and updates to **SystemUsers** Helping them to stay informed about important (deals) events. It enhances responsiveness by providing critical reminders and notifications

  - **Appointment**
    > Manages property visit schedules for potential buyers and **SystemUsers**.

  #### 8.2.6. Collaborations

  #### 8.2.7. Attributes
  ##### User
  - First name
  - Last name
  - Country_Code
  - Phone_number
  ##### System User
  - Email
  - Password
  - ID
  - Role
  ##### External User
  - Rating
  ##### Buyer
  - ID
  - SSN
  - Area
  - Category
  - PropertyID
  - DealID
  ##### Seller
  - ID
  - SSN
  - Area
  - PropertyID
  - DealID
  ##### Client
  - NeedPropertyFeatures
  - ProvidePropertyFeatures
  ##### Owner
  - ID
  - PropertyIDs
  ##### Property
  - forRent
  - forSale
  - ID
  - price
  - paidAmount
  - remainingAmount
  - myCut
  - status
  - latitude
  - longitude
  - AreaCoverage
  - area
  - address
  - listingDate
  - mediaLink
  - is_installment_available (bool)
  - installment_duration_months
  - down_payment
  - monthly_payment
  - interest_rate
  - payment_start_date
  ##### House
  - number_of_bedrooms
  - number_of_bathrooms
  - has_garage (bool)
  - has_garden (bool)
  - number_of_floors
  - year_built
  - heating_type (central, gas, electric)
  - cooling_type
  - furnished (bool)
  - backyard_size
  - flooring_type
  - roof_type
  - has_landline
  - network_infrastructure
  ##### Apartment
  - unit_number
  - floor_number
  - number_of_bedrooms
  - number_of_bathrooms
  - building_name
  - has_elevator
  - monthly_maintenance_fee
  - is_furnished
  - has_balcony
  - view_type
  - network_infrastructure
  - has_landline
  ##### Studio
  - floor_number
  - is_furnished
  - has_kitchenette (bool)
  - has_balcony
  - apartment_name
  - monthly_maintenance_fee
  - network_infrastructure
  - has_landline
  ##### Office
  - floor_number
  - building_name
  - number_of_rooms
  - meeting_rooms
  - has_reception_area
  - has_parking
  - monthly_service_fee
  - is_furnished
  - network_infrastructure (bool)
  - has_landline
  ##### Land
  - land_type (e.g., residential, commercial, agricultural)
  - zoning_information
  - is_serviced (utilities available)
  - buildable_area
  - plot_number
  - topography (flat, slope, etc.)
  - road_access

  ##### Deal
  - ID
  - PropertyID
  - SellerID
  - BuyerID
  - SysUserID
  - Date
  ##### RentingDeal
  - startDate
  - endDate
  - securityAmount
  - monthlyRent
  - paymentFrequency
  - leaseDuration
  - utilitiesIncluded(Electricity, Water, Gas)
  - rentalConditions
  ##### SellingDeal
  - askingPrice
  - valuationPrice
  - finalPrice
  - negotiable
  - paid
  - commissionRate
  - paymentType
  - ownershipType
  - legalClearance
  - propertyTitleDeed

  #### 8.2.8. Operations

  #### 8.2.9. Constraints
