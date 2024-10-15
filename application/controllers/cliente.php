<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Cliente extends CI_Controller {

  public function index()
 {

 		
		if($this->session->userdata('rolUsuario') =='admin')
		{
			$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/cliente/listaCliente');
		$this->load->view('inc/footerLti');
		}
		elseif($this->session->userdata('rolUsuario') =='invitado')
		{
				$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('invitado/asideInv');
		$this->load->view('admind/cliente/listaCliente');
		$this->load->view('inc/footerLti');
		}
		
		else
		{
			redirect('usuario/login','refresh');
		}

 }
 

public function listacliente()
{
	 $lista=$this->cliente_model->listaClientedb(1);
 	  	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
}


 

	public function agregarCliente() //agreagr ciente desde gestion de clientes

	{
		$this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('primerApellido', 'Primer Apellido', 'required');
        $this->form_validation->set_rules('segundoApellido', 'Segundo Apellido');
        $this->form_validation->set_rules('ci', 'CI', 'required');
        $this->form_validation->set_rules('celular', 'Celular', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono');
        
        if ($this->form_validation->run() === FALSE) {
			echo json_encode(array('uri'=>5));

        } else{
			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];	
			$data['idUsuario']=$this->session->userdata('idUsuario');			


 				$lista=$this->cliente_model->buscarClientedb($_POST['ci']);
 				$num_filas = $lista->num_rows();
		if($num_filas==0)
		{
					$ban= $this->cliente_model->nuevocliente($data);

				if($ban){

					echo json_encode(array('uri'=>1));
				}
				else
				{
					echo json_encode(array('uri'=>0));

				}
		}
		else
		{
			echo json_encode(array('uri'=>2));

		}
		}
			
 
			

		}
		public function nuevoCliente()//agregar cliente desde reservas

	{
			
			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];		

		$lista=$this->cliente_model->buscarClientedb($_POST['ci']);
 		$num_filas = $lista->num_rows();
		if($num_filas==0)
		{
				$id= $this->cliente_model->nuevocliente($data);
			if($id!=0){

  
			$lista=$this->cliente_model->datoClientedb($id);
			// $listaArray = $lista->result_array();
			$listaArray = $lista->row_array();
			echo json_encode($listaArray);
							
			}else
			{
						echo json_encode(array('id'=>0));	
			}
		}else
		{
						echo json_encode(array('id'=>'x2'));	

		}	

			

		}

public function datoCliente()//obenet los datos cliente a modificar su datos perosnales
{
	$id=$_POST['id'];
	$lista=$this->cliente_model->datoClientedb($id);
	$listaArray = $lista->row_array();
			echo json_encode($listaArray);
	
}



	public function guardarCambios()
	{
		  $id=$_POST['id'];
			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];
		

    
    	$lista=$this->cliente_model->verificarIdCi($_POST['ci'],$id);
 				$num_filas = $lista->num_rows();
		if($num_filas==0)
		{
			$fila =$this->cliente_model->guardarCambiosdb($data,$id);
		    if($fila>0)
		    {
		    	echo json_encode(array('uri'=>1,'row'=>$fila));
		    }else
		    {
		    	echo json_encode(array('uri'=>0,'row'=>0));

		    }
	  }else
	  {
	    	echo json_encode(array('uri'=>2,'row'=>0));

	  }
	}
	public function eliminar()
	{
		$id=$_POST['id'];
		$data['estado']=$_POST['estado'];
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

	 if($this->cliente_model->eliminarCliente($id,$data))
	 {
	 		echo json_encode(array('uri'=>1));
	 }
	 else
	 {
	 		echo json_encode(array('uri'=>0));

	 }
   
	}

	public function buscarClientedatos()
	{
	  	 	$valor=$_POST['valor'];
 				$lista=$this->cliente_model->buscarClientedb($valor);
				$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
				echo json_encode($listaArray);
	
	}



}
