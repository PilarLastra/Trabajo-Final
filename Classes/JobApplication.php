<?php

namespace Classes;

/// Atributos

class JobApplication{

    private $jobApplicationId;
    private $jobOfferId;
    private $studentId;
    


    /**
     * Get the value of jobApplicationId
     */
    public function getJobApplicationId()
    {
        return $this->jobApplicationId;
    }

    /**
     * Set the value of jobApplicationId
     */
    public function setJobApplicationId($jobApplicationId): self
    {
        $this->jobApplicationId = $jobApplicationId;

        return $this;
    }

    /**
     * Get the value of jobOfferId
     */
    public function getJobOfferId()
    {
        return $this->jobOfferId;
    }

    /**
     * Set the value of jobOfferId
     */
    public function setJobOfferId($jobOfferId): self
    {
        $this->jobOfferId = $jobOfferId;

        return $this;
    }

    /**
     * Get the value of studentId
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set the value of studentId
     */
    public function setStudentId($studentId): self
    {
        $this->studentId = $studentId;

        return $this;
    }
}
