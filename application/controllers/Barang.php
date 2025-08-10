<?php
defined('BASEPATH') or exit('no direct script access allowed');

class barang extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session;
    public $low_stock_count;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        // Hitung barang yang stoknya kurang dari 10
        $this->low_stock_count = $this->db
            ->where('stok <', 10)
            ->count_all_results('barang');
    }

    public function index(){
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $data['low_stock_count'] = $this->low_stock_count;
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add(){
        // $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/menu',['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/formAdd');
        $this->load->view('admin/layout/footer');
    }
    public function save(){
        // $id_barang = $this->input->post('id_barang');
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $stok = $this->input->post('stok');
        $lokasi_rak = $this->input->post('lokasi_rak');
        $dataInput = array(
            // 'id_kategori' => $id_barang,
            'nama' => $nama,
            'kode' => $kode,
            'stok' => $stok,
            'lokasi_rak' => $lokasi_rak
        );
        $insert = $this->Madmin->insert('barang', $dataInput);
        if ($insert) {
            redirect('barang/add');
        } else {
            redirect('barang');
        }
    }
    public function get_by_id($id){
        $dataWhere = array('id_barang' => $id);
        $data['barang'] = $this->Madmin->get_by_id('barang', $dataWhere)->row_object();
        $this->load->view('admin/layout/menu', ['low_stock_count' => $this->low_stock_count]);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $stok = $this->input->post('stok');
        $lokasi_rak = $this->input->post('lokasi_rak');
        $dataInput = array(
            'id_barang'=> $id,
            'nama' => $nama,
            'kode' => $kode,
            'stok' => $stok,
            'lokasi_rak' => $lokasi_rak
        ); $update = $this->Madmin->update('barang', $dataInput, 'id_barang', $id);
        if ($update) {
            redirect('barang/get_by_id');
        } else {
            redirect('barang');
        }}
    public function delete($id){
        $this->Madmin->delete('barang', 'id_barang', $id);
        redirect('barang');
    }
}