<?php

class AdministradorModel extends CI_Model {

    public function actualizarServicio($id_reg, $hora_salida, $total_horas, $total_pago, $id_forma_pago) {
        $this->db->where("id_reg", $id_reg);
        $data = array("hora_salida" => $hora_salida, "fecha_salida" => $hora_salida, "total_horas" => $total_horas, "total_pago" => $total_pago, "id_forma_pago" => $id_forma_pago, "estado" => "Cerrada");
        return $this->db->update("reg_servicio", $data);
    }

    public function actualizarValorHora($valor) {
        $this->db->where("id_config", 1);
        $data = array("valor" => $valor);
        return $this->db->update("config", $data);
    }

    public function eliminarServicio($id_reg) {
        $this->db->where("id_reg", $id_reg);
        return $this->db->delete("reg_servicio");
    }

    public function servicios_pend() {
        $estado = "Pendiente";
        $this->db->where("estado", $estado);
        return $this->db->get("reg_servicio")->result();
    }
    
    public function registros_pendPorId($id_reg) {
        $this->db->where("id_reg", $id_reg);
        return $this->db->get("reg_servicio")->result();
    }
    public function formas_pago() {
        return $this->db->get("forma_pago")->result();
    }

    public function valorHora() {
        $this->db->where("id_config", 1);
        return $this->db->get("config")->result();
    }

    public function insertarServicio($patente, $hora_entrada) {
        $data = array("patente" => $patente, "hora_entrada" => $hora_entrada, "estado" => "Pendiente");
        return $this->db->insert("reg_servicio", $data);
    }

    public function getTotalPagos() {
        $this->db->select_sum("total_pago");
        $this->db->from("reg_servicio");
        return $this->db->get()->result();
    }
    
    public function getTotalPagosFecha($fecha1, $fecha2) {
        $this->db->select_sum("total_pago");
        $this->db->where("fecha_salida >= ", $fecha1);
        $this->db->where("fecha_salida <= ", $fecha2);
        $this->db->from("reg_servicio");
        return $this->db->get()->result();
    }
}
