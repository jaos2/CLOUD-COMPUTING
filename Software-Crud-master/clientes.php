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
            <div class="d-flex justify-content-center">
            <h2 style="color:black"; class="m-0 font-weight-bold text-success"><p style="color:black";>LISTADO DE CLIENTES</h2></p></div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            
                            </div>
                            <div class="float-sm-right">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">Añadir clientes</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                        

                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                 <form method="POST"
                                        class="offset-md-8 navbar-search">
                                        <div class="input-group">
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar Cliente"
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                            <div class="input-group-append">
                                                <button   class="btn btn-outline-success my-2 my-sm-0" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <br><br>


                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                                    
                                    <thead>
                                        <tr>
                                            <th><p style="color:black";>#</p></th>
                                            <th><p style="color:black";>Documento</p></th>
                                            <th><p style="color:black";>Nombre</p></th>
                                            <th><p style="color:black";>Telefono</p></th>
                                            <th><p style="color:black";>Direccion</p></th>
                                            <th><p style="color:black";>Acción</p></th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                   
                                    <?php


                                          $queryempleado = pg_query($conexion, "SELECT * FROM proveedores ");
                                                                                if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryempleado)){
                                                $queryempleado = pg_query($conexion, "SELECT * FROM proveedores where nombre_prov like '%$buscar%' 
                                                or documento_cli = '$buscar'");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                                $queryempleado = pg_query($conexion, "SELECT * FROM proveedores ");
                                             }

                                        $numerofila = 0;
                                        while($mostrar = pg_fetch_array($queryempleado)) 
                                        { 
                                            //echo "<br>";
                                            //print_r($mostrar);
                                           //echo "<br>";
                                            $numerofila++;
                                             $nombreCom=$mostrar['nombre_prov']." ".$mostrar['apellido1_prov'];
                                             ?>
                                             <tr>
                                             <td><?php echo $numerofila; ?></td>
                                            <td><?php echo $mostrar['documento_prov']; ?></td>
                                            <td><?php echo strtoupper($nombreCom); ?></td>
                                            <td><?php echo $mostrar['telefono_prov']; ?></td>
                                            <td><?php echo $mostrar['direccion_prov']; ?></td>
        
                                            <td> 
                                                
                                                <button type="button" class="btn btn-primary  btn-circle btn-sm" data-toggle="modal" data-target="#editChildresn<?php echo $mostrar['id_proveedor']; ?>">
                                                <i class="fas fa-user-edit"></i>
                                                </button>
                                                
                                            </td>
                                            </tr>
                                            <!--
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formActulizar" onClick="")>
                                            <i class="fas fa-edit"></i>
 
                                          </td>
                                        -->
                                           <!-- Modal actualizar empleado-->
                                           
                    <div class="modal fade" id="editChildresn<?php echo $mostrar['documento_cli']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/modificarCli.php" method="POST" role="form">
                                <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="integer" class="form-control" value="<?php echo $mostrar['documento_prov']; ?>" name="id_doc" placeholder="Ingresa documento" readonly required=""/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  pattern="[a-z]{1,15}" value="<?php echo $mostrar['nombre_prov']; ?>" name="nombre1" placeholder="Ingrese primer nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"  pattern="[a-z]{1,15}"value="<?php echo $mostrar['nombre1_prov']; ?>" name="nombre2" placeholder="Ingrese segundo nombre"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control" pattern="[a-z]{1,15}"value="<?php echo $mostrar['apellido1_prov']; ?>" name="apellido1" placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control"pattern="[a-z]{1,15}" value="<?php echo $mostrar['apellido2_prov']; ?>" name="apellido2" placeholder="Ingrese segundo apellido"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  value="<?php echo $mostrar['telefono_prov']; ?>" name="telefono" placeholder="Ingrese telefono" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Direccion</label>
                                        <input type="text" class="form-control"  value="<?php echo $mostrar['direccion_prov']; ?>" name="direccion" placeholder="Ingrese direccion" />
                                    </div>
                                    

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Actualizar" onClick="javascript: return confirm('¿Deseas registrar este cliente?');">    
                            </div>
                            </form>
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
                <!-- /.container-fluid -->

                       <!-- Modal añadir producto-->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Añadir cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/agregarCli.php" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="number" class="form-control" name="documento" placeholder="Ingresa documento"  required=""/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  name="nombre1" placeholder="Ingrese primer nombre"pattern="[a-z]{1,15}"required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"  pattern="[a-z]{1,15}"name="nombre2" placeholder="Ingrese segundo nombre" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control" pattern="[a-z]{1,15}"name="apellido1" placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control" pattern="[a-z]{1,15}" name="apellido2" placeholder="Ingrese segundo apellido" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  name="telefono" placeholder="Ingrese telefono" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">direccion</label>
                                        <input type="text" class="form-control"  name="direccion" placeholder="Ingrese direccion" />
                                    </div>
                                    

                                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este cliente?');">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- finModal -->

                   

            </div>
            <!-- End of Main Content -->


            <?php include_once("componentes/footer.php");?>