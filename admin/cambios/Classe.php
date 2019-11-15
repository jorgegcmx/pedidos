<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idcambios;
    private $pedido_id;
    private $articulo_id;

    private $iddetalle;
    private $cantidad;
    private $unicost;
    private $cambio_subtotal;
    private $status;
    

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_cambio($idcambios, $pedido_id, $articulo_id, $iddetalle, $cantidad, $unicost, $cambio_subtotal, $status)
    {
        $this->idcambios = $id;
        $this->pedido_id = $pedido_id;
        $this->articulo_id = $articulo_id;

        $this->iddetalle = $iddetalle;
        $this->cantidad = $cantidad;
        $this->unicost = $unicost;
        $this->cambio_subtotal = $cambio_subtotal;
        $this->status = $status;
        
   }

    public function get_cambios($idcliente)
    {
        try
        {
            $sql = "SELECT *,cambios.status as sta FROM cambios 
            inner join pedidos
            on pedidos.idpedidos=cambios.pedido_id
            inner join articulos
            on articulos.idarticulos=cambios.articulo_id";

            if ($idcliente != null) {
                $sql .= " WHERE pedido_id = ?";
            }

            $consulta = $this->con->prepare($sql);
            if ($idcliente != null) {
                $consulta->bindParam(1, $idcliente);
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

   


    public function add_cambio()
    {
        try {
            if ($this->idcambios == null) {

                $sql = "INSERT INTO cambios VALUES(0,?,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  cambios"
                    . " SET pedido_id = ?,"
                    . " articulo_id = ?," 
                    . " iddetalle = ?,"  
                    . " cantidad = ?,"  
                    . " unicost = ?,"  
                    . " cambio_subtotal = ?,"
                    . " status = ?"                   
                    . " WHERE idcambios =?";
            }
          
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->pedido_id);
            $consulta->bindparam(2, $this->articulo_id);
            $consulta->bindparam(3, $this->iddetalle);
            $consulta->bindparam(4, $this->cantidad);
            $consulta->bindparam(5, $this->unicost);
            $consulta->bindparam(6, $this->cambio_subtotal);
            $consulta->bindparam(7, $this->status);
                   

            if ($this->idcambios != null) {
                $consulta->bindparam(8, $this->idcambios);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }




    public function del_cambio($id)
    {
        try {
            $sql = "DELETE FROM cambios WHERE idcambios = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }    

} //cierra clase
