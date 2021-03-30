<?php
Class model_laundry extends CI_Model{

    //Login
    public function check_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    //Logout
    public function update_login($log_stat,$usernames){
        $this->db->set('status_log',$log_stat);
        $this->db->where('username',$usernames);
        $this->db->update('tb_user');
    }

    ////// CRUD USER DENGAN PHP //////
    //Get Data Dari Table User
    public function get_user(){
        $data = $this->db->get('tb_user');
        return $data->result();
    }
    //Get Jumlah Isi Dari Table User
    public function count_user(){
        $data = $this->db->get('tb_user');
        return $data->num_rows();
    }
    //Save Data User
    public function save_user(){
        $config['upload_path'] = './profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048000';
        $config['width'] = '300';
        $config['height'] = '300';  
        $config['file_name'] = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        //Yang kiri Field Database Yang Kanan Name Form
        $data = array(
            'id' => "",
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),
            // 'password' => $this->input->post('password'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_outlet' => $this->input->post('id_outlet'),
            'role' => $this->input->post('role'),
            'image' => $data['file_name'],
            'status_log' => 'Offline'

        );
 
        $this->db->insert('tb_user',$data);
        header("Location:".base_url('Admin/user'));
    }
    //Get Data User Berdasarkan ID
    public function get_data_user($id){
        $data = $this->db->query("SELECT * FROM tb_user WHERE id='$id'");
        return $data -> result();
    }
    //Edit Data User
    public function edit_user(){
        $config['upload_path'] = './profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048000';
        $config['width'] = '300';
        $config['height'] = '300';  
        $config['file_name'] = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        $id= $this->input->post('id');
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),
            // 'password' => $this->input->post('password'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_outlet' => $this->input->post('id_outlet'),
            'role' => $this->input->post('role'),
            'image' => $data['file_name']

        );

        $this->db->where('id' , $id);
        $this->db->update('tb_user' , $data);
        header("Location:".base_url('Admin/user'));
    }
    //Delet Data User
    public function delete_user($id){
        $this->db->delete('tb_user',array('id' => $id));
    }

    // Outlets
    public function get_outlets(){
        $data = $this->db->get('tb_outlet');
        return $data->result();
    }
    public function get_outlet($table){
        return $this->db->get($table);
    }
    public function save_outlet($data,$table){
        $this->db->insert($table, $data);
    }
    public function get_data_outlet($table, $where){
        return $this->db->get_where($table, $where);
    }
    public function edit_outlet($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete_outlet($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Customer
    public function get_customers(){
        $data = $this->db->get('tb_customer');
        return $data->result();
    }
    public function get_customer1($table){
        return $this->db->get($table);
    }

    //PHP
    public function get_customer(){
        $data = $this->db->get('tb_customer');
        return $data->result();
    }
    //PHP Get Jumlah Isi Dari Table CUSTOMER
    public function count_customer(){
        $data = $this->db->get('tb_customer');
        return $data->num_rows();
    }
    public function save_customer1($data,$table){
        $this->db->insert($table, $data);
    }
    public function save_customer(){
        $data = array (
            'id' => "",
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),

        );
        $this->db->insert('tb_customer',$data);
        $this->session->set_flashdata('Message','Data has been added!');
        redirect('Admin/customer2');
    }
    public function get_data_customer($id){
        $data = $this->db->query("SELECT * FROM tb_customer WHERE id='$id'");
        return $data -> result();
    }
    //PHP
    public function edit_customer(){
        $id = $this->input->post('id');
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
        );

    $this->db->where('id' , $id);
    $this->db->update('tb_customer' , $data);
    redirect('Admin/customer2');
    }
    public function get_data_customer1($table, $where){
        return $this->db->get_where($table, $where);
    }
    public function edit_customer1($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //PHP
    public function delete_customer($id){
        $this->db->delete('tb_customer',array('id' => $id));
    }
    public function delete_customer1($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_data_location($table, $where){
        return $this->db->get_where($table, $where);
    }

    //Package
    //Menampilkan Data All Package
    public function get_packages(){
        $data = $this->db->get('tb_package');
        return $data->result();
    }
    public function get_package($table){
        return $this->db->get($table);
    }
    public function count_package(){
        $data = $this->db->get('tb_package');
        return $data->num_rows();
    }
    public function save_package($data,$table){
        $this->db->insert($table, $data);
    }
    public function get_data_package($table, $where){
        return $this->db->get_where($table, $where);
    }
    public function edit_package($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete_package($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

     ////// CRUD TRANSACATION DENGAN AJAX //////
    //Menampilkan Data Ke View Dengan Php
    public function get_transactions(){
        $data = $this->db->get('tb_transaction');
        return $data->result();
    }
    //Menampilkan Jumlah Data Table Dalam Bentuk Angka
    public function count_transaction(){
        $data = $this->db->get('tb_package');
        return $data->num_rows();
    }
    //Menampilkan Seluruh Data Ke View Dengan Ajax
    public function get_transaction($id){
        // return $this->db->get($table);
        $data = $this->db->query("SELECT * FROM tb_transaction WHERE id_outlet='$id'");
        return $data->result();

    }
    //Get data harga dari table package berdasarkan id
    public function get_price($id){
        $data = $this->db->get_where('tb_package',['id' => $id]);
        return $data;
    }
    //Mengirim data ke table transaction
    public function save_transaction($data,$table){
        $this->db->insert($table, $data);
    }
    public function get_data_transaction($table, $where){
        return $this->db->get_where($table, $where);
    }
    //Menampilkan Package Sesuai Outlet
    public function get_package_outlet($id){
        $data = $this->db->query("SELECT * FROM tb_package WHERE id_outlet='$id'");
        return $data->result();
    }
    public function get_data_transaction_user($id){
        $data = $this->db->query("SELECT * FROM tb_transaction WHERE id_user='$id'");
        return $data->result();
    }

    //Payment
    public function get_payments(){
        $data = $this->db->get('tb_payment');
        return $data->result();
    }
    public function save_payment($data,$table){
        $this->db->insert($table, $data);
    }
    public function get_payment($table){
        return $this->db->get($table);
    }


}
?>