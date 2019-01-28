<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['konten']="v_Dashboard";
        $this->load->view("template",$data);
            
    }
  public function kontak(){
      $data['konten']="v_kontak";
      $this->load->view("template",$data);
      
  }
  public function ada(){
    $data['konten']="v_ada";
    $this->load->view("template",$data);
    
}
public function ini(){
    $data['konten']="v_ini";
    $this->load->view("template",$data);
    
}
public function bisa(){
    $data['konten']="v_bisa";
    $this->load->view("template",$data);
    
}
}

?>