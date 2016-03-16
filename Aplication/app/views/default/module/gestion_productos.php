<?php
  Gestion_Menu::View_submenu("inventario", $_usu_per_codigo, "PAG-10101");
  $icono = Gestion_Menu::Load_icon($row_paginas[0]);

?>

<div id="main" class="subpage">
  <div id="content" class="page_module">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel">
          <header class="panel-heading">
            <div class="icon"><i class="<?php echo $icono["men_icono"]; ?>"></i></div>
            <h2> <?php echo $row_paginas[1];?></h2>
            <?php
      				if($row_permiso["per_C"]==1){
      					echo '<a href="dashboard.php?m='.base64_encode("module/producto_nuevo.php").'&pagid='.$pagid.'" class="btn btn-primary"><i class="fa fa-plus"></i> Producto Nuevo</a>';
      				}
      			?>
            <span><?php echo $row_paginas[2];?></span>
			    </header>
		    </div>
		  </div>

      <div class="col-lg-12">
        <div class="panel">
          <div class="panel-body">
			      <?php if($row_permiso["per_DG"]==1){ ?>
            <form name="fgrid">
            <table id="datagrid" class="display" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th width="20%">Codigo</th>
                      <th width="25%">Nombre</th>
                      <th width="15%">Precio</th>
                      <th width="6%">Descuento</th>
                      <th width="6%">Impuesto</th>
                      <th width="15%">Precio Final</th>
                      <th width="16%">Acción</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                      require_once("../../model/class/productos.class.php");

                      $stmt = Gestion_Productos::ReadAll();
                      $pageparams = basename($_SERVER["REQUEST_URI"]);

                      foreach($stmt as $row){

                        echo "<tr>";
                          echo "<td style='border-left: 1px solid #ddd'>".$row[0]."</td>";
                          echo "<td>".$row[1]."</td>";
                          echo "<td class='text-right'>$ ".number_format($row[2])."</td>";
                          echo "<td>".$row[7]." %</td>";
                          echo "<td>".$row["imp_nombre"]."</td>";
                          echo "<td class='text-right'>$ ".number_format($row[8])."</td>";
                          echo "<td style='text-align:center;'>";
                							  

                							  if($row_permiso["per_D"]==1){
                								  echo " <button class='btn btn-delete btn-datagrid btn-sm md-effect' data-effect='md-flipVer' id='".$row[0]."'><i class='fa fa-times-circle'></i> </button> ";
                							  }
                          echo "</td>";
                        echo "</tr>";


                      }
                  ?>
              </tbody>
            </table>
            </form>

			  <?php } ?>
            <!-- Advertencia para eliminar el perfil -->
            <div id="md-effect" class="modal fade" tabindex="-1" data-width="450">
              <div class="modal-header bg-inverse bd-inverse-darken">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title">Mensaje del Sistema:</h4>
              </div>
              <!-- //modal-header-->
              <div class="modal-body">

                <form action="../../controller/crud_productos.controller.php" method="post">
                  <input type="hidden" id="codigoid" name="codigoid" value="" readonly/>
                  <p>Esta seguro que desea eliminar el producto? <span class="label bg-warning" id="innertext"></span></p>
                  <div style="text-align: right">
                    <button type='submit' class='btn btn-primary' value="eliminar" name="btn_continue"><i class='fa fa-thumbs-o-up'></i> Continuar</button>
                    <button type='button' data-dismiss="modal" class='btn btn-info'><i class='fa fa-thumbs-o-down'></i> Cancelar</button>
                  </div>
                </form>
              </div>
              <!-- //modal-body-->
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

</div>
