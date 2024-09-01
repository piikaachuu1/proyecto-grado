<?php 

class Usuario_model extends CI_Model
{


	 public function validarLogin($username,$pwd)
    {

		
		$this->db->select('U.id AS idUsuario, U.nombreUsuario,U.email,T.rol');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('nombreUsuario',$username);
		$this->db->where('password',$pwd);
		$this->db->where('estado',1);

		return $this->db->get();
    }

	public function listarUsuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');

		$this->db->where('estado',1);
		return $this->db->get();
      
	}

	public function tipoRol()//importnte 
	{
		$this->db->select('*');
		$this->db->from('tipoUsuario');
		return $this->db->get();
	}
 public function datosUsuariodb($estado,$idSession)// ListarUsuarios usuarios
  {
  	$this->db->select('U.id, U.nombre,U.primerApellido,IFNULL(U.segundoApellido,"") AS segundoApellido,U.ci,U.fechaNacimiento,U.sexo ,U.nombreUsuario,U.email,T.id AS idRol, T.rol ');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('U.id !=',$idSession);

		return $this->db->get();
  }





	
	public function agregarUsuariodb($data1, $nombreUsuario)
{
    $this->db->trans_start(); // Inicio de la transacción

    $this->db->insert('usuario', $data1);
    $idUsuario = $this->db->insert_id();

    $data2['nombreUsuario'] = generarUsuario($nombreUsuario . $idUsuario);
    $this->db->where('id', $idUsuario);
    $this->db->update('usuario', $data2);

    $this->db->trans_complete(); // Fin de la transacción

    if ($this->db->trans_status() === FALSE) {
        return false;
    }

    return generarUsuario($nombreUsuario . $idUsuario);
}









public function usuarioDatosBuscardb($estado, $idSession, $valor)
{
    $this->db->select('U.id, U.nombre, U.primerApellido, IFNULL(U.segundoApellido,"") AS segundoApellido, U.ci, U.fechaNacimiento, U.sexo, U.nombreUsuario, U.email, T.id AS idRol, T.rol');
    $this->db->from('usuario U');
    $this->db->join('tipoUsuario T', 'T.id=U.idTipoUsuario');
    $this->db->where('U.estado', $estado);
    $this->db->where('U.id !=', $idSession);
    $this->db->group_start();
    $this->db->like('U.nombreUsuario', $valor);
    $this->db->or_like('U.nombre', $valor);
    $this->db->or_like('U.ci', $valor);
    $this->db->or_like('T.rol', $valor);
    $this->db->group_end();
    
    return $this->db->get();
}



  public function datosUsuarioID($id,$estado)// gestion usuairo
  {
  	
		$this->db->select('U.id, U.nombre,U.primerApellido,IFNULL(U.segundoApellido,"") AS segundoApellido,U.ci,U.fechaNacimiento,U.sexo ,U.nombreUsuario,U.email,T.id AS idRol, T.rol ');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('U.id',$id);
		return $this->db->get();
  }

  	public function elimnarHabiltarDatosUsuariodb($id,$estado)//eliminar gestion usurios
    {
    	$this->db->where('id',$id);
    	$data['estado']=$estado;
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
		 $this->db->update('usuario',$data);
    }


   public function elimnarHabiltarDatosUsuariodbFisico($id){
    $this->db->where('id',$id);
    	
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
		 $this->db->delete('usuario');
    
   }


public function modificarUsuariodb($data1, $id)
{
    $this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false);
    $this->db->where('id', $id);
    $this->db->update('usuario', $data1);

    return $this->db->affected_rows();
}


	public function cambiarpwddb($pwd,$id){

			$this->db->where('id',$id);
			$data['password']=$pwd;
			$this->db->update('usuario',$data);
				

	}
  
public function usuarioConCi($ci)
{
    $this->db->select('*');
    $this->db->from('usuario U');
    $this->db->join('tipoUsuario T', 'T.id=U.idTipoUsuario');
    $this->db->where('estado', 1);
    $this->db->where('ci', $ci);

    $query = $this->db->get();

    return $query->num_rows() > 0; 
}
 
public function usuarioConCiModificar($ci,$id)
{
    $this->db->select('*');
    $this->db->from('usuario U');
    $this->db->join('tipoUsuario T', 'T.id=U.idTipoUsuario');
    $this->db->where('estado', 1);
    $this->db->where('U.id<>', $id);

    $this->db->where('ci', $ci);

    $query = $this->db->get();

    return $query->num_rows() > 0; 
}

}
 
