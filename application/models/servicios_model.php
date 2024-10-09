<?php 

class Servicios_model extends CI_Model
{

	public function listaServiciosdb($estado)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado',$estado);
		$this->db->order_by('S.nombre', 'asc'); 
		
		return $this->db->get();
	}



	
	public function listaServiciosNOAgregadosdb($estado,$ids)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado', $estado);
		$this->db->where_not_in('S.id', $ids);
		$this->db->order_by('S.nombre', 'asc');

		return $this->db->get();
	}

	public function datoServiciosdb($estado,$id)
	{
		$this->db->select('S.id, S.nombre, S.descriccion, S.unidadMedida AS medida, S.precio, S.maximo ,S.gasto, S.imagen');
		$this->db->from('servicios S');
		$this->db->where('S.estado', $estado);
		$this->db->where('S.id', $id);
		$this->db->order_by('S.nombre', 'asc'); 
		return $this->db->get();
	}


		public function agregarServiciosdb($data) {
			$this->db->trans_start();
			
			$this->db->insert('servicios', $data);
			
			$ultimoId = $this->db->insert_id();
			$data3 = array('imagen' => $ultimoId . '.jpg');
			$this->db->where('id', $ultimoId);
			$this->db->update('servicios', $data3);
			
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return false;
			} else {
				return $ultimoId;
			}
		}
		

	

	public function eliminardb($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('servicios',$data);
		return $this->db->affected_rows();
	}



  		public function modificarServiciodb($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('servicios',$data);
		return $this->db->affected_rows();
	}
  	public function listaServiciosBuscardb($valor)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado',1);
		$this->db->like('S.nombre',$valor);
		$this->db->or_like('S.descriccion',$valor);
		$this->db->or_like('S.maximo',$valor);
		$this->db->order_by('S.nombre', 'asc'); 
		
		return $this->db->get();
	}
	public function existeServiciodb($nombreServicio)
{
    $this->db->select('S.id, S.nombre, S.descriccion, S.unidadMedida AS medida, S.precio, S.maximo');
    $this->db->from('servicios S');
    $this->db->where('S.estado', 1);
    $this->db->where('S.nombre', $nombreServicio); // Verifica el nombre exacto

    // Ejecuta la consulta
    $query = $this->db->get();
    
    // Si el número de filas es mayor a 0, significa que existe el servicio
    if ($query->num_rows() > 0) {
        return true; // Existe
    } else {
        return false; // No existe
    }
}



}

