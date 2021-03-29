<?php
class Owner extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    public function index(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Owner'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Home Owner";
        // $data['c_foods'] = $this->model_laundry->count_foods();
        // $data['c_order'] = $this->model_pos->count_order();
        $data['count_user'] = $this->model_laundry->count_user();
        $data['count_package'] = $this->model_laundry->count_package();
        $data['count_transaction'] = $this->model_laundry->count_transaction();
        // $data['count_package'] = $this->model_laundry->count_package();
        $this->load->view('owner/templates/header',$data);
        $this->load->view('owner/templates/sidebar',$data);
        $this->load->view('owner/templates/topbar',$data);
        $this->load->view('owner/home',$data);
        $this->load->view('owner/templates/footer');
    }
    public function report(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Owner'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        
        $data['count_user'] = $this->model_laundry->count_user();
        $data['count_package'] = $this->model_laundry->count_package();
        $data['count_transaction'] = $this->model_laundry->count_transaction();

        $data['title'] = "Report";
        $this->load->view('owner/templates/header',$data);
        $this->load->view('owner/templates/sidebar',$data);
        $this->load->view('owner/templates/topbar',$data);
        $this->load->view('report/report',$data);
        $this->load->view('owner/templates/footer',$data);
    }
    
    
}

?> 