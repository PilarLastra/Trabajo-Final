<?php

namespace Classes\Enterprise;

/// Atributos

class JobPosition{

    private $jobPositionId;
    private $careerId;
    private $description;

    /**
     * Get the value of jobPositionId
     */
    public function getJobPositionId()
    {
        return $this->jobPositionId;
    }

    /**
     * Set the value of jobPositionId
     */
    public function setJobPositionId($jobPositionId): self
    {
        $this->jobPositionId = $jobPositionId;

        return $this;
    }

    /**
     * Get the value of careerId
     */
    public function getCareerId()
    {
        return $this->careerId;
    }

    /**
     * Set the value of careerId
     */
    public function setCareerId($careerId): self
    {
        $this->careerId = $careerId;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }
}