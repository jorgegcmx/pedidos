<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idcategorias;
    private $nombre;
    private $idusuarios;
   

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_categorias($id, $nombre, $idusuarios)
    {
        $this->idcategorias = $id;
        $this->nombre = $nombre;
        $this->idusuarios = $idusuarios;
   }

    public function get_categorias($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM categorias";

            if ($idadmin != null) {
                $sql .= " WHERE idusuarios = ?";
            }

            $consulta = $this->con->prepare($sql);
            if ($idadmin != null) {
                $consulta->bindParam(1, $idadmin);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } 
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

   


    public function add_categorias()
    {
        try {
            if ($this->idcategorias == null) {

                $sql = "INSERT INTO categorias VALUES(0,?,?)";

            } else {
                $sql = "UPDATE  categorias"
                    . " SET nombre = ?,"
                    . " idusuarios = ?"                  
                    . " WHERE idcategorias =?";
            }
          
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->nombre);
            $consulta->bindparam(2, $this->idusuarios);           

            if ($this->idcategorias != null) {
                $consulta->bindparam(3, $this->idcategorias);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }



    public function del_categorias($id)
    {
        try {
            $sql = "DELETE FROM categorias WHERE idcategorias = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

    

} //cierra clase
