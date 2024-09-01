<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Reservas extends CI_Controller {

  public function index()
 {
 		

    if($this->session->userdata('rolUsuario') =='admin')
    {
       $this->load->view('inc/cabezeraLti');
    $this->load->view('inc/navLti');
    $this->load->view('inc/asidebarLti');
    $this->load->view('admind/reservas/reservasV');
    $this->load->view('inc/footerLti');
    }
    elseif($this->session->userdata('rolUsuario') =='invitado')
    {
      $this->load->view('inc/cabezeraLti');
    $this->load->view('inc/navLti');
      $this->load->view('invitado/asideInv');

    $this->load->view('admind/reservas/reservasV');
    $this->load->view('inc/footerLti');
    }
    
    else
    {
      redirect('usuario/login','refresh');
    }
 }

 public function tipoEvento()//  nombre del evento
 {
    $valor=$_POST['valor'];
    $lista=$this->reserva_model->nombreEventodb($valor);
    $listaArray = $lista->result_array();
    // $listaArray = $lista->row_array();
    echo json_encode($listaArray);
 }
 public function agregar()
 {

 $plazoCofirmar=0;
 $aReservar=$_POST['adelandto'];
 $totalPagar= $_POST['totalPagar'];
 $estadoReserva=1;
 if($aReservar>0 && $totalPagar>$aReservar)
{
  $estadoReserva=2;
  $plazoCofirmar=0;
}else 
if($totalPagar==$aReservar)
{ 
   $estadoReserva=3;
   $plazoCofirmar=0;
}
else
{
$plazoCofirmar=$_POST['plazoConfirmacion'];
}


 	 $dias=$_POST['dias'];
   
 	$data['cantidadPersonas']=200;//hojo
 	$data['fechaInicio']=$_POST['fechaInici'];
	$data['fechaFin']=$_POST['fechaFin'];
	$data['plazoConfirmacion']=$plazoCofirmar;//ojo
  $data['estado']=$estadoReserva;

 $nombreEvento=$_POST['nombreEvento'];//estoo necesitamos quse del id
 	$data['adelantoReserva']=$aReservar;
  $data['pagado']=$aReservar;
 	$data['saldo']=$_POST['saldoPagar'];
 	$data['total']=$totalPagar;
 $data['idUsuario']=$this->session->userdata('idUsuario');
 $data['idTipoEvento']=$_POST['idTipoEvento'];
 $data['idCliente']=$_POST['idCliente'];


  $totalSinDescuento=$_POST['totalSinDescuento'];// ojo
 	$totalDescuento=$_POST['totalDescuento'];   //ojo


 	//unidimension

  $horaInicios=$_POST["horaInicios"];
  $horaFines=$_POST["horaFines"];
  $duracion=$_POST["duraciones"];
  $invitado=$_POST["invitados"];
  $fechas=$_POST["fechas"];
 	$ids=$_POST['ids'];
 	$pu =$_POST['pu'];
//bidiminesionales
 	$cants=$_POST['cantidades'];
 	$precios=$_POST['importes'];
 	$chebox=$_POST['cbxDia'];
 	$des=$_POST['descuento'];
  


 // print_r($dias."---dias: ".count($ids));
 // print_r($chebox);

 	  
  $db= $this->reserva_model->agregarReservadb($data,$ids,$horaInicios,$horaFines,$duracion,$invitado,$fechas,$cants,$precios,$chebox,$des,$pu,$dias);
  if($db!=false)
  {

      // $listaArray = $lista->result_array();
   $listaArray = $db->row_array();
   // echo json_encode($listaArray);
 	 echo json_encode(array('msg'=>true,'datos'=>$listaArray));

  }else
  {
    echo json_encode(array('msg'=>false));

  }
  
 }

 function listaFechasReservar()
 {
  
   $mes =$_POST['mes'];
   $anio =$_POST['anio'];
   $hoy =$_POST['hoy'];


 	$lista=$this->reserva_model->reservasdb($mes,$anio,$hoy);

	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	
 }
 

  function listaServicioParaEldia()
  {
  	$fecha=$_POST['fecha'];
  	$lista=$this->reserva_model->servicioRequediosFechadb($fecha);

 	$listaArray = $lista->result_array();
 	// $listaArray = $lista->row_array();
 	echo json_encode($listaArray);
 	
  }
  
  public function listaReservasMensuales()
  {
  	  	$mes=$_POST['mes'];
  	  	$anio=$_POST['anio'];
        $hoy=$_POST['hoy'];


  $lista=$this->reserva_model->listaReservasMensualesdb($mes,$anio,$hoy);
 	$listaArray = $lista->result_array();
 	// $listaArray = $lista->row_array();
 	echo json_encode($listaArray);
  }



  public function reservasClientes()
  {
     $fechas=$_POST['fechaMomento'];
  

  $lista=$this->reserva_model->listaReservasPorRealizar($fechas);
  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);
  }
 public function reservasClientesBuscar()
 {
     $valor=$_POST['valor'];
     $fechaMomento=$_POST['fechaMomento'];
       $lista=$this->reserva_model->listaReservasBuscardb($valor,$fechaMomento);
  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);

 }



 public function fechasEventos()
 {
    $idReserva=$_POST['id'];
  

  $lista=$this->reserva_model->fechasEventosdb($idReserva);
  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);
 }
 public function servicioReservados()
 {

     $id=$_POST['id'];
     $inicioEvento=$_POST['inicioEvento'];
     $fechaReservaServicio=$_POST['fechaReservaServicio'];
  $lista=$this->reserva_model->servicioReservadosdb($id,$inicioEvento,$fechaReservaServicio);

  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);
 }
 public function servicioReservadosPagar()
 {
  $id=$_POST['idReserva'];

  $data['saldo']=$_POST['saldo'];
  $data['adelantoReserva']=$_POST['anticipo'];
  $data['pagado']=$_POST['pagado'];


  $data['estado']=$_POST['estados'];
  $data['idUsuario']=$this->session->userdata('idUsuario');


  $lista=$this->reserva_model->servicioReservadosPagardb($id,$data);

  // $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  if($lista>0)
  {

  echo json_encode(array('uri'=>1));
  }else
  {
  echo json_encode(array('uri'=>0));

  }


 }

 public function cambiarRuta()
 {
     $id=$_POST['id'];
     $url= base_url();
  echo json_encode(array('url'=>$url.'index.php/reservas/index?id='.$id));

 }

 public function reservaNocorfimada()
 {
   $id=$_POST['idReserva'];

  $data['estado']=0;
 
  $lista=$this->reserva_model->servicioReservadosPagardb($id,$data);
    if($lista>0)
  {

  echo json_encode(array('uri'=>1));
  }else
  {
  echo json_encode(array('uri'=>0));

  }
 }



  public function reservasClientesTop()
  {
     $fechas=$_POST['fechaMomento'];
  

  $lista=$this->reserva_model->reservasClientesTopdb($fechas);
  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);
  }
   

    public function eliminarReservarEventos()
  {
     $id=$_POST['id'];
     $ci=$_POST['ci'];
     $data['estado']=0;
      
    $numeroFilas=$this->reserva_model->clienteCidb($ci);
    if($numeroFilas>0)
    {

       if($this->reserva_model->servicioReservadosPagardb($id,$data)>0)
       {
          echo json_encode(array('uri'=>1));  
       }
       else
       {
          echo json_encode(array('uri'=>2));

       }
    }
    else
    {
          echo json_encode(array('uri'=>3));

    }
  }

    public function eliminarConfirmarEventos()
  {
     $id=$_POST['id'];
     $data['estado']=0;
      
   
       if($this->reserva_model->servicioReservadosPagardb($id,$data)>0)
       {
          echo json_encode(array('uri'=>1));  
       }
       else
       {
          echo json_encode(array('uri'=>2));

       }
    
   
  }
  public function reservasDatosHome()
  {
        $id=$_POST['idReserva'];
    
       $lista=$this->reserva_model->reservasDatosHomedb($id);
  // $listaArray = $lista->result_array();
  $listaArray = $lista->row_array();
  echo json_encode($listaArray);
  }
   public  function fechasLimpiar()
   {
         $id=$_POST['id'];
    
       $lista=$this->reserva_model->fechaLimpiardb($id);
  $listaArray = $lista->result_array();
  // $listaArray = $lista->row_array();
  echo json_encode($listaArray);
   }

}

  