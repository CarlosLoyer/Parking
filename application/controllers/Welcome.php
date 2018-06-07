<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario');
    }

    public function index() {
        $this->load->view('template1/header');
        $this->load->view('login');
        $this->load->view('template1/footer');
    }

    public function recuperar() {
        $this->load->view('template1/header');
        $this->load->view('recuperar');
        $this->load->view('template1/footer');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $arrayUser = $this->Usuario->login($username, md5($password));
        //[{rut=>1-1, nombre=>juan,...}] <=  lo de arriba debiera devolver algo asi
        if (count($arrayUser) > 0) {
            if ($arrayUser[0]->estado == 'Activo') {
                //CREAR UNA SESION
                $this->session->set_userdata("usuario", $arrayUser);
                echo json_encode(array("msg" => "Activo"));
            } else {
                echo json_encode(array("msg" => "Bloqueado"));
            }
        } else {
            echo json_encode(array("msg" => "0"));
        }
    }
    
    public function logout(){
        
        $this->session->sess_destroy();
        redirect('login');
    }

}
