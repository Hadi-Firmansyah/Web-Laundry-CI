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

    function payment_save(){
        $payment_date = $this->input->post('payment_date');
        $id_transaction = $this->input->post('id_transaction');
        $total_price = $this->input->post('total_price');
        $money = $this->input->post('money');
        $total_change = $this->input->post('total_change');
        $status = $this->input->post('status');


        if($money == ''){
            $result['message'] = "Insert Money!";
        }else{
            $result['message'] = "";

            $data = array(
                'payment_date' => $payment_date,
                'id_transaction' => $id_transaction,
                'total_price' => $total_price,
                'money' => $money,
                'total_change' => $total_change,
                'status' => $status,
            );

            $this->model_laundry->save_payment($data, 'tb_payment');
        }
        echo json_encode($result);
    }

    function payment_show(){
        $dataPayment = $this->model_laundry->get_payment('tb_payment')->result();
        echo json_encode($dataPayment);
    }
    public function payment_print_xls(){
        header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="All_Data_Payment.xls"');
        header('Cache-Control: max-age=0');

        $data['get_payments']=$this->model_laundry->get_payments();
        $this->load->view('payment/payment_preview',$data);

    }
}
?>