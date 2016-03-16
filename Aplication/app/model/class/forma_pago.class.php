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

# --> Class: Gestion_FormaPago
# --> Method(s): create(), readAll(), readbyID(), delete(), update()
# --> Author(s): @guille_valen
# --> Date Create: 26 Enero 2016
# --> Description: La clase controla todas las acciones sobre la tabla ges_empresa


class Gestion_FormaPago{


  function ReadAll(){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ges_formas_pago ORDER BY forpag_nombre";

    $query = $pdo->prepare($sql);
    $query->execute();

    $results = $query->fetchALL(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();
    return $results;
  }

}
?>
