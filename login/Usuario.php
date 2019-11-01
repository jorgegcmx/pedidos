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

    public function login_user($email, $contrasena_cliente)
    {
        try {
            $sql = "SELECT * FROM  clientes
             INNER JOIN usuarios on usuarios.idusuarios=clientes.idusuarios_admin
             WHERE email_cliente = ? AND contrasena_cliente = ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $email);
            $consulta->bindParam(2, $contrasena_cliente);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {
                $fila = $consulta->fetch();
                $_SESSION['idclientes'] = $fila['idclientes'];
                $_SESSION['email_cliente'] = $fila['email_cliente'];
                $_SESSION['idusuarios_admin'] = $fila['idusuarios_admin'];             

                return true;
            } else {
                return false;

            }
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage();
        }
    }

}
