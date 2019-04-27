<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Articulos    <i class="fa fa-gift"></i>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Articulos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArticulo">
          
          Agregar Articulo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre Articulo</th>
           <th>Foto</th>
           <th>Vigencia</th>
           <th>Estado</th>
           <th>Último Despacho</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $producto = ControladorProducto::ctrMostrarProducto($item, $valor);

       foreach ($Producto as $key => $value){
         
          echo ' <tr>
                  <td>1</td>
                  
                  <td>'.$value["nombre"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/producto/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idProducto="'.$value["id"].'" estadoProducto="0">Disponible</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idProducto="'.$value["id"].'" estadoProducto="1">Agotado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-success btnEditarProducto" idProducto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarArticulo"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarProducto" idProducto="'.$value["id"].'" fotoProducto="'.$value["foto"].'" Producto="'.$value["Producto"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Articulo
======================================-->

<div id="modalAgregarArticulo" class="modal fade" role="dialog">

</div>

<!--=====================================
MODAL EDITAR Articulo (si no funciona volver a temporal)
======================================-->
<div id="modalEditarArticulo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Articulo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre articulo" required>

              </div>

            </div>


           

            <!-- ENTRADA PARA SELECCIONAR SU vigencia -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar Vigencia del Articulo</option>
                  <!-- verificar en el controlador, cambios no generadoss -->

                  <option value="Administrador">2017</option>

                  <option value="Especial">2018</option>

                  <option value="Vendedor">2019</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/producto/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Articulo</button>

        </div>

        <?php

          $editarProducto = new ControladorProducto();
          $editarProducto -> ctrEditarProducto();

        ?>

      </form>

    </div>

  </div>

</div>






<?php

  $borrarProducto = new ControladorProducto();
  $borrarProducto -> ctrBorrarProducto();

?> 
