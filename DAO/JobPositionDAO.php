<?php

namespace DAO;


use \Exception as Exception;
use DAO\IJobPositionDAO as IJobPositionDAO;
use Classes\Enterprise\JobPosition as JobPosition;
use DAO\Connection as Connection;

class JobPositionDAO implements IJobPositionDAO
{
    private $jobPositionList = array();
    
    private $tableName = "jobPosition";


    public function Add(JobPosition $jobPosition)
    { 
        try {
            $query = "INSERT INTO " . $this->tableName . " (job_Position_Id, career_Id, description) VALUES (:job_Position_Id, :career_Id, :description);";

            $parameters["job_Position_Id"] = $jobPosition->getJobPositionId();
            $parameters["career_Id"] = $jobPosition->getCareerId();
            $parameters["description"] = $jobPosition->getDescription();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $jobPositionList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $jobPosition = new JobPosition();
                $jobPosition->setCareerId($row["career_Id"]);
                $jobPosition->setJobPositionId($row["job_Position_Id"]);
                $jobPosition->setDescription($row["description"]);

                array_push($jobPositionList, $jobPosition);
            }

            return $jobPositionList;
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

        $jobPosition = new JobPosition();
        try {
            $query = "SELECT * FROM $this->tableName WHERE description like '$nombre%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $jobPosition = $resultSet;

                }
        
            return $jobPosition;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
