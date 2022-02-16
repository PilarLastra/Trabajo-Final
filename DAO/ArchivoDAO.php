<?php

namespace DAO;

use DAO\Connection as Connection;
use \Exception as Exception;
use FPDF;

class ArchivoDAO {

    public function UploadPdf(){
        
        if(is_uploaded_file($_FILES['fichero']['tmp_name'])){
            $ruta="upload/";
            $nombreFinal=trim($_FILES['fichero']['name']);
            $nombreFinal=mb_ereg_replace(" ","",$nombreFinal);
            $upload = $ruta . $nombreFinal;
            if(move_uploaded_file($_FILES['fichero']['tmp_name'],$upload)){
            }
            $query = "INSERT INTO archivos (name, description, ruta, tipo, size, idStudent) VALUES (:name, :description, :ruta, :tipo, :size, :idStudent)";
            $this->connection = Connection::GetInstance();
            $parameters["name"] = "CV";
            $parameters["description"] = "CV APPPLICANT";
            $parameters["ruta"] = $_FILES['fichero']['name'];
            $parameters["tipo"] = $_FILES['fichero']['type'];
            $parameters["size"] = $_FILES['fichero']['size'];
            $parameters["idStudent"] = $_SESSION["loggedUser"]->getStudentId();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
    }

    public function DownloadCv($cvId){
        try{

        $query ="SELECT * from archivos where idArchivo = $cvId";

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        if($resultSet != null){
            return $resultSet;
                 }
            }
    catch(Exception $ex) {
        throw $ex;
    }
}
  

    public function latestId (){
        try {
            $query = "SELECT idArchivo FROM archivos ORDER BY idArchivo DESC LIMIT 1";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
               $cvId = $resultSet;
               return $cvId;
                }
        } catch (Exception $ex) {

            throw $ex;
        }
    }

}
