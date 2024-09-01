<?php 

class Cliente_model extends CI_Model
{


    public function nuevocliente($data) //nuevo cliente desde calendario de reservas
    {

        $ban = $this->db->insert('clientes', $data);


        if ($ban) {

            $ultimoid = $this->db->insert_id();
            return $ultimoid;
        } else {
            return 0;
        }
    }  

    public function listaClientedb($estado)
    {
            $this->db->select('id,nombre, primerApellido, IFNULL(segundoApellido, "") AS segundoApellido, ci, celular, telefono, estado');
            $this->db->from('clientes');
            $this->db->where('estado', $estado);
            $this->db->order_by('primerApellido', 'ASC'); 
            $this->db->order_by('segundoApellido', 'ASC'); 
            return $this->db->get();

  }    



  public function datoClientedb($id)
  {
    $this->db->select('*');

      $this->db->from('clientes');
      $this->db->where('estado',1);
      $this->db->where('id',$id);

      return $this->db->get();
  }


public function guardarCambiosdb($data, $id)
{
    $this->db->where("id", $id);
    $this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
    $this->db->update("clientes", $data);
    return $this->db->affected_rows(); // Retorna el número de campos afectados
}

 public function eliminarCliente($id,$data)
 {
     $this->db->where("id", $id);
     $result = $this->db->update("clientes", $data);

   return $result; // Retorna true si la actualización fue exitosa, false en caso contrario
}





public function buscarClientedb($valor)// buscar clientes
{
    $this->db->select('*');
     $this->db->from('clientes');
      $this->db->where('estado',1);
    $this->db->like('nombre',$valor);
    $this->db->or_like('primerApellido',$valor);
    $this->db->or_like('ci',$valor);

    $this->db->limit(5);
return $this->db->get();
}

public function verificarIdCi($ci, $id)
{
    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->where('estado', 1);
    $this->db->where('id <>', $id);
    $this->db->where('ci', $ci); // Corregir aquí    
    return $this->db->get();
}




}

