<?php
class Cashier extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_laundry');
    }
    public function index(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Cashier'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        
        $data['title'] = "Home Cashier";
        $data['count_user'] = $this->model_laundry->count_user();
        $data['count_package'] = $this->model_laundry->count_package();
        $data['count_transaction'] = $this->model_laundry->count_transaction();
        $this->load->view('cashier/templates/header',$data);
        $this->load->view('cashier/templates/sidebar',$data);
        $this->load->view('cashier/templates/topbar',$data);
        $this->load->view('cashier/home',$data);
        $this->load->view('cashier/templates/footer');
    } 
    public function customer(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Cashier'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        $data['title'] = "Customer";
        $this->load->view('cashier/templates/header',$data);
        $this->load->view('cashier/templates/sidebar',$data);
        $this->load->view('cashier/templates/topbar',$data);
        $this->load->view('customer/customer',$data);
        $this->load->view('cashier/templates/footer',$data);
    }
    public function transaction(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Cashier'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        
        $data['title'] = "Transaction";
        $id = $this->session->userdata('id_outlet');
        $data['get_package_outlet'] = $this->model_laundry->get_package_outlet($id);
        $data['get_packages'] = $this->model_laundry->get_packages();//Tidak Terpakai
        $data['get_customers'] = $this->model_laundry->get_customers();
        $this->load->view('cashier/templates/header',$data);
        $this->load->view('cashier/templates/sidebar',$data);
        $this->load->view('cashier/templates/topbar',$data);
        $this->load->view('transaction/transaction',$data);
        $this->load->view('cashier/templates/footer',$data);
    }
    public function payment(){
        if($this->session->userdata('status_log') == 'Online' && $this->session->userdata('role') != 'Cashier'){
            redirect('Auth');
        }else if($this->session->userdata('status_log') != 'Online'){
            redirect('Auth');
        }
        
        $data['title'] = "Payment";
        $this->load->view('cashier/templates/header',$data);
        $this->load->view('cashier/templates/sidebar',$data);
        $this->load->view('cashier/templates/topbar',$data);
        $this->load->view('payment/payment',$data);
        $this->load->view('cashier/templates/footer',$data);
    }
    
}

?> 