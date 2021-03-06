<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    public function user_save(){
        $this->model_laundry->save_user();
    } 
    public function user_delete($id){
        $this->model_laundry->delete_user($id);
       redirect('Admin/user');
    } 
    public function user_edit($id){
        $data['title'] = "Edit User";
        $this->load->view('admin/templates/header',$data);
        $data['g_user'] = $this->model_laundry->get_user();
        $data['c_user'] = $this->model_laundry->count_user();
        $data['data_edit'] = $this->model_laundry->get_data_user($id);
        $data['get_outlets'] = $this->model_laundry->get_outlets();
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('user/edit_user',$data);
        $this->load->view('admin/templates/footer');
    }
    public function action_edit(){
        $this->model_laundry->edit_user();
    } 
    //Print XLS
    public function user_print_xls(){
        header('Content-Type: application / vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="All_Data_User.xls"');
        header('Cache-Control: max-age=0');

        $data['get_user']=$this->model_laundry->get_user();
        $this->load->view('user/user_preview',$data);

    }
}
?>