<?php
require_once 'model/comprobante.model.php';
require_once 'model/producto.model.php';
require_once 'model/cliente.model.php';

class ComprobanteController{

    private $model;
    private $pmodel;
    private $cmodel;

    public function __CONSTRUCT(){
        $this->model  = new ComprobanteModel();
        $this->pmodel = new ProductoModel();
        $this->cmodel = new ClienteModel();
    }

    public function Index(){
        require_once 'views/header.php';
        require_once 'views/comprobante/index.php';
        require_once 'views/footer.php';
    }

    public function Crud(){
        require_once 'views/header.php';
        require_once 'views/comprobante/editar.php';
        require_once 'views/footer.php';
    }

    public function Pago(){
        require_once 'views/header.php';
        require_once 'views/comprobante/add_pago.php';
        require_once 'views/footer.php';
    }

    public function Ver(){

        $comprobante = $this->model->Obtener($_REQUEST['id']);

        require_once 'views/header.php';
        require_once 'views/comprobante/ver.php';
        require_once 'views/footer.php';
    }

    public function Guardar()
    {
        print_r(json_encode( $this->model->Registrar( $_POST ) ));

    }

    public function GuardarPago()
    {
        print_r(json_encode( $this->model->RegistrarPago( $_POST ) ));

    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

    public function ClienteBuscar()
    {
        print_r(json_encode(
            $this->cmodel->Buscar($_REQUEST['criterio'])
        ));
    }

    public function ProductoBuscar()
    {
        print_r(json_encode(
            $this->pmodel->Buscar($_REQUEST['criterio'])
        ));
    }

    public function Listar()
    {
        print_r($this->model->Listar());
    }
}
