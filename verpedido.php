<?php
include "./php/conexion.php";
if(!isset($_GET['id_venta'])){
    header("Location: ./");
}
$datos = $conexion->query("select
ventas.*,
usuario.nombre,usuario.telefono,usuario.email
from ventas
inner join usuario on ventas.id_usuario = usuario.id
where ventas.id=".$_GET['id_venta'])or die($conexion->error);
$datosUsuario = mysqli_fetch_row($datos);
$datos2 = $conexion->query("select * from envios where id_venta=".$_GET['id_venta'])or die($conexion->error);
// Modify the query to use the correct column name for the foreign key
$datosEnvio= mysqli_fetch_row($datos2);

$datos3= $conexion->query("select productos_venta.*,
                          productos.nombre as nombre_producto, productos.imagen
                          from productos_venta inner join productos on productos_venta.id_producto = productos.id
                          where id_venta =".$_GET['id_venta'])or die($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>QUE ESShoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Datos personales</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Venta #<?php  echo $_GET['id_venta'];?></label> 
                         </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Nombre <?php  echo $datosUsuario[4];?></label> 
                           </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Email <?php  echo $datosUsuario[6];?></label> 
                           </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Telefono <?php  echo $datosUsuario[5];?></label> 
                           </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Company <?php  echo $datosEnvio[2];?></label> 
                           </div>
                </div>
                 </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Direccion <?php  echo $datosEnvio[3];?></label> 
                           </div>
                </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">Estado <?php  echo $datosEnvio[4];?></label> 
                           </div>
                </div>
                </div>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                     <div class="col-md-12">
                         <label for="c_fname" class="text-black">CP <?php  echo $datosEnvio[5];?></label> 
                           </div>
                </div>
                
        
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <?php
            while($f = mysqli_fetch_array($datos3)){

            ?>
            <div class="p-4 border mb-3">
                <img src="./images/<?php echo $f['imagen'];?>" width="50px"/> 

                <span class="d-block text-primary h6 text-uppercase"><?php echo $f['nombre_producto'];?></span><br>
              <span class="d-block text-primary h6 text-uppercase">Cantidad:<?php echo $f['cantidad'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Precio:<?php echo $f['precio'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Subtotal:<?php echo $f['subtotal'];?></span>
            </div>
           <?php } ?>
        <h4>Total:<?php echo $datosUsuario[2];?></h4>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>