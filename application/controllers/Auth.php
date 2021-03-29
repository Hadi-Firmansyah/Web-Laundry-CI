<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url','form','file');
        $this->load->model('model_laundry');

    }

	public function index(){
        if($this->session->userdata('status_log') != 'Online'){
            header(base_url());
        }else if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') == 'Admin') {
            header("Location:".base_url().'Admin/index/'.$this->session->userdata('username'));
        }else if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') == 'Cashier') {
            header("Location:".base_url().'Cashier/index/'.$this->session->userdata('username'));
        }else if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') == 'Owner') {
            header("Location:".base_url().'Owner/report/'.$this->session->userdata('username'));
        }
		$this->load->view('auth/home');
    }
    public function login(){
        // if($this->session->userdata('status_log') == 'Online' ){
        //     redirect("Auth");
        // }
        
        $data['title'] = 'Login - Laundry';
        $this->load->view('auth/login',$data);
    }
    public function action_login(){
        $usernames = $this->input->post('username');
        $passwords = $this->input->post('password');

        $where = array(
            'username' => $usernames,
            // 'password' => $passwords
            'password' => password_verify($passwords)
        );
        $check = $this->model_laundry->check_login("tb_user",$where)->num_rows();

        if($check > 0){
            $log_stat = 'Online';
            $this->model_laundry->update_login($log_stat,$usernames);
            $data= $this->model_laundry->check_login("tb_user",$where)->result();

            foreach ($data as $dataz){
                $data_session = array(
                    'id' => $dataz->id,
                    'name' => $dataz->name,
                    'username' => $dataz->username,
                    'role' => $dataz->role,
                    'image' => $dataz->image,
                    'id_outlet' => $dataz->id_outlet,
                    'status_log' => $dataz->status_log,

                );
            }

            $this->session->set_userdata($data_session);
            if($this->session->userdata('status_log') == 'Online'){
                redirect('Auth');
            }else{
                echo 'Login Failed';
            }
        }else {
            // echo "<script>alert('Username or Password Wrong!');history.go(-1);</script>";
            $this->session->set_flashdata('Failed','Username / Password Wrong!');
            redirect(base_url('Auth/login'));
        }
        
    }
    public function logout(){
        $log_stat = 'Offline';
        $this->model_laundry->update_login($log_stat,$this->session->userdata('username'));
        $this->session->sess_destroy();
        $this->session->set_flashdata('Success','Logout Success!');
        redirect(base_url('Auth/login'));
    }
}
