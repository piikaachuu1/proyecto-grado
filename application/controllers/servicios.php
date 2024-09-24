<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Servicios extends CI_Controller {

  public function index()
 {
 		
		if($this->session->userdata('rolUsuario') =='admin')
		{
			$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/servicio/listaServicio');
		$this->load->view('inc/footerLti');


		}
		elseif($this->session->userdata('rolUsuario') =='invitado')
		{
			$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('invitado/asideInv');
		$this->load->view('admind/servicio/listaServicio');
		$this->load->view('inc/footerLti');

		}
		
		else
		{
			redirect('usuario/login','refresh');
		}
 }
 public function listaServicios()
 {
 		$estado=1;
 		$lista=$this->servicios_model->listaServiciosdb($estado);
 		$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
		echo json_encode($listaArray);
 
 }
  public function listaServiciosNOAgregados()//lista servicio que no esta agregado aldetralle reserva 
 {
  $ids=$_POST['ids'];
 		$estado=1;
 		$lista=$this->servicios_model->listaServiciosNOAgregadosdb($estado,$ids);
 		$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
		echo json_encode($listaArray);
 
 }
 public function agregarServicio()
 {
	$this->load->library('form_validation');

	// $idServicio = $this->db->insert_id(); // Obtener el ID del servicio recién agregado
	$idServicio=2;
	
	$nombre=$idServicio.'.jpg';
	// Configuración para la subida de la imagen
	$config['upload_path'] = './uploads/servicios/';
	$config['allowed_types'] = 'jpg|jpeg|png'; 
	$config['file_name'] =$nombre;// Tipos permitidos
	$direcccion='.uploads/servicios/'.$nombre;
	

	if(file_exists($direcccion))
	{
		unlink($direcccion);
	}
	$this->load->library('upload', $config);

	if (!$this->upload->do_upload()) {
		$data['error']=$this->upload->display_errors();
	} else {
		$this->upload->data();
// echo json_encode(array('msg' => 'Ok', 'uri' => 1));

	}
	

	// Definir reglas de validación para los campos
	$this->form_validation->set_rules('nombreServicio', 'Nombre del Servicio', 'required|min_length[2]');
	$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
	$this->form_validation->set_rules('medida', 'Unidad de Medida');
	$this->form_validation->set_rules('precio', 'Precio', 'required');
	$this->form_validation->set_rules('maximo', 'Máximo', 'required');
	if ($this->form_validation->run() === FALSE) {
		
		echo json_encode(array('msg' => 'Verifique los campos', 'uri' => 2));
		
	}
	else{
		$data['nombre'] = $_POST['nombreServicio'];
		$data['descriccion'] = $_POST['descripcion'];
		$data['unidadMedida'] = $_POST['medida'];
		$data['precio'] = $_POST['precio'];
		$data['maximo'] = $_POST['maximo'];
		$data['imagen'] = "default.jpg"; // Imagen por defecto en caso de que no se suba una imagen
		$data['idUsuario'] = $this->session->userdata('idUsuario');
	
		// Intentar agregar el servicio a la base de datos
		if ($this->servicios_model->agregarServiciosdb($data) > 0) {
			
	
			// Subida y proceso exitoso
	
		} else {
			echo json_encode(array('msg' => 'Fallo al agregar servicio', 'uri' => 0));
		}
   
	}

 }
 
 public function eliminar()
 {
 	    		
 			$id=$_POST['id'];
 			$data['estado']=$_POST['estado'];
 			$row=$this->servicios_model->eliminardb($id,$data);
 		if($row>0){

						echo json_encode(array('msg'=>'Ok','uri'=>1));	
 		}
 		else
 		{
						echo json_encode(array('msg'=>'fallo','uri'=>0));	

 		}
 }

 public function datoServicio()
 {
 			
 		$estado=1;
 		$id=$_POST['id'];
 		$lista=$this->servicios_model->datoServiciosdb($estado,$id);
 		// $listaArray = $lista->result_array();
		$listaArray = $lista->row_array();
		echo json_encode($listaArray);

 }


 public function modificarServicio()
 {
 			$id=$_POST['idServicio'];		

 			$data['nombre']=$_POST['nombreServicioM'];
 			$data['descriccion']=$_POST['descripcionM'];
 			$data['unidadMedida']=$_POST['medidaM'];
 			$data['precio']=$_POST['precioM'];
 			$data['maximo']=$_POST['maximoM'];		
 		if($this->servicios_model->modificarServiciodb($id,$data)>0){

						echo json_encode(array('msg'=>'Ok',
																			
																				'uri'=>1));	

 		}
 		else
 		{
						echo json_encode(array('msg'=>'fallo',
																			'uri'=>0));	

 		}
 		
			
 
 }
 function listaServiciosBuscar()
 {
 	$valor=$_POST['valor'];		
 	$estado=1;
 		$lista=$this->servicios_model->listaServiciosBuscardb($valor);
 		$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
		echo json_encode($listaArray);
 }
 public function subirImagen()
 {
			 // $foto='name';
	 $data['nombre']=$_POST['nombre'];
	 $data['descripcion']=$_POST['descripcion'];
			 $data['idUsuario']=1;//recupera usuario desde datos de sessciones 
			 $nombreArchivo=$this->usuario_model->agregarActiviadadBD($data).'.jpg';

			 $config['upload_path']='./uploads/usuario/';
			 $config['file_name']=$nombreArchivo;
			 $direccion='./uploads/usuario/'.$nombreArchivo;
			 if(file_exists($direccion))
			 {
				 unlink($direccion);
			 }
			 $config['allowed_types']='jpg';
			 $this->load->library('upload',$config);
			 
			 if(!$this->upload->do_upload())
			 {
				 $data['error']=$this->upload->display_errors();
				 echo $this->upload->display_errors();
			 }
			 else
			 {
				 $this->upload->data();
			 }

		 }
}