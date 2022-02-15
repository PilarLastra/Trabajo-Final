<?php

namespace DAO;


use \Exception as Exception;
use DAO\IJobOfferDAO as IJobOfferDAO;
use Classes\Enterprise\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO
{
    private $jobOfferList = array();

    private $tableName = "jobOffer";

    private $jobApplicationDAO;


    public function Add(JobOffer $jobOffer)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . "(company_Id, job_Position_Id, career_Id, salary, description, turn, experience, language, preference_language, place) VALUES (:company_Id, :job_Position_Id, :career_Id, :salary, :description, :turn, :experience, :language, :preference_language, :place);";


            $parameters["company_Id"] = $jobOffer->getCompanyId();
            $parameters["job_Position_Id"] = $jobOffer->getJobPositionId();
            $parameters["career_Id"] = $jobOffer->getCareerId();
            $parameters["salary"] = $jobOffer->getSalary();
            $parameters["description"] = $jobOffer->getDescription();
            $parameters["turn"] = $jobOffer->getTurn();
            $parameters["experience"] = $jobOffer->getExp();
            $parameters["language"] = $jobOffer->getLang();
            $parameters["preference_language"] = $jobOffer->getPrefLang();
            $parameters["place"] = $jobOffer->getPlace();
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $jobOfferList = array();
        try {

            $query = "SELECT jobOffer.job_Offer_Id, company.company_Id, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id
             JOIN career ON jobOffer.career_Id = career.id";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $jobOffer = new JobOffer();
                $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                $jobOffer->setCompanyId($row["company_Id"]);
                $jobOffer->setCareerId($row["carDes"]);
                $jobOffer->setJobPositionId($row["jobPos"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setDescription($row["description"]);
                $jobOffer->setTurn($row["turn"]);
                $jobOffer->setExp($row["experience"]);
                $jobOffer->setLang($row["language"]);
                $jobOffer->setPrefLang($row["preference_language"]);
                $jobOffer->setPlace($row["place"]);

                array_push($jobOfferList, $jobOffer);
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchById($job_Offer_Id)
    {
        try {
            $query = "SELECT * FROM $this->tableName WHERE job_Offer_Id = $job_Offer_Id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            return $resultSet;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function MatchByCompanyId($id)
    {
        try {
            $query = "SELECT company.legal_name FROM company WHERE company.company_Id = $id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {

                $name = $row['legal_name'];
            }
            return $name;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByName($name)
    {
        try {
            $query = "SELECT company.company_Id FROM company WHERE company.legal_name like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {

                $id = $row['company_Id'];
            }
            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByCareerId($name)
    {
        try {
            $query = "SELECT career.id from career WHERE career.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $id = $row['id'];
            }

            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByJobPos($name)
    {
        try {
            $query = "SELECT jobPosition.job_Position_Id from jobPosition WHERE jobPosition.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $id = $row['job_Position_Id'];
            }

            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByStud($name)
    {
        try {
            $query = "SELECT jobPosition. FROM $this->tableName JOIN jobPosition WHERE jobPosition.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $id = $resultSet;
            }

            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Remove($job_Offer_Id)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE job_Offer_Id = $job_Offer_Id";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify()
    {

        try {
            if ($_POST['puesto'] != "Puesto") {
                $puesto = $this->MatchByJobPos($_POST['puesto']);
                $query = "UPDATE $this->tableName SET job_Position_Id = $puesto WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['salary'] != "Sueldo") {
                $query = "UPDATE $this->tableName SET salary='$_POST[salary]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['career_Id'] != "Carrera") {
                $carrera = $this->MatchByCareerId($_POST['career_Id']);
                $query = "UPDATE $this->tableName SET career_Id =  $carrera WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['description'] != null) {
                $query = "UPDATE $this->tableName SET description='$_POST[description]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['turn'] != "Turno") {
                $query = "UPDATE $this->tableName SET turn='$_POST[turn]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['exp'] != "Experiencia") {
                $query = "UPDATE $this->tableName SET experience='$_POST[exp]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['lang'] != "Idioma Principal") {
                $query = "UPDATE $this->tableName SET language='$_POST[lang]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['pLang'] != "Idioma Secundario") {
                $query = "UPDATE $this->tableName SET preference_language='$_POST[pLang]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['place'] != "Trabajo") {
                $query = "UPDATE $this->tableName SET place='$_POST[place]' WHERE job_Offer_Id = $_POST[job_Offer_Id]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function SearchByParameters($puesto, $carrera)
    {

        $jobOfferList = array();
        if ($puesto != "Puesto" and $carrera != "Carrera") {
            try {

                $puesto = $this->MatchByJobPos($puesto);
                $carrera = $this->MatchByCareerId($carrera);

                $query = "SELECT jobOffer.job_Offer_Id, company.company_Id, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN jobPosition ON jobOffer.job_Position_Id = jobPosition.job_Position_Id
             JOIN career ON jobOffer.career_Id = career.id WHERE jobOffer.job_Position_Id like '$puesto%' AND jobOffer.career_Id like '$carrera%'";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                if ($resultSet != null) {
                    foreach ($resultSet as $row) {
                        $jobOffer = new JobOffer();
                        $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                        $jobOffer->setCompanyId($row["company_Id"]);
                        $jobOffer->setCareerId($row["carDes"]);
                        $jobOffer->setJobPositionId($row["jobPos"]);
                        $jobOffer->setSalary($row["salary"]);
                        $jobOffer->setDescription($row["description"]);
                        $jobOffer->setTurn($row["turn"]);
                        $jobOffer->setExp($row["experience"]);
                        $jobOffer->setLang($row["language"]);
                        $jobOffer->setPrefLang($row["preference_language"]);
                        $jobOffer->setPlace($row["place"]);


                        array_push($jobOfferList, $jobOffer);
                    }
                }

                return $jobOfferList;
            } catch (Exception $ex) {
                throw $ex;
            }
        } else if ($puesto != "Puesto") {
            return $this->SearchByPuesto($puesto);
        } else if ($carrera != "Carrera") {
            return $this->SearchByCarrera($carrera);
        } else {
            return $this->GetAll();
        }
    }

    public function SearchByPuesto($puesto)
    {

        $jobOfferList = array();
        try {
            $id = $this->MatchByJobPos($puesto);
            $query = "SELECT jobOffer.job_Offer_Id, company.company_Id, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
             jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
             JOIN jobPosition ON jobPosition.job_Position_Id = $id
             JOIN company ON jobOffer.company_Id = company.company_Id
             JOIN career ON jobOffer.career_Id = career.id WHERE jobOffer.job_Position_Id =$id";

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);


            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $jobOffer = new JobOffer();
                    $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                    $jobOffer->setCompanyId($row["company_Id"]);
                    $jobOffer->setCareerId($row["carDes"]);
                    $jobOffer->setJobPositionId($row["jobPos"]);
                    $jobOffer->setSalary($row["salary"]);
                    $jobOffer->setDescription($row["description"]);
                    $jobOffer->setTurn($row["turn"]);
                    $jobOffer->setExp($row["experience"]);
                    $jobOffer->setLang($row["language"]);
                    $jobOffer->setPrefLang($row["preference_language"]);
                    $jobOffer->setPlace($row["place"]);


                    array_push($jobOfferList, $jobOffer);
                }
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function SearchByCarrera($carrera)
    {

        $jobOfferList = array();
        try {
            $id = $this->MatchByCareerId($carrera);
            $query = "SELECT jobOffer.job_Offer_Id, company.company_Id, career.description as carDes, jobOffer.career_Id, jobPosition.description as jobPos, 
            jobOffer.salary, jobOffer.description, jobOffer.turn, jobOffer.experience,
            jobOffer.language, jobOffer.preference_language, jobOffer.place FROM $this->tableName 
            JOIN career ON career.id = $id
            JOIN jobPosition ON jobPosition.job_Position_Id = jobOffer.job_Position_Id
            JOIN company ON  company.company_Id = jobOffer.company_Id
             WHERE jobOffer.career_Id =$id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $jobOffer = new JobOffer();
                    $jobOffer->setJobOfferId($row["job_Offer_Id"]);
                    $jobOffer->setCompanyId($row["company_Id"]);
                    $jobOffer->setCareerId($row["carDes"]);
                    $jobOffer->setJobPositionId($row["jobPos"]);
                    $jobOffer->setSalary($row["salary"]);
                    $jobOffer->setDescription($row["description"]);
                    $jobOffer->setTurn($row["turn"]);
                    $jobOffer->setExp($row["experience"]);
                    $jobOffer->setLang($row["language"]);
                    $jobOffer->setPrefLang($row["preference_language"]);
                    $jobOffer->setPlace($row["place"]);


                    array_push($jobOfferList, $jobOffer);
                }
            }

            return $jobOfferList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function SearchByNombre($id)
    {

        $jobOffer = new jobOffer();
        try {
            $query = "SELECT * FROM $this->tableName WHERE job_Offer_Id like '$id%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $jobOffer = $resultSet;
            }

            return $jobOffer;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function End($job_Offer_Id)
    {
        $jobApplicationDAO = new JobApplicationDAO();
        try {

            $query = "SELECT student.email as email, jobOffer.job_Offer_Id as idJobOffer, jobApplication.job_Application_Id as jobAppId
             FROM jobApplication 
             JOIN $this->tableName ON jobOffer.job_Offer_Id = $job_Offer_Id
             JOIN student ON jobApplication.student_Id = student.id WHERE jobApplication.job_Offer_Id = $job_Offer_Id";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    mail($row['email'], "Postulacion", "La postulacion ha finalizado. Gracias por participar", "From: maticapo27@gmail.com");
                    $jobApplicationDAO->Remove($row['jobAppId']);
                    if ($job_Offer_Id != null) {
                        $this->Remove($job_Offer_Id);
                        $job_Offer_Id = null;
                    }
                }
            } else {
                $this->Remove($job_Offer_Id);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function latestId()
    {
        try {
            $query = "SELECT job_Offer_Id FROM jobOffer ORDER BY job_Offer_Id DESC LIMIT 1";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            if ($resultSet != null) {
                $jobOfferId = $resultSet;
                return $jobOfferId;
            }
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function updateImagenId($imagenId, $jobOfferId)
    {
        try {
            $query = "UPDATE $this->tableName SET imagen_Id = $imagenId WHERE job_Offer_Id = $jobOfferId";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
