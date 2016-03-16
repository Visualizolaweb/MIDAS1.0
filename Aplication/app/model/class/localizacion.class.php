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

# --> Class: Gestion_Localidad
# --> Method(s): SelectALl
# --> Author(s): @malvarez
# --> Date Create: 23 Julio 2015
# --> Description: La clase controla todas las acciones sobre la tabla ges_sedes


class Gestion_Localidad{


  function Read_City_byState($depto){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_ciudades WHERE ciu_departamento = ?";

    $query = $pdo->prepare($sql);
    $query->execute(array($depto));

    $result = $query->fetchALL(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();

    return $result;
  }


}
?>
