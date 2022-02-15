<?php

namespace Classes\Users;

/// Atributos

class Admin extends Person
{
    private $idAdmin;

    /**
     * Get the value of idAdmin
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set the value of idAdmin
     */
    public function setIdAdmin($idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }
}

/// Getters y Setters
