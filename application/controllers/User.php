<?php
defined('BASEPATH') or exit('no direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Madmin'); 
    }
    public $input, $Madmin, $db, $form_validation, $session;
    public function index(){
        $this->load->view('user/login');
    }
    public function dashboard(){
        $nama = $this->input->post('nama');
        $user = $this->Madmin->getUserByName($nama); 
        if ($user) {
            $this->session->set_userdata('user_data', $user);
            $data['kategori'] = $this->Madmin->getKategoriBarang();
            $data['barang'] = $this->Madmin->getAllBarang();

            $this->load->view('user/dashboard', $data);
        } else {
            redirect('user/index');
        }}
    public function dashboard2(){
        if ($this->session->userdata('user_data')) {
            $data['kategori'] = $this->Madmin->getKategoriBarang(); 
            $data['barang'] = $this->Madmin->getAllBarang();

            $this->load->view('user/dashboard', $data);
        } else {
            redirect('user/index');
        }}
    public function logout(){
        $this->session->unset_userdata('user_data'); 
        redirect('user/index');
    }
    public function transaction_history(){
        $user_data = $this->session->userdata('user_data');
        if ($user_data) {
            $data['transactions'] = $this->Madmin->getTransactionHistory($user_data->id_pelanggan);
            $this->load->view('user/transaction_history', $data);
        } else {
            redirect('user/index');
        }
    }
}
