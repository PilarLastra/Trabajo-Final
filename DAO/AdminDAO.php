<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Classes\Users\Admin;
use DAO\Connection as Connection;
use \Exception as Exception;

class AdminDAO implements IAdminDAO
{
    private $AdminList = array();
    
    private $tableName = "admin";

    public function GetByEmail($email)
    {
        $admin = null;
        try {
            $query = "SELECT * FROM $this->tableName WHERE email like '$email%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
               $admin = $resultSet;
                }
            return $admin;
        } catch (Exception $ex) {

            throw $ex;
        }
    }
    

    public function Add(Admin $admin)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (first_name, last_name, dni, gender, birth_date, email, phone_number) VALUES (:first_name, :last_name, :dni, :gender, :birth_date, :email, :phone_number);";

            $parameters["first_name"] = $admin->getName();
            $parameters["last_name"] = $admin->getLastName();
            $parameters["dni"] = $admin->getDni();
            $parameters["gender"] = $admin->getGender();
            $parameters["birth_date"] = $admin->getBirthDate();
            $parameters["email"] = $admin->getEmail();
            $parameters["phone_number"] = $admin->getPhoneNumber();
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        $adminList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $admin = new Admin();
                $admin->setIdAdmin($row["id"]);
                $admin->setName($row["first_name"]);
                $admin->setLastName($row["last_name"]);
                $admin->setDni($row["dni"]);
                $admin->setGender($row["gender"]);
                $admin->setPhoneNumber($row["phone_number"]);
                $admin->setBirthDate($row["birth_date"]);               
                $admin->setEmail($row["email"]);
                $admin->setUserType($row["user_type"]);



                array_push($adminList, $admin);
            }

            return $adminList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Remove($id){
        try {
            $query = "DELETE FROM $this->tableName WHERE id = $id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
