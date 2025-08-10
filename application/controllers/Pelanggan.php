<?php
defined('BASEPATH') or exit('no direct script access allowed');

class pelanggan extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session, $low_stock_count;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('session');
        // Hitung barang dengan stok < 10
        $this->low_stock_count = $this->db
            ->where('stok <', 10)
            ->count_all_results('barang');

    }
    public function index(){
        $data['user'] = $this->Madmin->get_all_data('user')->result();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add(){
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/formAdd');
        $this->load->view('admin/layout/footer');
    }
    public function save(){
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $dataInput = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );
        $insert = $this->Madmin->insert('user', $dataInput);
        if ($insert) {
            redirect('pelanggan/add');
        } else {
            redirect('pelanggan');
        }
    }
    public function get_by_id($id){
        $dataWhere = array('id_user' => $id);
        $data['user'] = $this->Madmin->get_by_id('user', $dataWhere)->row_object();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $dataInput = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );
        $update = $this->Madmin->update('user', $dataInput, 'id_user', $id);
        if ($update) {
            redirect('pelanggan/get_by_id');
        } else {
            redirect('pelanggan');
        }
    }
    public function delete($id){
        $this->Madmin->delete('user', 'id_user', $id);
        redirect('pelanggan');
    }
}