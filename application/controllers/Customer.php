<?php
class Customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    function customer_show(){
        $dataCustomer = $this->model_laundry->get_customer('tb_member')->result();
        echo json_encode($dataCustomer);
    }
    function customer_save(){
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');

        if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($address == ''){
            $result['message'] = "Address must be entered !";
        }else if($gender == ''){
            $result['message'] = "Gender must be entered !";
        }else if($phone == ''){
            $result['message'] = "Phone must be entered !";
        }else{
            $result['message'] = "";

            $data = array(
                'name' => $name,
                'address' => $address,
                'gender' => $gender,
                'phone' => $phone,
            );

            $this->model_laundry->save_customer($data, 'tb_member');
        }
        echo json_encode($result);
    }
    function customer_get(){
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_customer('tb_member', $where)->result();

        echo json_encode($data);
    }
    function customer_edit(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');

        if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($address == ''){
            $result['message'] = "Address must be entered !";
        }else if($gender == ''){
            $result['message'] = "Gender must be entered !";
        }else if($phone == ''){
            $result['message'] = "Phone must be entered !";
        }else{
            $result['message'] = "";

            $where = array('id'=> $id);

            $data = array(
                'name' => $name,
                'address' => $address,
                'gender' => $gender,
                'phone' => $phone,
            );

            $this->model_laundry->edit_customer($where, $data, 'tb_member');
        }
        echo json_encode($result);
    }
    function customer_delete(){
        $id = $this->input->post('id');
        $where = array('id'=>$id);
        $this->model_laundry->delete_customer($where, 'tb_member');
    }
}
?>