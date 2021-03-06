<?php

namespace Classes;

/// Atributos

class Career{

    private $careerId;
    private $description;
    private $active;


    

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
}