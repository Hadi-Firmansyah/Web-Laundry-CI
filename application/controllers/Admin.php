<?php
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    public function index(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Admin'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Dashboard Administrator";
        // $data['c_foods'] = $this->model_laundry->count_foods();
        // $data['c_order'] = $this->model_pos->count_order();
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/templates/footer');
    }
    public function user(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Admin'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "User";
        $data['g_user'] = $this->model_laundry->get_user();
        $data['c_user'] = $this->model_laundry->count_user();
        $data['get_outlet'] = $this->model_laundry->get_outlets();
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('user/user',$data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function outlet(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Admin'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Outlet";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('outlet/outlet',$data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function customer(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Admin'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Customer";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('customer/customer',$data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function package(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Admin'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Package";
        // $data['g_user'] = $this->model_laundry->get_user();
        // $data['c_user'] = $this->model_laundry->count_user();
        // $data['get_outlet'] = $this->model_laundry->get_outlets();  
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('package/package',$data);
        $this->load->view('admin/templates/footer',$data);
    }
    public function transaction(){
        $data['title'] = "Transaction";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/templates/topbar',$data);
        $this->load->view('transaction/transaction',$data);
        $this->load->view('admin/templates/footer',$data);
    }
    
    
}

?> 