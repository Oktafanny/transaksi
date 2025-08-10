<?php
defined('BASEPATH') or exit('no direct script access allowed');

class transaksi extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session, $low_stock_count;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        // Hitung barang dengan stok < 10
        $this->low_stock_count = $this->db
            ->where('stok <', 10)
            ->count_all_results('barang');
    }

    public function index(){
        $data['transaksi'] = $this->Madmin->get_all_data('transaksi')->result();
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $data['user'] = $this->Madmin->get_all_data('user')->result();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/transaksi/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add(){
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $data['user'] = $this->Madmin->get_all_data('user')->result();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/transaksi/formAdd', $data);
        $this->load->view('admin/layout/footer');
    }
    public function save(){
        $id_barang = $this->input->post('id_barang');
        $id_user = $this->input->post('id_user');
        $tanggal = $this->input->post('tanggal');
        $tipe_barang = $this->input->post('tipe_barang');
        $dataInput = array(
            'id_barang' => $id_barang,
            'id_user' => $id_user,
            'tanggal' => $tanggal,
            'tipe_barang' => $tipe_barang,
        );
        $insert = $this->Madmin->insert('transaksi', $dataInput);
        if ($insert) {
            redirect('transaksi/add');
        } else {
            redirect('transaksi');
        }
    }
    public function get_by_id($id){
        $dataWhere = array('id_transaksi' => $id);
        $data['transaksi'] = $this->Madmin->get_by_id('transaksi', $dataWhere)->row_object();
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $data['user'] = $this->Madmin->get_all_data('user')->result();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/transaksi/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit(){
        $id = $this->input->post('id');
        $id_barang = $this->input->post('id_barang');
        $id_user = $this->input->post('id_user');
        $tanggal = $this->input->post('tanggal');
        $tipe_barang = $this->input->post('tipe_barang');
        $dataInput = array(
            'id_transaksi'=> $id,
            'id_user' => $id_user,
            'tanggal' => $tanggal,
            'tipe_barang' => $tipe_barang,
            'id_barang' => $id_barang
        ); $update = $this->Madmin->update('transaksi', $dataInput, 'id_transaksi', $id);
        if ($update) {
            redirect('transaksi/get_by_id');
        } else {
            redirect('transaksi');
        }}
    public function delete($id){
        $this->Madmin->delete('transaksi', 'id_transaksi', $id);
        redirect('transaksi');
    }
}