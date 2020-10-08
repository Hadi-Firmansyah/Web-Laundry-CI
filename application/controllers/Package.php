<?php
class Package extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    function package_show(){
        $dataPackage = $this->model_laundry->get_package('tb_package')->result();
        echo json_encode($dataPackage);
    }
    function package_save(){
        $id_outlet = $this->input->post('id_outlet');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $price = $this->input->post('price');

        if($id_outlet == ''){
            $result['message'] = "ID Outlet must be entered !";
        }else if($type == ''){
            $result['message'] = "Type must be entered !";
        }else if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($price == ''){
            $result['message'] = "Price must be entered !";
        }else{
            $result['message'] = "";

            $data = array(
                'id_outlet' => $id_outlet,
                'type' => $type,
                'name' => $name,
                'price' => $price,
            );

            $this->model_laundry->save_package($data, 'tb_package');
        }
        echo json_encode($result);
    }
    function package_get(){
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_package('tb_package', $where)->result();

        echo json_encode($data);
    }
    function package_edit(){
        $id_outlet = $this->input->post('id_outlet');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $price = $this->input->post('price');

        if($id_outlet == ''){
            $result['message'] = "ID Outlet must be entered !";
        }else if($type == ''){
            $result['message'] = "Type must be entered !";
        }else if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($price == ''){
            $result['message'] = "Price must be entered !";
        }else{
            $result['message'] = "";

            $data = array(
                'id_outlet' => $id_outlet,
                'type' => $type,
                'name' => $name,
                'price' => $price,
            );

            $this->model_laundry->save_package($data, 'tb_package');
        }
        echo json_encode($result);
    }
    function package_delete(){
        $id = $this->input->post('id');
        $where = array('id'=>$id);
        $this->model_laundry->delete_package($where, 'tb_package');
    }
}
?>