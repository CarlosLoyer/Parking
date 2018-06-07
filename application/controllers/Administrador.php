<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("AdministradorModel");
    }

    public function index() {
        if ($this->session->userdata("usuario")) {
            $this->load->view('template2/header');
            $this->load->view('administrador/home');
            $this->load->view('template2/footer');
        } else {
            redirect('login');
        }
    }
    
    public function servicio(){
        //EXISTE LA SESION?
        if ($this->session->userdata("usuario")) {
            $this->load->view("administrador/servicio");
        }else{
            redirect("login");
        }
        
    }

}
