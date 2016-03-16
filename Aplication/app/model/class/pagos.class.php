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

# --> Class: Gestion_Factura
# --> Method(s): create(), readAll(), readbyID(), delete(), update()
# --> Author(s): @malvarez @guille_valen
# --> Date Create: 23 Julio 2015
# --> Description: La clase controla todas las acciones sobre la tabla ges_usuarios


class Gestion_Pagos{

  function PagosbySede($sede){
    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT fac_numero, cli_identificacion, cli_nombre, cli_apellido, forpag_nombre, pag_valor, pag_fechapag
FROM ges_pagos
INNER JOIN ges_factura ON ges_facturas_fac_codigo = fac_codigo
INNER JOIN ges_formas_pago ON ges_formaspago_codigo = forpag_codigo
INNER JOIN ges_clientes ON cli_codigo = ges_factura.ges_clientes_cli_codigo
WHERE ges_factura.ges_sedes_sed_codigo = '".$sede."'
UNION
SELECT fac_numero, pro_nit, pro_nombre,  '', forpag_nombre, pag_valor, pag_fechapag
FROM ges_pagos
INNER JOIN ges_factura ON ges_facturas_fac_codigo = fac_codigo
INNER JOIN ges_formas_pago ON ges_formaspago_codigo = forpag_codigo
INNER JOIN ges_proveedores ON pro_codigo = ges_factura.ges_clientes_cli_codigo
WHERE ges_factura.ges_sedes_sed_codigo = '".$sede."'";

    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetchALL(PDO::FETCH_BOTH);

    MIDAS_DataBase::Disconnect();
    return $result;
  }

  

}
?>
