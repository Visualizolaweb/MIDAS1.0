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

# --> Class: Gestion_Planes
# --> Method(s): SelectALl
# --> Author(s): @malvarez
# --> Date Create: 23 Julio 2015
# --> Description: La clase controla todas las acciones sobre la tabla ges_sedes


class Gestion_Planes{


  function ReadAll(){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_planes WHERE pla_codigo != 'PLA-00001' ORDER BY pla_codigo";

    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetchAlL(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();

    return $result;
  }

  function ReadbyID($pla_codigo){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_planes WHERE pla_codigo = ?";

    $query = $pdo->prepare($sql);
    $query->execute(array($pla_codigo));

    $result = $query->fetch(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();

    return $result;
  }
}
?>
