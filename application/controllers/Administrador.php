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

    //FUNCION QUE PERMITE ACTUALIZAR UN REGISTRO DE SERVICIO EN LA BASE DE DATOS
    public function actualizarServicio() {
        $id_reg = $this->input->post("id");
        $hora_salida = $this->input->post("hora_salida");
        $total_horas = $this->input->post("tot_horas");
        $total_pago = $this->input->post("tot_pago");
        $forma_pago = $this->input->post("id_forma_pago");

        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->actualizarServicio($id_reg, $hora_salida, $total_horas, $total_pago, $forma_pago)) {
                echo json_encode(array("msg" => "Servicio cerrado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error en la BD!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    //FUNCION QUE PERMITE ACTUALIZAR EL VALOR HORA EN LA BASE DE DATOS
    public function actualizarValorHora() {
        $valor = $this->input->post("valor");
        $clave = $this->input->post("key");

        if ($clave === "3F!9#") {
            if ($this->AdministradorModel->actualizarValorHora($valor)) {
                echo json_encode(array("msg" => "Valor actualizado!"));
            } else {
                echo json_encode(array("msg" => "Ha ocurrido un error en la BD!"));
            }
        } else {
            echo json_encode(array("msg" => "Validacion rechazada"));
        }
    }

    //VISTAS


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

    //CARGA VISTA CONFIGURACION
    public function vistaRepIngresos() {
        //ESTA CREADA LA SESSION DEL ADMIN?
        if ($this->session->userdata("usuario")) {
            $this->load->view('administrador/rep_ingresos');
        } else {
            redirect('login');
        }
    }

    public function formasPago() {
        echo json_encode($this->AdministradorModel->formas_pago());
    }

    public function valorHora() {
        echo json_encode($this->AdministradorModel->valorHora());
    }

    public function registros_pend() {
        echo json_encode($this->AdministradorModel->servicios_pend());
    }

    public function registros_pendPorId() {
        $id_reg = $this->input->post("id_reg");
        echo json_encode($this->AdministradorModel->registros_pendPorId($id_reg));
    }

    public function registros_cerrados() {
        echo json_encode($this->AdministradorModel->servicios());
    }

    public function totalPagos() {
        echo json_encode($this->AdministradorModel->getTotalPagos());
    }

    public function totalPagosFecha() {
        $fecha1 = $this->input->post("fecha1");
        $fecha2 = $this->input->post("fecha2");
        $key = $this->input->post("key");

        echo json_encode($this->AdministradorModel->getTotalPagosFecha($fecha1, $fecha2));
    }

}
