# Real Estate Management System

## 1. Introduction
### 1.1 Purpose of this Document
This document is mainly for the current (and future) developers of **The Real Estate Management System**. This document focuses on describing each and every aspect in the system so that future updates and maintanance can easily be applied without any contradictions.
### 1.2 Scope of this Document
This document covers everything from *A* to *Z* . It covers the business model and its processes to the enhancements made with the software development and every update happened on the system. It also includes technical and non-technical descriptions about the business and the software. All the team members participated in building this document on differnet approaches from collectiong data and meets with the client to formatting the document to be on this organized form. This document is written in **Markdown** Language (.md) and that's to ensure readability on virtual platforms i.e. Github. The first release of this document was before the launch of the software so future updates and changes in the document may occur.
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
  connection to wifi is *required* to ensure real-time accurate data and avoid conflicts and misleading non-updated data.
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
  *<blockquote>Deleting the owner results in deleting the property he currently owns, so make sure the property is assigned to the right owner before deletion.</blockquote>*
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