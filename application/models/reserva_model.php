<?php 

class Reserva_model extends CI_Model
{

	public function agregarReservadb($data,$ids,$horaInicios,$horaFines,$duracion,$invitado,$fechas,$cants,$precios,$chebox,$des,$pu,$dias){
		  $this->db->trans_start(); // Inicio de la transacción

    $this->db->insert('reservas', $data);
    $idReserva = $this->db->insert_id();
   
	   for ($i=0; $i <count($invitado) ; $i++) { 
	      $data2=array(
	         'idReservas'=>$idReserva,
	         'fecha'=>$fechas[$i],
	         'horaInicio'=>$horaInicios[$i],
	         'horaFin'=>$horaFines[$i],
	         'cantidadPersona'=>$invitado[$i]
	      );
	      $this->db->insert('horarioevento',$data2);
	   }



	   for ($i=0; $i <count($ids) ; $i++) { 
	   	for ($j=0; $j <$dias ; $j++) { 
	   		$ban=$chebox[$i][$j];
	   		if($ban){
	   			
	   		
	   		 $data3=array(
	   		   'cantidad'=>$cants[$i][$j],
	   		   'precio'=>$pu[$i],
	   		   'subTotal'=>$precios[$i][$j],
	   		   'descuento'=>$des[$i][$j],
	   		   'fechaHoraInicio'=>$fechas[$j].' ' .$horaInicios[$j],
	   		   'fechaHoraFin'=>$fechas[$j].' '.$horaFines[$j],
	   		   'idServicios'=>$ids[$i],
	   		   'idReservas'=>$idReserva,
	   		  );
	      $this->db->insert('detalle',$data3);
	 	 }
	   		

	   	}
	   }

     $this->db->trans_complete(); // Fin de la transacción

    if ($this->db->trans_status() === FALSE) {
        return false;
    }
    else{
    	
    $this->db->select(" R.id ,R.fechaInicio,R.total,R.adelantoReserva,R.saldo,
	CONCAT(C.nombre, ' ', C.primerApellido, ' ', IFNULL(C.segundoApellido, '')) AS nombreCompleto,C.ci");
    $this->db->from('reservas R');
    $this->db->join('clientes C',' R.idCliente=C.id'); 
    $this->db->where('R.id',$idReserva);
    return $this->db->get();
    }
   

}


public function reservasdb($mes,$anio,$hoy)
{
	 	 $this->db->distinct();
    	$this->db->select('R.fechaInicio,R.estado, H.fecha');

	    $this->db->from('reservas R');
	    $this->db->join('horarioevento H', 'H.idReservas = R.id'); // Corregido el alias en el join
	    // $this->db->where('MONTH(R.fechaInicio)', $mes);
		$this->db->where('YEAR(R.fechaInicio)', $anio);
		$this->db->where('R.fechaInicio >=', $hoy);
		$this->db->where('R.estado <>', 0);


    return $this->db->get();
}



public function servicioRequediosFechadb($fecha)
{
	
    $this->db->select("concat(C.nombre,' ',C.primerApellido,' ',IFNULL(C.segundoApellido,'')) AS nombreCompleto,
    	TE.nombre AS evento, R.fechaInicio ,DAY(R.fechaInicio ) AS diaInicio,HE.fecha ,DAY(HE.fecha) AS diaEvento,S.nombre AS servicio,D.cantidad,
    	D.precio,D.subTotal,D.descuento,D.fechaHoraInicio,D.fechaHoraFin,DATE_FORMAT(HE.horaInicio, '%H:%i') AS horaInicio,DATE_FORMAT( HE.horaFIn, '%H:%i') AS horaFin,R.id AS idReserva,R.estado");

    $this->db->from('detalle D');
    $this->db->join('servicios S',' S.id=D.idServicios'); 
    $this->db->join('reservas R',' R.id=D.idReservas'); 
    $this->db->join('clientes C ','C.id =R.idCliente'); 
    $this->db->join('tipoevento TE','TE.id=R.idTipoEvento'); 
    $this->db->join('horarioevento HE ',' HE.idReservas=R.id'); 
    $this->db->where("HE.fecha",$fecha);
	$this->db->where("R.estado <>", 0);
	// $this->db->where("D.cantidad >", 0);

	$this->db->where("DATE(D.fechaHoraInicio)",$fecha);
    return $this->db->get();

}



public function listaReservasMensualesdb($mes,$anio,$hoy)
{
	
  $this->db->select("CONCAT(C.nombre,' ',C.primerApellido,' ', IFNULL(C.segundoApellido, '')) AS nombreCompleto, TE.nombre AS evento, R.fechaInicio,R.estado,diasEventos(R.id) AS dias ,C.ci");
$this->db->from('clientes C');
$this->db->join('reservas R', 'R.idCliente=C.id');
$this->db->join('tipoevento TE', 'TE.id=R.idTipoEvento');
$this->db->where("R.estado <>", 0);
$this->db->where("MONTH(R.fechaInicio) =", $mes); // Usar '=' en lugar de solo $mes
$this->db->where("YEAR(R.fechaInicio) =", $anio); // Usar '=' en lugar de solo $anio
$this->db->where("R.fechaInicio >=", $hoy); // Usar '=' en lugar de solo $anio

$this->db->order_by("DAY(R.fechaInicio)", "asc");
return $this->db->get();


}

public function listaReservasPorRealizar($fechaMomento)
{

	$this->db->select(
            'R.id ,CONCAT(C.nombre, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS nombreCompleto,C.ci,
            TE.nombre AS evento, R.fechaInicio, diasEventos(R.id) AS dias, R.total,R.adelantoReserva,R.saldo,R.pagado,
            	CASE 
				  WHEN R.estado = 1 THEN "Confirmar"
				  WHEN R.estado = 2 THEN "Reservado"
				  WHEN R.estado = 3 THEN "Pagado"
				  WHEN R.estado = 4 THEN "Pendiente"
				  ELSE "Cancelado"
				END AS rEstado, 
				COUNT(HE.fecha) AS cantidadDias,
				R.estado AS estadoNumero',

				FALSE 
        );
        $this->db->from('clientes C');
        $this->db->join('reservas R', 'R.idCliente = C.id');
        $this->db->join('horarioevento HE', 'HE.idReservas = R.id');
        $this->db->join('tipoevento TE', 'TE.id = R.idTipoEvento');
        $this->db->where('C.estado', 1);
        $this->db->where('R.estado <>', 0);
        $this->db->where('R.fechaInicio >=', $fechaMomento);
        $this->db->group_by('R.id,nombreCompleto, TE.nombre, R.fechaInicio');
		$this->db->order_by("R.fechaInicio", "asc");

       return $this->db->get();
       
}



public function listaReservasBuscardb($valor, $fechaMomento)
{
    $this->db->select('
        R.id,
        CONCAT(C.nombre, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS nombreCompleto,
        C.ci,
        TE.nombre AS evento,
        R.fechaInicio,
        diasEventos(R.id) AS dias,
        R.total,
        R.adelantoReserva,
        R.saldo,
        R.pagado,
        CASE
            WHEN R.estado = 1 THEN "Confirmar"
            WHEN R.estado = 2 THEN "Reservado"
            WHEN R.estado = 3 THEN "Pagado"
            WHEN R.estado = 4 THEN "Pendiente"
            ELSE "Cancelado"
        END AS rEstado,
        COUNT(HE.fecha) AS cantidadDias,
        R.estado AS estadoNumero', FALSE);

    $this->db->from('clientes C');
    $this->db->join('reservas R', 'R.idCliente = C.id');
    $this->db->join('horarioevento HE', 'HE.idReservas = R.id');
    $this->db->join('tipoevento TE', 'TE.id = R.idTipoEvento');
    $this->db->where('C.estado', 1);
    $this->db->where('R.estado <>', 0);
    $this->db->where('R.fechaInicio >=', $fechaMomento);
    $this->db->group_start();
    $this->db->like('C.nombre', $valor);
    $this->db->or_like('C.primerApellido', $valor);
    $this->db->or_like('C.segundoApellido', $valor);
    $this->db->or_like('C.ci', $valor); // Corregido
    $this->db->group_end();
    $this->db->group_by('R.id, nombreCompleto, TE.nombre, R.fechaInicio');
    $this->db->order_by("R.fechaInicio", "asc");
     $this->db->limit(8);
    return $this->db->get();
}

public function fechasEventosdb($idReserva)
{
		$this->db->select('HE.fecha,HE.horaInicio,HE.horaFIn,HE.cantidadPersona');

        $this->db->from('horarioevento HE');
        $this->db->join('reservas R','R.id=HE.idReservas');
        $this->db->where('R.id', $idReserva);
        
       return $this->db->get();
}
public function servicioReservadosdb($id,$inicioEvento,$fecha){
		$this->db->select('D.id AS idDetalle,S.nombre AS servicio, D.cantidad,D.precio AS PU,D.subTotal,D.descuento,DATE(fechaHoraInicio) AS fechaInicio');

        $this->db->from('detalle D ');
        $this->db->join('servicios S ',' S.id =D.idServicios');
        $this->db->join('reservas R',' R.id=D.idReservas');

        $this->db->where('R.id', $id);
        $this->db->where('DATE(D.fechaHoraInicio)', $fecha);
        $this->db->where('R.fechaInicio', $inicioEvento);
       return $this->db->get();
 
}

public function servicioReservadosPagardb($id,$data)//tanto como para remover el estado y para pagar
{
      $this->db->where('id',$id);
    $this->db->set('fechaModificacion', 'CURRENT_TIMESTAMP', false); 
	$this->db->update('reservas',$data);
		return $this->db->affected_rows();
}

// consulta 

public function nombreEventodb()
	{
		$this->db->select('*');
		$this->db->from('tipoevento S'); 
		return $this->db->get();
	}

public function detalleReservadb($id){ //ooara reazliar una consulta en reservas
		$this->db->select('D.id AS idDetalle,S.nombre AS servicio, D.cantidad,D.precio AS PU,D.subTotal,D.descuento,DATE(fechaHoraInicio) AS fechaInicio');

        $this->db->from('detalle D ');
        $this->db->join('servicios S ',' S.id =D.idServicios');
        $this->db->join('reservas R',' R.id=D.idReservas');

        $this->db->where('R.id', $id);
        // $this->db->where('DATE(D.fechaHoraInicio)', $fecha);
        // $this->db->where('R.fechaInicio', $inicioEvento);
       return $this->db->get();
 
}




//consulta de praccion






public function reservasClientesTopdb($fechaMomento)
{

	$this->db->select(
            'R.id ,CONCAT(C.nombre, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS nombreCompleto,C.ci,
            TE.nombre AS evento, R.fechaInicio, diasEventos(R.id) AS dias, R.total,R.adelantoReserva,R.saldo,R.pagado,
            	CASE 
				  WHEN R.estado = 1 THEN "Confirmar"
				  WHEN R.estado = 2 THEN "Reservado"
				  WHEN R.estado = 3 THEN "Pagado"
				  WHEN R.estado = 4 THEN "Pendiente"
				  ELSE "Cancelado"
				END AS rEstado, 
				R.estado AS estadoReserva,
				COUNT(HE.fecha) AS cantidadDias,
				R.estado AS estadoNumero',

				FALSE 
        );
        $this->db->from('clientes C');
        $this->db->join('reservas R', 'R.idCliente = C.id');
        $this->db->join('horarioevento HE', 'HE.idReservas = R.id');
        $this->db->join('tipoevento TE', 'TE.id = R.idTipoEvento');
        $this->db->where('C.estado', 1);
        $this->db->where('R.estado <>', 0);
        $this->db->where('R.fechaInicio >=', $fechaMomento);
        $this->db->group_by('R.id,nombreCompleto, TE.nombre, R.fechaInicio');
		$this->db->order_by("R.fechaInicio", "asc");
		$this->db->limit("8");



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
		$this->db->select('S.id, S.nombre, S.descriccion, S.unidadMedida AS medida, S.precio, S.maximo');
		$this->db->from('servicios S');
		$this->db->where('S.estado', $estado);
		$this->db->where('S.id', $id);
		$this->db->order_by('S.nombre', 'asc'); 
		return $this->db->get();
	}




	public function eliminardb($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('servicios',$data);
		return $this->db->affected_rows();
	}



public function clienteCidb($ci)
{
    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->where('estado', 1);
    $this->db->where('ci', $ci);

    $query = $this->db->get();
    return $query->num_rows();
}

  	public function reservasDatosHomedb($id)
  	{
  		$query = "SELECT R.id,  CONCAT(C.nombre, ' ', C.primerApellido, ' ', IFNULL(C.segundoApellido, '')) AS nombreCompleto,  TE.nombre AS evento,R.saldo,
			  R.fechaInicio,diasEventos(R.id) AS dias,R.total,R.adelantoReserva,R.pagado,CASE 
			  WHEN R.estado = 1 THEN 'Confirmar'
			  WHEN R.estado = 2 THEN 'Reservado'
			  WHEN R.estado = 3 THEN 'Pagado'
			  WHEN R.estado = 4 THEN 'Pendiente'
			  ELSE 'Cancelado'
			END AS rEstado,
			  COUNT(HE.fecha) AS cantidadDias
			FROM 
			  clientes C
			INNER JOIN 
			  reservas R ON R.idCliente = C.id
			INNER JOIN 
			  horarioevento HE ON HE.idReservas = R.id
			INNER JOIN 
			  tipoevento TE ON TE.id = R.idTipoEvento
			WHERE 
			  C.estado <> 0 AND  R.id={$id}
			GROUP BY 
			  nombreCompleto, TE.nombre, R.fechaInicio;
			  
			 ";
			 return $this->db->query($query);
  	}


  	public function fechaLimpiardb($id)
  	{
  		$query="SELECT R.id,HE.fecha
		FROM reservas R
		INNER JOIN horarioevento HE ON HE.idReservas=R.id
		WHERE R.id={$id} AND R.estado=1;";
		 return $this->db->query($query);


  	}

}

