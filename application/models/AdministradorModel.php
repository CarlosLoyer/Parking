<?php

class AdministradorModel extends CI_Model{
    
    
    public function insertarServicio($patente, $hora_entrada){
        $data = array("patente"=>$patente, "hora_entrada"=>$hora_entrada);
        return $this->db->insert("reg_servicio", $data);
        
    }
    
    public function salidaServicio($id_reg, $hora_salida, $fecha_salida, $total_horas, $total_pago, $id_forma_pago){
        $this->db->where("id_reg", $id_reg);
        $data = array("hora_salida"=>$hora_salida, "fecha_salida"=>$fecha_salida, "total_horas"=>$total_horas, "total_pago"=>$total_pago, "id_forma_pago"=>$id_forma_pago);
        return $this->db->update("reg_servicio", $data);
    }
    
    public function eliminarServicio($id_reg){
        $this->db->where("id_reg", $id_reg);
        return $this->db->detele("reg_servicio");
    }
    
    public function servicios_pend(){
        $estado = "Pendiente";
        $this->db->where("estado", $estado);
        return $this->db->get("reg_servicio")->result();
    }
    
}
