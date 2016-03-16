<input type="hidden" id="nuevoingreso" value="<?php echo $_acc_tour; ?>">
<input type="hidden" id="demotour" value="<?php echo $_acc_primeravez; ?>">


<?php 

if($_acc_primeravez == 0){

?>

 <div class="modal fade modal-welcome" id="saludo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    HOLA, <?php echo $once_name[0]; ?> <?php echo $ms_sexo;?> A MIDAS. <br>
    <span>¿Te gustaria tomar un tour?</span>
    <div class="btns">
      <button id="take-tour" class="btn btn-primary">Si, quiero tomar un tour.</button>      
      <button id="no-take-tour" class="btn btn-info">No, gracias!.</button>
    </div>
</div>



<?php
}
?>