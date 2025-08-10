<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Adminpanel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Madmin'); // Buat model untuk verifikasi login
    }
    public $input, $Madmin, $db, $form_validation, $session;
    public function index()
    {
        $this->load->view('admin/login');
    }
    public function dashboard()
    {
        $data['total_barang'] = $this->Madmin->get_total_barang();
        $data['total_pelanggan'] = $this->Madmin->get_total_pelanggan();
        $data['total_transaksi'] = $this->Madmin->get_total_transaksi();
        $data['total_bayar'] = $this->Madmin->get_total_bayar();
        $data['transactions'] = $this->Madmin->get_transactions();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function login()
    {
        $this->load->model('Madmin');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Madmin->cek_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'id_user' => $user->id_user,
                'name'    => $user->name,
                'username'=> $user->username,
                'role'    => $user->role,
                'logged_in' => TRUE
            ]);
            redirect('barang');
        } else {
            redirect('Adminpanel');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }

    public function update_status($id_transaksi, $new_status)
    {
        $this->Madmin->update_status($id_transaksi, $new_status);
        redirect('Adminpanel/dashboard');
    }
}
