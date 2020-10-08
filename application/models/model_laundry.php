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

    //User
    public function get_user(){
        $data = $this->db->get('tb_user');
        return $data->result();
    }
    public function count_user(){
        $data = $this->db->get('tb_user');
        return $data->num_rows();
    }
    public function save_user(){
        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file'] = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        $data = array(
            'id' => "",
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            // 'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_outlet' => $this->input->post('id_outlet'),
            'role' => $this->input->post('role'),
            'image' => $data['file_name']

        );

        $this->db->insert('tb_user',$data);
        header("Location:".base_url('Admin/user'));
    }
    public function get_data_user($id){
        $data = $this->db->query("SELECT * FROM tb_user WHERE id='$id'");
        return $data -> result();
    }
    public function edit_user(){
        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file'] = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        $id = $this->input->post('id');
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            // 'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_outlet' => $this->input->post('id_outlet'),
            'role' => $this->input->post('role'),
            'image' => $data['file_name']

        );

        $this->db->where('id' , $id);
        $this->db->update('tb_user' , $data);
        header("Location:".base_url('Admin/user'));
    }
    public function delete_user($id){
        $this->db->delete('tb_user',array('id' => $id));
    }

    //Outlet
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
        $data = $this->db->get('tb_member');
        return $data->result();
    }
    public function get_customer($table){
        return $this->db->get($table);
    }
    public function save_customer($data,$table){
        $this->db->insert($table, $data);
    }
    public function get_data_customer($table, $where){
        return $this->db->get_where($table, $where);
    }
    public function edit_customer($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete_customer($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Package
    public function get_packages(){
        $data = $this->db->get('tb_package');
        return $data->result();
    }
    public function get_package($table){
        return $this->db->get($table);
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


}
?>