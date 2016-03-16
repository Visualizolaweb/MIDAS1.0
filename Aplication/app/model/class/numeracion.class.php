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
 
# --> Class: Gestion_Numeracion
# --> Method(s): create(), readAll(), readbyID(), delete(), update()
# --> Author(s): @guille_valen
# --> Date Create: 4 de Agosto 2015
# --> Description: La clase controla todas las acciones sobre la tabla ges_perfiles
 
class Gestion_Numeracion{
  
     
  function ReadbyID($num_codigo){
  
    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM ges_numeracion WHERE num_codigo = ?  ";
    
    $query = $pdo->prepare($sql);
    $query->execute(array($num_codigo));
    
    $result = $query->fetch(PDO::FETCH_BOTH);
    
    MIDAS_DataBase::Disconnect();
    
    return $result;
  }

  
  /**********************************************
   * Update()                                   *
   * Metodo  de Actualización de registro       *
   **********************************************/
  
  function Update($num_codigo, $num_recibocaja, $num_comprobantepago, $num_notacredito, $num_remisiones, $num_cotizaciones){

    $pdo = MIDAS_DataBase::Connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "UPDATE ges_numeracion SET num_recibocaja = ?, num_comprobantepago = ?, num_notacredito = ?, num_remisiones = ?, num_cotizaciones = ?WHERE num_codigo = ?";
    
    $query = $pdo->prepare($sql);
    $query->execute(array($num_recibocaja, $num_comprobantepago, $num_notacredito, $num_remisiones, $num_cotizaciones, $num_codigo));
    
    MIDAS_DataBase::Disconnect();      
  }
  
    
    
}
?>