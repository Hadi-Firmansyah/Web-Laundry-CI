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
    function transaction_save(){
        $id_outlet = $this->input->post('id_outlet');
        $transaction_date = $this->input->post('transaction_date');
        $id_user = $this->input->post('id_user');
        $id_member = $this->input->post('id_member');
        $id_package = $this->input->post('id_package');
        $price_package = $this->input->post('price_package');
        $quantity = $this->input->post('quantity');
        $notes = $this->input->post('price_package');
        $total_price = $this->input->post('total_price');
        $status = $this->input->post('status');


        if($id_member == ''){
            $result['message'] = "Member must be selected !";
        }else if($id_package == ''){
            $result['message'] = "Package must be selected !";
        }else if($quantity == ''){
            $result['message'] = "Quantity must be entered !";
        }else if($phone == ''){
            $result['message'] = "Phone must be entered !";
        }else{
            $result['message'] = "";

            $data = array(
                'id_outlet' => $id_outlet,
                'transaction_date' => $transaction_date,
                'id_user' => $id_user,
                'id_member' => $id_member,
                'id_package' => $id_package,
                'price_package' => $price_package,
                'quantity' => $quantity,
                'notes' => $notes,
                'total_price' => $total_price,
                'status' => $status
            );

            $this->model_laundry->save_transaction($data, 'tb_transaction');
        }
        echo json_encode($result);
    }
}
?>