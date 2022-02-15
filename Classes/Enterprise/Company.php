<?php

namespace Classes\Enterprise;

class Company
{

    private $company_Id;
    private $CUIL;
    private $legalName;
    private $address;
    private $contactNumber;
    private $email;
    private $password;
    private $web;
    private $province;
    private $location;
    private $description;
    private $userType;
    private $active; 

    /**
     * Get the value of CUIL
     */
    public function getCUIL()
    {
        return $this->CUIL;
    }

    /**
     * Set the value of CUIL
     */
    public function setCUIL($CUIL): self
    {
        $this->CUIL = $CUIL;

        return $this;
    }

    /**
     * Get the value of legalName
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Set the value of legalName
     */
    public function setLegalName($legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of contactNumber
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set the value of contactNumber
     */
    public function setContactNumber($contactNumber): self
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of web
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set the value of web
     */
    public function setWeb($web): self
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get the value of province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     */
    public function setProvince($province): self
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     */
    public function setLocation($location): self
    {
        $this->location = $location;

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
     * Get the value of userType
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set the value of userType
     */
    public function setUserType($userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get the value of company_Id
     */
    public function getCompanyId()
    {
        return $this->company_Id;
    }

    /**
     * Set the value of company_Id
     */
    public function setCompanyId($company_Id): self
    {
        $this->company_Id = $company_Id;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

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
