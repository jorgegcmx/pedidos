<?php
require_once '../admin/conexion/Conexion.php';
class Usuario
{
    private static $instancia;
    private $con;
    private $idclientes;
    private $email;
    private $contrasena_cliente;
   

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_user($id, $email, $contrasena_cliente)
    {
        $this->idclientes = $id;
        $this->email = $email;
        $this->$contrasena_cliente = $contrasena_cliente;
       
    }

    public function login_user($email, $contrasena)
    {
        try {
            $sql = "SELECT * FROM  usuarios 
             WHERE email = ? AND contrasena = ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $email);
            $consulta->bindParam(2, $contrasena);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {
                $fila = $consulta->fetch();
                $_SESSION['idusuarios'] = $fila['idusuarios'];
                $_SESSION['email'] = $fila['email'];
                $_SESSION['ruta_sitio_web'] = $fila['ruta_sitio_web'];                

                return true;
            } else {
                return false;

            }
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage();
        }
    }

}
