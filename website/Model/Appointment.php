<?php

class Appointment
{
    // Properties from UML
    protected DateTime $date;
    protected SystemUser $broker;
    protected ExternalUser $client;
    protected Property $property;
    protected string $location;
    protected DateTime $scheduledTime;
    protected string $status;

    /**
     * Appointment constructor.
     */
    public function __construct(
        DateTime $date,
        SystemUser $broker,
        ExternalUser $client,
        Property $property,
        string $location,
        DateTime $scheduledTime,
        string $status
    ) {
        $this->date = $date;
        $this->broker = $broker;
        $this->client = $client;
        $this->property = $property;
        $this->location = $location;
        $this->scheduledTime = $scheduledTime;
        $this->status = $status;
    }

    // Getters and Setters

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getBroker(): SystemUser
    {
        return $this->broker;
    }

    public function setBroker(SystemUser $broker): self
    {
        $this->broker = $broker;
        return $this;
    }

    public function getClient(): ExternalUser
    {
        return $this->client;
    }

    public function setClient(ExternalUser $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): self
    {
        $this->property = $property;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getScheduledTime(): DateTime
    {
        return $this->scheduledTime;
    }

    public function setScheduledTime(DateTime $scheduledTime): self
    {
        $this->scheduledTime = $scheduledTime;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Schedule a new visit: marks as scheduled 
     */
    public function scheduleVisit(): void
    {
        $this->status = 'scheduled';
        
    }

    /**
     * Reschedule an existing visit: updates time, status
     */
    public function rescheduleVisit(DateTime $newTime): void
    {
        $this->scheduledTime = $newTime;
        $this->status = 'rescheduled';
        
    }

  
    public function cancelVisit(string $reason = null): void
    {
        $this->status = 'cancelled';
        
    }

    /**
     * Assign this appointment to a specific broker.
     */
    public function assignToSystemUser(SystemUser $broker): void
    {
        $this->broker = $broker;
        
    }
}
