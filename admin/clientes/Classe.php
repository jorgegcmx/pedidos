<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idclientes;
    private $email_cliente;
    private $contrasena_cliente;
    private $telefono;
    private $direccion;
    private $pais;
    private $estado;
    private $municipio;
    private $rfc;
    private $razon_social;
    private $idusuarios_admin;


    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_clientes($id, $email_cliente, $contrasena_cliente, $telefono, $direccion, $pais, $estado, $municipio, $rfc,$razon_social,$idusuarios_admin)
    {
        $this->idclientes = $id;
        $this->email_cliente = $email_cliente;
        $this->contrasena_cliente = $contrasena_cliente;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->pais = $pais;
        $this->estado = $estado;
        $this->municipio = $municipio;
        $this->rfc = $rfc;
        $this->razon_social = $razon_social;
        $this->idusuarios_admin = $idusuarios_admin;
        

    }

    public function get_clientes($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM clientes";

            if ($idadmin != null) {
                $sql .= " WHERE idusuarios_admin = ?";
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

    public function get_clientes_filtro($idusuarios,$razon_social)
    {
        try
        {
            $sql = "SELECT * FROM clientes  WHERE razon_social like '%$norazon_socialmbre%' ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);          
          
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }


    public function add_clientes()
    {
        try {
            if ($this->idclientes == null) {

                $sql = "INSERT INTO clientes VALUES(0,?,?,?,?,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  clientes"
                    . " SET email_cliente = ?,"
                    . " contrasena_cliente = ?,"
                    . " telefono = ?,"
                    . " direccion = ?,"
                    . " pais = ?,"
                    . " estado = ?,"
                    . " municipio= ?,"
                    . " rfc= ?,"
                    . " razon_social=?,"
                    . " idusuarios_admin=?"
                    . " WHERE idclientes =?";
            }
          
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->email_cliente);
            $consulta->bindparam(2, $this->contrasena_cliente);
            $consulta->bindparam(3, $this->telefono);
            $consulta->bindparam(4, $this->direccion);
            $consulta->bindparam(5, $this->pais);
            $consulta->bindparam(6, $this->estado);
            $consulta->bindparam(7, $this->municipio);
            $consulta->bindparam(8, $this->rfc);
            $consulta->bindparam(9, $this->razon_social);
            $consulta->bindparam(10, $this->idusuarios_admin);

            if ($this->idclientes != null) {
                $consulta->bindparam(11, $this->idclientes);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_articulo($id)
    {
        try {
            $sql = "DELETE FROM clientes WHERE idclientes = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function get_categorias($idusuarios)
    {
        try
        {
            $sql = "SELECT * FROM categorias WHERE idusuarios=?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);

            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            }
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

} //cierra clase
