<?php
require_once '../conexion/Conexion.php';
class Classpedidos
{
    private static $instancia;
    private $con;
    private $idpedidos;
    private $fecha;
    private $total;
    private $ididcliente;
    private $status;
    /************************************/
    private $iddetalle_pedidos;
    private $idarticulo;
    private $cantidad;
    private $subtotal;
    private $costouni;
    private $idpedido;
    private $comentario;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_pedidos($id, $fecha, $total, $idcliente, $status)
    {
        $this->idpedidos = $id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->idcliente = $idcliente;
        $this->status = $status;

    }

    public function add_pedidos()
    {
        try {

            $sql = "INSERT INTO pedidos VALUES(0,?,?,?,?)";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->fecha);
            $consulta->bindparam(2, $this->total);
            $consulta->bindparam(3, $this->idcliente);
            $consulta->bindparam(4, $this->status);

            if ($this->idpedidos != null) {
                $consulta->bindparam(5, $this->idpedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function get_pedido($idcliente)
    {
        try
        {
            $sql = "SELECT max(idpedidos) as id FROM pedidos where idcliente =?  ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_listapedidos($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and status<>'RC' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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
    public function get_listapedidos_completados($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and status='RC' order by idpedidos DESC";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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

    public function get_detalle_pedido($idpedido)
    {
        try
        {
            $sql = "SELECT * FROM detalle_pedidos inner join articulos on articulos.idarticulos=detalle_pedidos.idarticulo
            WHERE idpedido =? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idpedido);

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

    public function get_listapedidos_print($idcliente, $idpedidos)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                    WHERE idcliente =? and idpedidos=? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $idpedidos);

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

    public function get_print($id)
    {
        try
        {
            $sql = " select * FROM detalle
                    join productos on productos.idproductos=detalle.productos_idproductos
                    where pedidos_idpedidos = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);

            $consulta->execute();

            if ($consulta->rowCount() == 1) {

                return $consulta;

            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function del_v($id)
    {
        try {
            $sql = "DELETE FROM pedidos WHERE idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function del_detalle($id)
    {
        try {
            $sql = "DELETE FROM detalle WHERE pedidos_idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

    /*********************************************************************DESTALLE PEDIDOS********************************/
    public function set_detalle_pedidos($id, $idarticulo, $cantidad, $subtotal, $costouni, $idpedido, $comentario)
    {
        $this->iddetalle_pedidos = $id;
        $this->idarticulo = $idarticulo;
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
        $this->costouni = $costouni;
        $this->idpedido = $idpedido;
        $this->comentario = $comentario;

    }

    public function add_detalle_pedidos()
    {
        try {

            $sql = "INSERT INTO detalle_pedidos VALUES(0,?,?,?,?,?,?)";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->idarticulo);
            $consulta->bindparam(2, $this->cantidad);
            $consulta->bindparam(3, $this->subtotal);
            $consulta->bindparam(4, $this->costouni);
            $consulta->bindparam(5, $this->idpedido);
            $consulta->bindparam(6, $this->comentario);

            if ($this->iddetalle_pedidos != null) {
                $consulta->bindparam(7, $this->iddetalle_pedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

/*********************************************************************CIERRE DESTALLE PEDIDOS********************************/
/**********************************FUNCION DONDE MUESTRA LOS PEDIDOS A USUARIO ADMINISTRADOR*************/
    public function get_listapedidos_admin($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                WHERE idusuarios_admin =? and status<>'RC' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);

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

    public function get_listapedidos_admin_complatados($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                WHERE idusuarios_admin =? and status='RC' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);

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
/**********************************FUNCION DONDE MUESTRA LOS PEDIDOS A USUARIO ADMINISTRADOR IMPRIMIR*************/
    public function get_listapedidos_admin_id($idadmin, $idpedidos)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                 WHERE idusuarios_admin =? and idpedidos=? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);
            $consulta->bindParam(2, $idpedidos);

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

/*********************************************************************Actualiza Status del Pedido********************************/

    public function set_pedidos_update_status($id, $status)
    {
        $this->idpedidos = $id;
        $this->status = $status;

    }

    public function add_pedidos_update_status()
    {
        try {
            if ($this->idpedidos != null) {

                $sql = "UPDATE  pedidos"
                    . " SET status = ?"
                    . " WHERE idpedidos =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->status);

            if ($this->idpedidos != null) {
                $consulta->bindparam(2, $this->idpedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_pedidos($id)
    {
        try {
            $sql = "DELETE FROM pedidos WHERE idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

/**************************cambios */
    private $pedido_id;

    public function set_pedidos_update_status_cambio($id, $iddetalle, $status)
    {
        $this->pedido_id = $id;
        $this->iddetalle = $iddetalle;
        $this->status = $status;

    }
    public function add_pedidos_update_cambio()
    {
        try {
            if ($this->pedido_id != null) {

                $sql = "UPDATE cambios"
                    . " SET iddetalle = ?,"
                    . " status  = ?"
                    . " WHERE pedido_id =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->iddetalle);
            $consulta->bindparam(2, $this->status);

            if ($this->pedido_id != null) {
                $consulta->bindparam(3, $this->pedido_id);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function get_cambio_nuevo_pedido($iddetalle)
    {
        try
        {
            $sql = "SELECT * FROM cambios
            inner join pedidos
            on pedidos.idpedidos=cambios.pedido_id
            inner join articulos
            on articulos.idarticulos=cambios.articulo_id WHERE iddetalle =? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $iddetalle);

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
} //fin de la clase
