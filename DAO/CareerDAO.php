<?php

namespace DAO;


use \Exception as Exception;
use DAO\ICareerDAO as ICareerDAO;
use Classes\Career as Career;
use DAO\Connection as Connection;

class CareerDAO implements ICareerDAO
{
    private $careerList = array();
    
    private $tableName = "career";


    public function Add(Career $career)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (id, description, active) VALUES (:id, :description, :active);";

            
            $parameters["id"] = $career->getCareerId();
            $parameters["description"] = $career->getDescription();
            $parameters["active"] = $career->getActive();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $careerList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $career = new Career();
                $career->setCareerId($row["id"]);
                $career->setDescription($row["description"]);
                $career->setActive($row["active"]);

                array_push($careerList, $career);
            }

            return $careerList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function Remove($id)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE id = $id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function SearchByNombre($nombre)
    {

        $career = new Career();
        try {
            $query = "SELECT * FROM $this->tableName WHERE description like '$nombre%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                
                    $career = $resultSet;
            }

            return $career;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    
}
