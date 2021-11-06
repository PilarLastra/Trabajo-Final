<?php

namespace Classes\Enterprise;

/// Atributos

class JobOffer{

    private $jobOfferId;
    private $companyId;
    private $jobPositionId;
    private $studentId;
    private $salary;
    private $hours;
    private $turn;
    private $exp;
    private $lang;
    private $prefLang;
    private $gender;


    /**
     * Get the value of companyId
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set the value of companyId
     */
    public function setCompanyId($companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }

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
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     */
    public function setSalary($salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of hours
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set the value of hours
     */
    public function setHours($hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get the value of turn
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * Set the value of turn
     */
    public function setTurn($turn): self
    {
        $this->turn = $turn;

        return $this;
    }

    /**
     * Get the value of exp
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * Set the value of exp
     */
    public function setExp($exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * Get the value of lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set the value of lang
     */
    public function setLang($lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get the value of prefLang
     */
    public function getPrefLang()
    {
        return $this->prefLang;
    }

    /**
     * Set the value of prefLang
     */
    public function setPrefLang($prefLang): self
    {
        $this->prefLang = $prefLang;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender($gender): self
    {
        $this->gender = $gender;

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
}