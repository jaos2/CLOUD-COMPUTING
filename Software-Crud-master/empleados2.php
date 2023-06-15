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
            <h2 style="color:black"; class="m-0 font-weight-bold text-success"><p style="color:black";>EMPLEADOS DE TEOTOKOMOTOS</h2></p>
                            
                            </div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            </div>
                            <div class="float-sm-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">Agregar nuevo usuario</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                       

                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                 <form method="POST"
                                        class="offset-md-8 navbar-search">

                                        
                                        <div class="input-group">
                                            <br>
                                            <br>
                                            <!-- Divider -->
                                        <hr class="sidebar-divider">
                                        
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar Empleado"
                                            
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                                
                                            <div class="input-group-append">
                                                
                                                <button   class="btn btn-info" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                                
                                            </div>

                                        </div>
                                        <br>
                                    </form>

 

                                    <div class="d-flex justify-content-center">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                                    
                                    <thead>
                                        <tr>
                                            
                                            <th><p style="color:black";>#</p></th>
                                            <th><p style="color:black";>Documento</p></th>
                                            <th><p style="color:black";>Nombres/Apellidos</p></th>
                                            <th><p style="color:black";>Telefono</p></th>
                                            <th><p style="color:black";>Dirección</p></th>
                                            <th><p style="color:black";>Cargo</p></th>
                                            <th><p style="color:black";>Estado</p></th>
                                            <th><p style="color:black";>Acción</p></th>

                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                   
                                    <?php


                                          $queryempleado = pg_query($conexion, "SELECT * FROM usuarios where id_cargo='2' ");
                                                                                if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryempleado)){
                                                $queryempleado = pg_query($conexion, "SELECT * FROM usuarios where nombre1_usu = '$buscar' 
                                                or documento_usu = '$buscar' ");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                                $queryempleado = pg_query($conexion, "SELECT * FROM usuarios ");
                                             }

                                        $numerofila = 0;
                                        while($mostrar = pg_fetch_array($queryempleado)) 
                                        { 
                                            //echo "<br>";
                                            //print_r($mostrar);
                                           //echo "<br>";
                                            $numerofila++;
                                             $nombreCom=$mostrar['nombre1_usu']." ".$mostrar['nombre2_usu']." ".$mostrar['apellido1_usu']." ".$mostrar['apellido2_usu'];
                                             ?>
                                             <tr>
                                             <td><?php echo $numerofila; ?></td>
                                            <td><?php echo $mostrar['documento_usu']; ?></td>
                                            <td><?php echo strtoupper($nombreCom); ?></td>
                                            <td><?php echo $mostrar['telefono_usu']; ?></td>
                                            <td><?php echo $mostrar['direccion']; ?></td>
                                            <td><?php echo $mostrar['rol_usu']; ?></td>
                                            <td><?php echo $mostrar['estado_usu']; ?></td>
                                            
        
                                            <td> 
                                            <div class="d-flex justify-content-center">
                            
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editChildresn<?php echo $mostrar['documento_usu']; ?>">
                                                <i class="fas fa-user-edit"></i>
                                                </div>
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
                                           
                    <div class="modal fade" id="editChildresn<?php echo $mostrar['documento_usu']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                <form action="Modal/modificarEmp.php" method="POST" role="form">
                                <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="integer" class="form-control" value="<?php echo $mostrar['documento_usu']; ?>" name="txtdoc" placeholder="Ingresa codigo producto" readonly required=""/>
                                        <input type="hidden" class="form-control"  name="id_cargo" value="2"/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  value="<?php echo $mostrar['nombre1_usu']; ?>"  pattern="[a-z]{1,15}" name="nombre1" placeholder="Ingrese primer nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"   value="<?php echo $mostrar['nombre2_usu']; ?>"  pattern="[a-z]{1,15}" name="nombre2" placeholder="Ingrese segundo nombre" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control"  value="<?php echo $mostrar['apellido1_usu']; ?>"  pattern="[a-z]{1,15}" name="apellido1" placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control"  value="<?php echo $mostrar['apellido2_usu']; ?>"  pattern="[a-z]{1,15}" name="apellido2" placeholder="Ingrese segundo apellido" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  value="<?php echo $mostrar['telefono_usu']; ?>" name="telefono" maxlength="10" placeholder="Ingrese telefono"  required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Direccion</label>
                                        <input type="text" class="form-control"  value="<?php echo $mostrar['direccion']; ?>" name="direccion" placeholder="Ingrese su direccion" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Contraseña</label>
                                        <input type="password" class="form-control"  value="<?php echo $mostrar['clave_usu']; ?>" name="pass" placeholder="Ingrese contraseña" required=""/>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="estado" id="id_prov">
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_id">Rol</label>
                                        <select class="form-control" name="rol" id="id_prov">
                                            <option value="SECRETARIA">SECRETARIA</option>
                                            <option value="OPERARIO">OPERARIO</option>
                                            
                                            
                                        </select>
                                    </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Actualizar" onClick="javascript: return confirm('¿Deseas registrar este empleado?');">    
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
                </div>
                <!-- /.container-fluid -->

                       <!-- Modal añadir producto-->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Añadir Nuevo Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/agregarEmp.php" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="number" class="form-control" value=""  name="txtdoc" placeholder="Ingresa codigo producto"  required=""/>
                                        <input type="hidden" class="form-control"  name="id_cargo" value="2"/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  name="nombre1"  pattern="[a-z]{1,15}" placeholder="Ingrese primer nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"   name="nombre2"  pattern="[a-z]{1,15}" placeholder="Ingrese segundo nombre" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control"  name="apellido1"  pattern="[a-z]{1,15}"  placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control"  name="apellido2"  pattern="[a-z]{1,15}" placeholder="Ingrese segundo apellido" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  name="telefono" placeholder="Ingrese telefono" maxlength="10"   required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputdirec">Direccion</label>
                                        <input type="text" class="form-control"   name="direccion" placeholder="Ingrese su direccion" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Contraseña</label>
                                        <input type="password" class="form-control"  name="pass" placeholder="Ingrese contraseña" required=""/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="estado" id="id_prov">
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_id">Rol</label>
                                        <select class="form-control" name="rol" id="id_prov">
                                            <option value="SECRETARIA">SECRETARIA</option>
                                            <option value="OPERARIO">OPERARIO</option>
                                            
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este empleado?');">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- finModal -->

                   

            </div>
            <!-- End of Main Content -->



            <?php include_once("componentes/footer.php");?>