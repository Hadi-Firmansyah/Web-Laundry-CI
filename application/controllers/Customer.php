<?php
class Customer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    function customer_show(){
        $dataCustomer = $this->model_laundry->get_customer('tb_customer')->result();
        echo json_encode($dataCustomer);
    } 

    //PHP
    function customer_save(){
        $this->model_laundry->save_customer();
    }
    function customer_save1(){
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

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
                'latitude' => $latitude,
                'longitude' => $longitude,
            );

            $this->model_laundry->save_customer($data, 'tb_customer');
        }
        echo json_encode($result);
    }
    function customer_get(){
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_customer('tb_customer', $where)->result();

        echo json_encode($data);
    }

    //PHP
    function customer_edit($id){
        $data['title'] = "Edit Customer";
        $this->load->view('admin/templates/header',$data);
        $data['data_edit'] = $this->model_laundry->get_data_customer($id);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('customer/edit_customer',$data);
        $this->load->view('admin/templates/footer');
    }
    function action_edit(){
        $this->model_laundry->edit_customer();
    }
    function customer_edit1(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

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
                'latitude' => $latitude,
                'longitude' => $longitude,
            );

            $this->model_laundry->edit_customer($where, $data, 'tb_customer');
        }
        echo json_encode($result);
    }
    function customer_delete($id){
        $this->model_laundry->delete_customer($id);
        redirect('Admin/customer2');
    }
    function customer_delete1(){
        $id = $this->input->post('id');
        $where = array('id'=>$id);
        $this->model_laundry->delete_customer($where, 'tb_customer');
    }

    function customer_location(){ 
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_location('tb_customer', $where)->result();

        echo json_encode($data);  
    }
    function detail_location($id){
        $data['title'] = "Detail Location";
        $this->load->view('admin/templates/header',$data);
        $data['data'] = $this->model_laundry->get_data_customer($id);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('customer/detail_location',$data);
        $this->load->view('admin/templates/footer');
    }
    public function customer_print_xls(){
        header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="All_Data_Customer.xls"');
        header('Cache-Control: max-age=0');

        $data['get_customers']=$this->model_laundry->get_customers();
        $this->load->view('customer/customer_preview',$data);

    }
}
?>