<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idusuarios;
    private $email;
    private $contrasena;
    private $fecha;
    private $estatus;
    private $ruta_sitio_web;
    private $estado;
   


    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_usuarios($id, $email, $contrasena, $fecha, $estatus, $ruta_sitio_web, $estado)
    {
        $this->idusuarios = $id;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->fecha = $fecha;
        $this->estatus = $estatus;
        $this->ruta_sitio_web = $ruta_sitio_web;
        $this->estado = $estado;        

    }

    

    public function add_usuarios()
    {
        try {
            if ($this->idusuarios == null) {

                $sql = "INSERT INTO usuarios VALUES(0,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  usuarios"
                    . " SET email = ?,"
                    . " contrasena = ?,"
                    . " fecha = ?,"
                    . " estatus = ?,"
                    . " ruta_sitio_web = ?,"
                    . " estado = ?"                  
                    . " WHERE idusuarios =?";
            }
          
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->email);
            $consulta->bindparam(2, $this->contrasena);
            $consulta->bindparam(3, $this->fecha);
            $consulta->bindparam(4, $this->estatus);
            $consulta->bindparam(5, $this->ruta_sitio_web);
            $consulta->bindparam(6, $this->estado);          

            if ($this->idusuarios != null) {
                $consulta->bindparam(7, $this->idusuarios);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function comprobar($email)
    {
        try {
            $sql = "SELECT * FROM  usuarios WHERE email= ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $email);           
            $consulta->execute();
            if ($consulta->rowCount() == 1) {
                return true;

            } else {
                return false;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }
} 
