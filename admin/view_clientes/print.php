
<?php
session_start();
if(!isset($_SESSION['idclientes'])){
  header("Location:../../");
}

$idclientes=$_SESSION['idclientes']; 
$idpedido=$_POST['idpedido'];
?>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>    
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">    
    <link rel="stylesheet" href="../../assets/css/style.css">  
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    

<script language="javascript">
function imprimir()
{ 
    if ((navigator.appName == "Netscape")) {
        window.print() ;
       }else{ 
           
    var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
     document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
       }
                  
				  setTimeout("window.location.href='view_pedidos.php'",100);
				 
}
</script>

</head>
<body  onload="imprimir();">
    

<table class="table table-striped" >
                      <thead>
                        <tr>
                          <th>Cliente</th>
                          <th>IDPedido</th>
                          <th>Fecha de Creación</th>                          
                          <th></th>                                                                            
                        </tr>
                      </thead>
                      <tbody>                           
                        <?php 
                          include_once '../pedidos/Classpedidos.php';	
                          $pedidos = new Classpedidos();                                         
                          $pedido = $pedidos->get_listapedidos_print($idclientes,$idpedido);                             
                           while($fil = $pedido->fetchObject()){   
                         ?>
                        <tr>
                          <td><?php echo $fil->razon_social; ?></td>
                          <td>#<?php echo $fil->idpedidos; ?></td>
                          <td><?php echo $fil->fecha; ?></td>
                          <td>                  
                          <table class="table">
                          <thead>
                          <b>
                          <tr>
                          <th></th>
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>UniCost</th>
                          <th>Subtotal</th>
                          </tr>
                       
                          </thead>
                          <tbody>
                          <?php 
                           include_once '../pedidos/Classpedidos.php';	
                           $detalle = new Classpedidos();                                         
                           $deta = $detalle->get_detalle_pedido($fil->idpedidos);                             
                           while($det = $deta->fetchObject()){   
                           ?>
                           <tr>
                           <td></td>
                           <td><?php echo $det->nombre; ?></td>
                           <td><?php echo $det->cantidad; ?></td>
                           <td>$<?php echo $det->costouni; ?></td>
                           <td>$<?php echo $det->subtotal; ?></td>
                           </tr>
                           <?php } ?>
                           <tr>
                           <td colspan="3"></td>
                           <td><b>Total:</b></td>
                           <td><b>$<?php echo $fil->total; ?></b></td>                          
                           </tr>
                           </tbody>
                           </table>             
                          </td>                                                                     
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
</body>                    
</html>