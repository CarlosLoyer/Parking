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

    //FUNCION QUE PERMITE INSERTAR UN NUEVO SERVICIO EN LA BASE DE DATOS
    public function insertarServicio() {
        $patente = $this->input->post("patente");
        $hora_entrada = $this->input->post("hora_entrada");

        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->insertarServicio($patente, $hora_entrada)) {
                echo json_encode(array("msg" => "Vehículo ingresado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error de BD!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    //FUNCION QUE PERMITE ELIMINAR UN REGISTRO DE SERVICIO EN LA BASE DE DATOS
    public function eliminarServicio() {
        $id_reg = $this->input->post("id");
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->eliminarServicio($id_reg)) {
                echo json_encode(array("msg" => "Registro eliminado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error en la BD!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    public function vistaServicio() {
        //EXISTE LA SESION?
        if ($this->session->userdata("usuario")) {
            $this->load->view("administrador/servicio");
        } else {
            redirect("login");
        }
    }

    //CARGA VISTA CONFIGURACION
    public function vistaConfig() {
        //ESTA CREADA LA SESSION DEL ADMIN?
        if ($this->session->userdata("usuario")) {
            $this->load->view('administrador/config');
        } else {
            redirect('login');
        }
    }

    public function registros_pend() {
        echo json_encode($this->AdministradorModel->servicios_pend());
    }

    public function registros_cerrados() {
        echo json_encode($this->AdministradorModel->servicios());
    }

}
