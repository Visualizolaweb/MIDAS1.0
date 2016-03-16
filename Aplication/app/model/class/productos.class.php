<?php

/*  ███╗   ███╗██╗██████╗  █████╗ ███████╗ Versión
    ████╗ ████║██║██╔══██╗██╔══██╗██╔════╝   1.0
    ██╔████╔██║██║██║  ██║███████║███████╗
    ██║╚██╔╝██║██║██║  ██║██╔══██║╚════██║
    ██║ ╚═╝ ██║██║██████╔╝██║  ██║███████║
    ╚═╝     ╚═╝╚═╝╚═════╝ ╚═╝  ╚═╝╚══════╝
          Development by SINAPPSIS Lab
    Released under the Free Software License
-------------------------------------------------- */

# --> Class: Gestion_Empresa
# --> Method(s): create(), readAll(), readbyID(), delete(), update()
# --> Author(s): @guille_valen
# --> Date Create: 03 Agosto 2015
# --> Description: La clase controla todas las acciones sobre la tabla ges_empresa


class Gestion_Productos{

  /**********************************************
   * Create()                                   *
   * Metodo que guarda archivos en ges_sedes    *
   **********************************************/

  function Create($prod_codigo, $prod_nombre, $prod_valor, $prod_observacion, $prod_fecha_creacion, $ges_impuestos_imp_codigo, $prod_descuentos, $prod_valorTotal){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO ges_productos (prod_codigo, prod_nombre, prod_valor, prod_observacion, prod_fecha_creacion, ges_impuestos_imp_codigo, prod_descuentos, prod_valorTotal) VALUES (?,?,?,?,?,?,?,?)";

    $query = $pdo->prepare($sql);
    $query->execute(array($prod_codigo, $prod_nombre, $prod_valor, $prod_observacion, $prod_fecha_creacion, $ges_impuestos_imp_codigo, $prod_descuentos, $prod_valorTotal));

    MIDAS_DataBase::Disconnect();
  }

  /**********************************************
   * ReadAll() - ReadbyID() - ReadlastItem()    *
   * Metodos de lectura y consulta, uno es para *
   * todos los registros y otro se consulta por *
   * codigo                                     *
   **********************************************/

  function ReadAll(){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_productos
            INNER JOIN ges_impuestos ON ges_impuestos_imp_codigo = imp_codigo
            ORDER BY prod_nombre DESC";

    $query = $pdo->prepare($sql);
    $query->execute();

    $results = $query->fetchALL(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();
    return $results;
  }

  function ReadbyID($prod_codigo){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_productos WHERE prod_codigo = ?";

    $query = $pdo->prepare($sql);
    $query->execute(array($prod_codigo));

    $result = $query->fetch(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();

    return $result;
  }


 function Delete($prod_codigo){

   $pdo = MIDAS_DataBase::Connect();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "DELETE FROM ges_productos WHERE prod_codigo = ?";

   $query = $pdo->prepare($sql);
   $query->execute(array($prod_codigo));


   MIDAS_DataBase::Disconnect();


 }


}
?>
