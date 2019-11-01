<?php
require_once '../conexion/Conexion.php';
class Class_profile
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

   


    public function get_clientes_perfil($idclientes)
    {
        try
        {
            $sql = "SELECT * FROM clientes  WHERE idclientes = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idclientes);          
          
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
} //cierra clase
