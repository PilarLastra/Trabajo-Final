<?php

namespace Classes\Users;

/// Atributos

class Student extends Person
{
    private $studentId;
    private $careerId;
    private $fileNumber;
    private $active;

    /**
     * Get the value of fileNumber
     */
    public function getFileNumber()
    {
        return $this->fileNumber;
    }

    /**
     * Set the value of fileNumber
     */
    public function setFileNumber($fileNumber): self
    {
        $this->fileNumber = $fileNumber;

        return $this;
    }

    /**
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     */
    public function setActive($active): self
    {
        $this->active = $active;

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
}
