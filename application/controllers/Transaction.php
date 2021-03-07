<?php
class Transaction extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    function transaction_show(){
        $dataTransaction = $this->model_laundry->get_transaction('tb_transaction')->result();
        echo json_encode($dataTransaction);
        
    }
}
?>