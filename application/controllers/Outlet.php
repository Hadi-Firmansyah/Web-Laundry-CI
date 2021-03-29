<?php
class Outlet extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    function outlet_show(){
        $dataOutlet = $this->model_laundry->get_outlet('tb_outlet')->result();
        echo json_encode($dataOutlet);
    }
    function outlet_save(){
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');

        if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($address == ''){
            $result['message'] = "Address must be entered !";
        }else if($phone == ''){
            $result['message'] = "Phone must be entered !";
        }else{
            $result['message'] = "";

            $data = array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
            );

            $this->model_laundry->save_outlet($data, 'tb_outlet');
        }
        echo json_encode($result);
    }
    function outlet_get(){
        $id = $this->input->post('id');
        $where = array('id'=> $id);
        $data = $this->model_laundry->get_data_outlet('tb_outlet', $where)->result();

        echo json_encode($data);
    }
    function outlet_edit(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');

        if($name == ''){
            $result['message'] = "Name must be entered !";
        }else if($address == ''){
            $result['message'] = "Address must be entered !";
        }else if($phone == ''){
            $result['message'] = "Phone must be entered !";
        }else{
            $result['message'] = "";

            $where = array('id'=> $id);

            $data = array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
            );

            $this->model_laundry->edit_outlet($where, $data, 'tb_outlet');
        }
        echo json_encode($result);
    }
    function outlet_delete(){
        $id = $this->input->post('id');
        $where = array('id'=>$id);
        $this->model_laundry->delete_outlet($where, 'tb_outlet');
    }
    public function outlet_print_xls(){
        header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="All_Data_Outlet.xls"');
        header('Cache-Control: max-age=0');

        $data['get_outlets']=$this->model_laundry->get_outlets();
        $this->load->view('outlet/outlet_preview',$data);

    }
}
?>