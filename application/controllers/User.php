<?php
defined('BASEPATH') OR exit ('No direct script acces allowed');

class User extends CI_Controller{
   
   
    public function index(){
        $data['konten']="home";
        $this->load->view('template',$data);
    }
    public function data_diri(){
        $data['konten']="data_diri";
        $this->load->view('template',$data);
    }
    public function gallery(){
        $data['konten']="gallery";
        $this->load->view('template',$data);
    }
    public function tujuan(){
        $data['konten']="tujuan";
        $this->load->view('template',$data);
    }
    public function akhir(){
        $data['konten']="akhir";
        $this->load->view('template',$data);
    }
    public function kategori()
    {
    $data['konten']="v_kategori";
    $this->load->model('kategori_model');
    $data['data_kategori']=$this->kategori_model->get_kategori();
    $this->load->view('template',$data ,FALSE);
    }
   
    public function simpan_kategori()
    {
   
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori',
    'trim|required', array('required' => 'nama kategori harus diisi'));
   
    if ($this->form_validation->run() == TRUE) {
    $this->load->model('kategori_model','kat');
    $masuk=$this->kat->masuk_db();
    if($masuk==true){
    $this->session->set_flashdata('pesan', 'sukses masuk');
    } else {
    $this->session->set_flashdata('pesan', 'gagal masuk');
    }
    redirect(base_url('index.php/kategori'),'refresh');
   
    } else {
   
    $this->session->set_flashdata('pesan', validation_errors());
    redirect(base_url('index.php/kategori'),'refresh');
    
    }
   
    }
    public function barang()
    {
    $data['konten']="v_barang";
    $this->load->model('kategori_model');
    $data['data_kategori']=$this->kategori_model->get_kategori();
    $this->load->model('barang_model');
    $data{'data_barang'}=$this->barang_model->get_barang();
    $this->load->view("template",$data);
    }
    public function simpan_barang()
    {
   
    $this->form_validation->set_rules('nama_barang', 'Nama Barang',
    'trim|required', array('required' => 'nama barang harus diisi'));
    $this->form_validation->set_rules('harga', 'Harga',
    'trim|required', array('required' => 'harga harus diisi'));
    $this->form_validation->set_rules('stok', 'Stok',
    'trim|required', array('required' => 'stok harus diisi'));
    $this->form_validation->set_rules('id_kategori', 'Id Kategori',
    'trim|required', array('required' => 'id kategori harus diisi'));
   
    if ($this->form_validation->run() == TRUE)
    {
    $this->load->model('barang_model','bar');
    $masuk=$this->bar->insert_barang();
    if($masuk==true){
    $this->session->set_flashdata('pesan', 'sukses masuk');
    } else {
    $this->session->set_flashdata('pesan', 'gagal masuk');
    }
    redirect(base_url('index.php/barang'),'refresh');
   
    } else {
   
    $this->session->set_flashdata('pesan', validation_errors());
    redirect(base_url('index.php/barang'),'refresh');
   
    }
   
}
    public function __construct()
    {
        parent::__construct();
        //do magic here
        $this->load->model('User_model');
    }
 
    public function FormLogin(){
        if ($this->session->userdata('logged_in')==TRUE) {
            redirect(base_url('index.php/Pelanggan/daftarPelanggan'));
        } else {
            $this->load->view('login');
        }
        
    }
    public function Login()
    {
        $this->form_validation->set_rules('Username','Username','trim|required');
        $this->form_validation->set_rules('Password','Password','trim|required');
    
        if ($this->form_validation->run() == TRUE) {
            if ($this->User_model->CekUser() == TRUE) {
                redirect(base_url('index.php/pelanggan/daftarPelanggan'));
            } else {
            $this->session->set_flashdata('notif',"Username atau Password salah");
            redirect(base_url('index.php/User/FormLogin')); 
            }
            
        }else{
            $this->session->set_flashdata('notif',validation_errors());
            redirect(base_url('index.php/User/FormLogin')); 
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('login');
    }
}
?>