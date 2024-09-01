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
 			$data['nombre']=$_POST['nombreServicio'];
 			$data['descriccion']=$_POST['descripcion'];
 			$data['unidadMedida']=$_POST['medida'];
 			$data['precio']=$_POST['precio'];
 			$data['maximo']=$_POST['maximo'];

 			$data['idUsuario']=$this->session->userdata('idUsuario');

						
 		if($this->servicios_model->agregarServiciosdb($data)>0){

						echo json_encode(array('msg'=>'Ok',
																			
																				'uri'=>1));	

 		}
 		else
 		{
						echo json_encode(array('msg'=>'fallo',
																			'uri'=>0));	

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

}