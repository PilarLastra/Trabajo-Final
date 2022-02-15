<?php

namespace DAO;


use \Exception as Exception;
use DAO\ICompanyDAO as ICompanyDAO;
use Classes\Enterprise\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements ICompanyDAO
{
    private $companyList = array();
    
    private $tableName = "company";


    public function Add(Company $company)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (cuil, legal_name, address, contact_number, email, password, web_Page, province, location, description, active) VALUES (:cuil, :legal_name, :address, :contact_number, :email, :password, :web_Page, :province, :location, :description, :active);";

            
            $parameters["cuil"] = $company->getcuil();
            $parameters["legal_name"] = $company->getLegalName();
            $parameters["address"] = $company->getAddress();
            $parameters["contact_number"] = $company->getContactNumber();
            $parameters["email"] = $company->getEmail();
            $parameters["password"] = $company ->getPassword();
            $parameters["web_Page"] = $company->getWeb();
            $parameters["province"] = $company->getProvince();
            $parameters["location"] = $company->getLocation();
            $parameters["description"] = $company->getDescription();
            $parameters["active"] = $company->getActive();



            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }



    public function GetAll()
    {
        $companyList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $company = new Company();
                $company->setCompanyId($row["company_Id"]);
                $company->setLegalName($row["legal_name"]);
                $company->setContactNumber($row["contact_number"]);
                $company->setAddress($row["address"]);
                $company->setcuil($row["cuil"]);
                $company->setEmail($row["email"]);
                $company->setPassword($row["password"]);
                $company->setWeb($row["web_Page"]);
                $company->setProvince($row["province"]);
                $company->setLocation($row["location"]);
                $company->setDescription($row["description"]);
                $company->setUserType($row["user_Type"]);
                $company->setActive($row["active"]);



                array_push($companyList, $company);
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function Remove($cuil)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE cuil = $cuil";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Validar($cuil)
    {
        try {
            $query = "UPDATE $this->tableName SET active ='si' WHERE cuil = $cuil";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify()
    {

        try {
            if ($_POST['address']) {
                $query = "UPDATE $this->tableName SET address='$_POST[address]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['contactNumber']) {
                $query = "UPDATE $this->tableName SET contact_number='$_POST[contactNumber]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['email']) {
                $query = "UPDATE $this->tableName SET email='$_POST[email]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['password']) {
                $query = "UPDATE $this->tableName SET password='$_POST[password]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['web_Page']) {
                $query = "UPDATE $this->tableName SET web_Page='$_POST[web_Page]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['description']) {
                $query = "UPDATE $this->tableName SET description='$_POST[description]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['active']) {
                $query = "UPDATE $this->tableName SET active='$_POST[active]' WHERE cuil = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function SearchByNombre($nombre)
    {

        $companyList = array();
        try {
            $query = "SELECT * FROM $this->tableName WHERE legal_name like '$nombre%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $company = new Company();
                    $company->setCompanyId($row["company_Id"]);
                    $company->setLegalName($row["legal_name"]);
                    $company->setContactNumber($row["contact_number"]);
                    $company->setAddress($row["address"]);
                    $company->setcuil($row["cuil"]);
                    $company->setEmail($row["email"]);
                    $company->setPassword($row["password"]);
                    $company->setWeb($row["web_Page"]);
                    $company->setProvince($row["province"]);
                    $company->setLocation($row["location"]);
                    $company->setDescription($row["description"]);
                    $company->setActive($row["active"]);
                    $company->setUserType($row["user_Type"]);



                    array_push($companyList, $company);
                }
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function SearchById($id)
    {

        try {
            $query = "SELECT * FROM $this->tableName WHERE company_Id = $id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $company = new Company();
                    $company->setCompanyId($row["company_Id"]);
                    $company->setLegalName($row["legal_name"]);
                    $company->setContactNumber($row["contact_number"]);
                    $company->setAddress($row["address"]);
                    $company->setcuil($row["cuil"]);
                    $company->setEmail($row["email"]);
                    $company->setPassword($row["password"]);
                    $company->setWeb($row["web_Page"]);
                    $company->setProvince($row["province"]);
                    $company->setLocation($row["location"]);
                    $company->setDescription($row["description"]);
                    $company->setUserType($row["user_Type"]);
                    $company->setActive($row["active"]);



                
                }
            }

            return $company;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
