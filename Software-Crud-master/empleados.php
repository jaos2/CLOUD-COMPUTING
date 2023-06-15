
<?php
session_start();

include_once('conexion/conexion.php');
include_once("componentes/header.php");
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-successN sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
             <div >
                <img   class="img-side" src="img/logo.png">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="main.php">
                <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reporte</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Empleado</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrar:</h6>
                        <a class="collapse-item" href="buttons.html">Agregar Emplados</a>
                        <a class="collapse-item" href="cards.html">Consultar Empleados</a>
                        <a class="collapse-item" href="cards.html">Actualizar Empleados</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Administrar:</h6>
                        <a class="collapse-item" href="buttons.html">Agregar Clientes</a>
                        <a class="collapse-item" href="cards.html">Consultar Clientes</a>
                        <a class="collapse-item" href="cards.html">Actualizar Clientes</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
 
            <!-- Nav Item - Pages Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="index.php">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
             -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                <i class="fa fa-calculator" aria-hidden="true"></i>
                    <span>Facturacion</span></a>
                    
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>Inventario</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

           <?php include_once("componentes/navBar.php");?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!--
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                  -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            <h6 class="m-0 font-weight-bold text-success">Lista de productos</h6>
                            </div>
                            <div class="float-sm-right">
                            <button class="btn btn-success submitBtn"  data-toggle="modal" data-target="#modalForm">Añadir producto</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                    <form method="POST"
                                        class="offset-md-8 navbar-search">
                                        <div class="input-group">
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar Producto"
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                            <div class="input-group-append">
                                                <button   class="btn btn-success" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                <table class="display" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Stok</th>
                                            <th>Precio Unitario</th>
                                            <th>Descripcion</th>
                                            <th>Proveedor</th>
                                            <th>Empleado</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                          $queryproducto = pg_query($conexion, "SELECT * FROM producto ORDER BY nombre_pro asc");
                                          $queryproveedor = pg_query($conexion, "SELECT * FROM proveedor");
                                          $queryadministrador = pg_query($conexion, "SELECT * FROM empleado");
                                        
                                        if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryproveedor)){
                                                $queryproducto = pg_query($conexion, "SELECT * FROM producto where nombre_pro like '$buscar' or codigo_pro like '$buscar'");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                             $queryproducto = pg_query($conexion, "SELECT * FROM producto ORDER BY nombre_pro asc");
                                             }
                                        $numerofila = 0;
                                        $i=1;
                                        while($mostrar = pg_fetch_array($queryproducto)) 
                                        {    $numerofila++;
                                           // print_r($mostrar);
                                           // echo "<br>";
                                            $is1="".$mostrar['id_empleado'];
                                            $nameproveedor = pg_query($conexion, "SELECT * FROM proveedor WHERE id_proveedor='".$is1."'");
                                            $nameproveedor1 = pg_fetch_array($nameproveedor);
                                            //print_r($nameproveedor1);
                                            //echo "<br>";
                                            $is2="".$nameproveedor1['id_proveedor'];
                                            $nameadministrador = pg_query($conexion, "SELECT * FROM empleado WHERE id_empleado='".$is2."'");
                                            $nameadministrador1 = pg_fetch_array($nameadministrador);
                                            //print_r($nameadministrador1);
                                            //echo "<br>";
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$mostrar['codigo_pro']."</td>";    
                                            echo "<td>".$mostrar['nombre_pro']."</td>";  
                                            echo "<td>".$mostrar['stock_pro']."</td>";
                                            echo "<td>".$mostrar['preciounit_pro']."</td>";
                                            echo "<td>".$mostrar['descripcion_pro']."</td>";
                                            echo "<td>".$nameproveedor1['nombre_vent']."</td>";
                                            echo "<td>".$nameadministrador1['nombre1_emp']."</td>";
                                            $i++;
                                            ?>
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formModal2" onClick="guardar('<?php echo $i?>','<?php echo $mostrar['codigo_pro']?>','<?php echo $mostrar['nombre_pro']?>','<?php echo $mostrar['stock_pro']?>','<?php echo $mostrar['preciounit_pro']?>','<?php echo $nameadministrador1['id_empleado']?>','<?php echo $nameproveedor1['id_proveedor']?>')")>
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-circle btn-sm" href="modal/eliminar.php?cod=<?php echo $mostrar['codigo_pro'] ?>" onClick="return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_pro']?>?')">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                          </td>
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

            <!-- Modal -->
            <div class="modal fade" id="modalForm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <!--
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                                        -->
                            <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                        </div>
                        
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <p class="statusMsg"></p>
                                            <form action="Modal/agregar.php" method="POST" role="form">
                                                <div class="form-group">
                                                    <label for="inputCod">Codigo Producto</label>
                                                    <input type="text" class="form-control" id="inputName" name="txtcodigo" placeholder="Ingresa codigo producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Producto</label>
                                                    <input type="text" class="form-control" id="inputName"  name="txtnombre" placeholder="Ingrese nombre" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPre">Precio Producto</label>
                                                    <input type="number" class="form-control" id="inputPrice" name="txtprecio" placeholder="Ingrese Precio" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Stock Producto</label>
                                                    <input type="text" class="form-control" id="inputStock"  name="txtstock" placeholder="Ingrese stock Producto" required=""/>
                                                </div>
                                                <div class="row">
                                              
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="estu_id">Administrador</label>
                                                                <select class="form-control" name="id_admin" id="id_admin">
                                                                    <option value="">Selecionar administrador</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryproveedor)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_proveedor'].">".ucwords(strtolower($mostrar['nombre_prov']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="asig_id">Proveedor</label>
                                                                <select class="form-control" name="id_prov" id="id_prov">
                                                                    <option value="">Selecionar proveedor</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar2 = pg_fetch_array($queryadministrador)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar2['id_administrador'].">".ucwords(strtolower($mostrar2['nombre1_emp']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este producto?');">
                                    
                                        </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Modal Footer -->

                                    </div>
                                </div>
                            </div>
                    </div>




                 <!-- Modal2 -->
                    <div class="modal fade" id="formModal2" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <!--
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                                        -->
                            <h4 class="modal-title" id="myModalLabel">Modificar</h4>
                        </div>
                                    <?php
                                                
                                        
                                                    $queryproveedor = pg_query($conexion, "SELECT * FROM proveedor");
                                                    $queryadministrador = pg_query($conexion, "SELECT * FROM empleado");

                                                     ?>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <p class="statusMsg"></p>
                                            <form name="formulario" method="POST" role="form" action="Modal/modificar.php">
                                               
                                            <div class="form-group">
                                                    <label for="inputCod">Codigo Producto</label>
                                                    <input type="text" class="form-control" id="inputCode1" name="txtcodigo" placeholder="Ingresa codigo producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Producto</label>
                                                    <input type="text" class="form-control" id="inputName1"  name="txtnombre" placeholder="Ingrese nombre" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPre">Precio Producto</label>
                                                    <input type="number" class="form-control" id="inputPrice1" name="txtprecio" placeholder="Ingrese Precio" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Stock Producto</label>
                                                    <input type="text" class="form-control" id="inputStock1"  name="txtstock" placeholder="Ingrese stock Producto" required=""/>
                                                </div>
                                                <div class="row">
                                                
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="estu_id">Administrador</label>
                                                                <select class="form-control" name="id_admin1" id="id_admin1">
                                                                    <option value="">Selecionar administrador</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryproveedor)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_proveedor'].">".ucwords(strtolower($mostrar['nombre_prov']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="asig_id">Proveedor</label>
                                                                <select class="form-control" name="id_prov1" id="id_prov1">
                                                                    <option value="">Selecionar proveedor</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryadministrador)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_administrador'].">".ucwords(strtolower($mostrar['nombre1_emp']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary submitBtn"  value="Modificar" onClick="guardar()">
                                    
                                        </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Modal Footer -->

                                    </div>
                                </div>
                            </div>
                    </div>



  </script>
 

       </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once("componentes/footer.php");?>
