<?php
class Payment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }

    function payment_select(){ 
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_transaction('tb_transaction', $where)->result();

        echo json_encode($data);  
    }
}
?>