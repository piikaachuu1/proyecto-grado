<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Reportes extends CI_Controller {


		function index()
		{
			
		   

		if($this->session->userdata('rolUsuario') =='admin')
		{
			 $this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/reportes/reportesV');
		$this->load->view('inc/footerLti');
		}
		elseif($this->session->userdata('rolUsuario') =='invitado')
		{
			 $this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
			$this->load->view('invitado/asideInv');
		$this->load->view('admind/reportes/reportesV');
		$this->load->view('inc/footerLti');
		}
		
		else
		{
			redirect('usuario/login','refresh');
		}
 }
		
  public function ingresoEnfechas()
  {
  	 
	$fechaIncio=$_POST['fechaInicio'];
	$fechaFin=$_POST['fechaFin'];

	$lista=$this->reporte_model->listaServiciosdb($fechaIncio,$fechaFin);
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	// echo $fechaIncio;
  }
  	function index2()
		{
			 
		

			if($this->session->userdata('rolUsuario') =='admin')
		{
				
		 $this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/reportes/reportesChartV');
		$this->load->view('inc/footerLti');
		}
		elseif($this->session->userdata('rolUsuario') =='invitado')
		{
				
		 $this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('invitado/asideInv');
		$this->load->view('admind/reportes/reportesChartV');
		$this->load->view('inc/footerLti');
		}
		
		else
		{
			redirect('usuario/login','refresh');
		}



 }
   public function eventoFrecuentes()
  {
  	 
	$fechaIncio=$_POST['fechaInicio'];
	$fechaFin=$_POST['fechaFin'];
	$fechahoy=$_POST['fechahoy'];


	$lista=$this->reporte_model->eventoFrecuentesdb($fechaIncio,$fechaFin,$fechahoy);
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	// echo $fechaIncio;
  }
     public function serviciosMasReservados()
  { 
  	 
	$fechaIncio=$_POST['fechaInicio'];
	$fechaFin=$_POST['fechaFin'];
	$fechahoy=$_POST['fechahoy'];


	$lista=$this->reporte_model->serviciosMasReservadosdb($fechaIncio,$fechaFin,$fechahoy);
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	// echo $fechaIncio;
  }






}
?>