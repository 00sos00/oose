# 9. Operational Scenarios

This section describes different  scenarios for how the broker system will work in different situations. Each scenario is presented in both use case and script  .

---
## Use Case 1 – A customer buys a property
*ID:* MBS-001  
*Title:* Buying a property  
*Actors:*  Customer ,Broker, Owner  
*Required:* The customer is registered and has selected a property.  
*Description:* Once the customer has chosen a property, the broker works with the owner to process the purchase request. The broker schedules a meeting and follows all necessary .  
*Result:* The purchase is confirmed and recorded in the system.
<!-- el owner hena = someone wants to sell his property-->

### Script
| Step | Action                               | Agent        |
|------|--------------------------------------|--------------|
| 1    | Broker reviews and selects the property | Broker       |
| 2    | Broker starts the purchase request   | Broker       |
| 3    | A meeting is scheduled with the owner | Broker       |
| 4    | Broker ensures the owner accepts and attends the meeting | Broker |
| 5    | The owner attends the meeting and agrees | Owner        |
| 6    | Broker manages the signing of the digital agreement | Broker |
| 7    | Broker records the transaction           | Broker       |
| 8    |  The system sent the confirmation.      | System       |


---

## Use Case 2 – Client Rents a Property

*ID:* MBS-002  
*Title:* Property Rental  
*Actors:* Customer, Broker, Owner  
*Required:* The unit is available for rent.  
*Description:* The client selects a rental property, deals with the owner through a broker, and signs a digital rental contract.  
*Rrsult* The rental agreement is saved, and follow-up notifications are scheduled.
<!-- el owner hena = someone wants to sell his property-->

### Script

| Step | Action                                  | Agent        |
|------|-----------------------------------------|--------------|
| 1    |   Broker selects available rental properties for the client  | Broker       |
| 2    | Broker reviews details  and price | Broker    |
| 3    | Broker arranges rental request and schedules a meeting | Broker |
| 4    | Broker contacts the owner to confirm agreement | Broker |
| 5    | Broker prepares the digital rental contract | Broker    |
| 6    | Broker ensures that both client and owner sign the agreement| Broker |
| 7    | System stores the agreements             | System       |
| 8    | System sends rent reminders             | System       |


---

## Use Case 3 – Owner (Admin) Registers a New Property

*ID:* MBS-003  
*Title:* Property Registration  
*Actors:* Owner, Broker (employee)
*Required:* The owner or broker(employee) records the data and ditails of property in the sysytem.  
*Description:* The owner or broker submits property details and required documents, which are reviewed by the broker .  
*Result:* The property appears in search results.

### Script

| Step | Action                                                              | Agent         |
|------|---------------------------------------------------------------------|---------------|
| 1    | Owner or employee logs in to the platform                           | Owner/Employee|
| 2    | Fill in property information                                        | Owner/Employee|
| 3    | Upload documents that include information about the property        | Owner         |
| 4    | Broker makes the list of properties                          | Broker        |
| 5    | Property becomes available for rent or sale                        | System        |


## Use Case 4 – Maintenance and Follow-up for Rented Unit

*ID:* MBS-004  
*Title:* Rental Maintenance  
*Actors:* Client, Broker, Owner  
*Required:* Problems are reported once the property is rented

*Description:* The broker works with the owner to resolve maintenance issues that are reported by the client .  
*Result:* Issues are resolved and tracked.

### Script

| Step | Action                                          | Agent        |
|------|-------------------------------------------------|--------------|
| 1    | Client calls or reports the problem             | Client       |
| 2    | Broker reviews the issue and contacts the owner | Broker       |
| 3    | Owner tries to solve the problem                | Owner        |
| 4    | Broker confirms the issue resolution with client| Broker       |
| 5    | Broker marks the issue as resolved              | Broker       |
<!-- i don't know if i should to make use case 5 , it will be about rating-->