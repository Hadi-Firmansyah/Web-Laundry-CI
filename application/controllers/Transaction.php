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
    function get_price_package(){
        $id = $this->input->post('id_package',true);
        $data_select = $this->model_laundry->get_price($id)->result();
        echo json_encode($data_select);
    }
}
?>