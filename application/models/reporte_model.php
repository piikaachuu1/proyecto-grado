<?php 

class reporte_model extends CI_Model
{




	public function listaServiciosdb($fechaIn,$fechaFn)
	{
		 $this->db->select('R.id, R.fechaInicio, CONCAT(C.ci, " ", C.nombre, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS nombreCompleto, R.total');
        $this->db->from('reservas R');
        $this->db->join('clientes C', 'C.id = R.idCliente');
        $this->db->where('R.estado<>', 0);
        $this->db->where('R.fechaRegistro>=', $fechaIn);
        $this->db->where('R.fechaRegistro<=', $fechaFn);


        return  $this->db->get();
         
	}
    public function eventoFrecuentesdb($fechaIn,$fechaFn,$fechahoy)
    {
                 $query="SELECT TE.nombre, COUNT(R.idTipoEvento) AS cantidadEventos, SUM(R.total) AS totalSumado
                FROM tipoevento TE
                INNER JOIN reservas R ON R.idTipoEvento = TE.id
                WHERE R.estado <>0 AND (R.fechaInicio BETWEEN '$fechaIn' AND '$fechaFn' )
                GROUP BY TE.nombre 
                ORDER BY 2 DESC;";

                 return  $this->db->query($query);
         
    } 


    



  public function serviciosMasReservadosdb($fechaIn,$fechaFn,$fechahoy)
    {
                 $query="SELECT S.nombre AS Servicios,S.unidadMedida,COUNT(D.cantidad) AS veces, IFNULL( SUM(D.cantidad),0) AS totalCantidad,
                  IFNULL( SUM(D.cantidad*D.precio),0) AS totalRecaudado
                  FROM servicios S
                  LEFT JOIN detalle D ON D.idServicios =S.id
                  LEFT JOIN reservas R ON R.id =D.idReservas
                   WHERE R.estado<>0  AND(R.fechaInicio  BETWEEN '$fechaIn' AND '$fechaFn' )
                  GROUP BY S.nombre,S.unidadMedida
                  ORDER BY 4 DESC";

                 return  $this->db->query($query);
         
    }



}

