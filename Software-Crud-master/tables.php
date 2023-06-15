<?php
session_start();

require 'conexion/conexion.php';
include_once("componentes/header.php");
include_once("componentes/navBarVertical.php"); 
include_once("componentes/navBar.php");
$cargo=$_SESSION['user_cargo']; 

?>

                <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            <h2 style="color:black"; class="m-0 font-weight-bold text-success"><p style="color:black";>ESTADO DE TRABAJOS</h2></p>
                            </div>
                           
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                        

                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                 <form method="POST"
                                        class="offset-md-8 navbar-search">
                                        <div class="input-group">
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar trabajo"
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                            <div class="input-group-append">
                                                <button   class="btn btn-warning" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                            
                                        </div>
                                        <br>
                                    </form>
 
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                                        <thead>
                                                            <tr>

                                                                <th><p style="color:black";>Nro.</p></th>
                                                                <th><p style="color:black";>Nombre</p></th>
                                                                <th><p style="color:black";>Documento</p></th>
                                                                <th><p style="color:black";>Telefono</p></th>
                                                                <th><p style="color:black";>Placa</p></th>
                                                                <th><p style="color:black";>Servicio</p></th>
                                                                <th><p style="color:black";>Descripcion</p></th>
                                                                <th><p style="color:black";>Mecanico</p></th>
                                                                <th><p style="color:black";>Estado</p></th>
                                                                <th><p style="color:black";>Observaciones</p></th>
                                                                <th><p style="color:black";>Fecha</p></th>

                                                             

                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                        <?php
                                        
                                        
                                        $queryproducto = pg_query($conexion, "SELECT codigo_prod,nombre_prod,descripcion_prod,nombre_prodo,estado_prod,observacion,telefono FROM productos  INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                          INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                         
                                          ");
                                          
                                          $queryusuario = pg_query($conexion, "SELECT * FROM usuarios");
                                         
                                          
                                         // $queryadministrador = pg_query($conexion, "SELECT * FROM usuarios");
                                        
                                        if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryproducto)){
                                                $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                                INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                               
                                                where nombre1_usu = '$buscar' or codigo_prod = '$buscar' ");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                                $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                                INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                                 where estado_prod='COMPLETADO'
                                                ");
                                             }
                                        $numerofila = 0;
                                        $i=0;
                                        while($mostrar = pg_fetch_array($queryproducto)) 
                                        {    $numerofila++;
                                            
                                           //echo "<br>";
                                            //print_r($mostrar);
                                          // echo "<br>";
                                            
                                            //print_r($nameproveedor1);
                                            //echo "<br>";
                                            $is2="".$mostrar['nombre1_usu'];
                                            $queryusuario1 = $mostrar['nombre1_usu'];
                                            //print_r($nameadministrador1);
                                            //echo "<br>";
                                            echo "<tr>";
                                            
                                            $i++;
                                            ?>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $mostrar['nombre_prodo']; ?></td>
                                             <td><?php echo $mostrar['documento_prod']; ?></td>
                                             <td><?php echo $mostrar['telefono']; ?></td>     
                                             <td><?php echo $mostrar['codigo_prod']; ?></td>   
                                            <td><?php echo $mostrar['nombre_prod']; ?></td>
                                            <td><?php echo $mostrar['descripcion_prod']; ?></td>
                                            <td><?php echo $queryusuario1; ?></td>
                                            <td><?php echo $mostrar['estado_prod']; ?></td>
                                            <td><?php echo $mostrar['observacion']; ?></td>
                                            <td><?php echo $mostrar['fecha']; ?></td>
                                            
                                        </td>

                    <!-- Modal actualizar empleado-->
                    <div class="modal fade" id="formActulizar<?php echo $mostrar['codigo_prod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formActulizarTitle">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/modificar.php" method="POST" role="form">
                                                

                                                <div class="form-group">
                                                    <label for="inputCod">Documento</label>
                                                    <input type="text" class="form-control" id="cod" name="txtdocumento" value="<?php echo $mostrar['documento_prod']; ?>" placeholder="Ingrese documento" required="" readonly/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputCod">Placa</label>
                                                    <input type="text" class="form-control" id="cod" name="txtcodigo" value="<?php echo $mostrar['codigo_prod']; ?>" placeholder="Ingrese placa" required="" readonly/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Cliente</label>
                                                    <input type="text" class="form-control" id="nombre"  name="txtnamecli" value="<?php echo $mostrar['nombre_prodo'];?>"  placeholder="Ingrese nombre del cliente"/>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label for="inputCod">Telefono</label>
                                                    <input type="number" class="form-control" id="telefono" name="txttelefono" value="<?php echo $mostrar['telefono']; ?>" placeholder="Ingrese el telefono del cliente"/>
                                                </div>

                                               
                                                <div class="form-group">
                                                    <label for="inputNom">Servicio</label>
                                                    <input type="text" class="form-control" id="nombre"  name="txtnombre" value="<?php echo $mostrar['nombre_prod'];?>"  placeholder="Ingrese el servicio a realizar"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Descripcion </label>
                                                    <input type="text" class="form-control" id="descripcion"  name="txtdescripcion" value="<?php echo $mostrar['descripcion_prod']; ?>" placeholder="Ingrese una descripcion " required=""/>
                                                </div>
                                                <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="estado" id="id_prov">
                                            <option value="PENDIENTE">PENDIENTE</option>
                                            <option value="EN PROCESO">EN PROCESO</option>
                                            
                                        </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Actualizar" onClick="javascript: return confirm('¿Deseas actualizar este empleado?');">
                                       </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- finModal -->


                                          <?php
                                            /*echo "<td style='width:26%'><a data-toggle=modal data-target=#formModal2 cod=$mostrar[cod_producto]\">dd</a> | <a href=\"modal/eliminar.php?cod=$mostrar[cod_producto]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>"; */          
                                            
                                        }
                                         
                                        ?>
                                    

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                </div>

                       

            </div>
            <!-- End of Main Content -->


            <?php include_once("componentes/footer.php");?>