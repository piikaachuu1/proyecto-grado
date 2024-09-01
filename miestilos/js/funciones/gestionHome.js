
topEventos();

function topEventos() {
    var fechaActual = new Date();
    var fechaMomento = fechaActual.getFullYear() + '-' + (fechaActual.getMonth() + 1) + '-' + fechaActual.getDate();

    $.ajax({
        url: '../reservas/reservasClientesTop',
        type: 'POST',
        data: { fechaMomento },
        success: function (response) {
            let eventosPorRealizar = JSON.parse(response);
            let template = "";
            // console.log(eventosPorRealizar);
            eventosPorRealizar.forEach(res => {
                let estadoClass = '';
                let bg="";
                let progressBarWidth = '25%';
                let porcentaje=parseInt((res.pagado/res.total)*100);
                // console.log(typeof porcentaje);
               // console.log(res.rEstado+'- '+res.pagado);

                switch (parseInt(res.estadoReserva)) {
                    case 1:
                        estadoClass = 'bg-warning';
                        bg="background:rgba(255,193,7,.8)";
                        break;
                    case 2:
                        estadoClass = 'bg-success';
                        bg="background:rgba(40,176,69,.8)";

            
                        break;
                    case 3:
                        estadoClass = 'bg-info';
                        bg="background:rgba(0,128,192,.5)";

                        break;
                    default:
                        estadoClass = 'bg-secondary';
                }
                estadoClass=""

                template += `
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 my-2 tuClaseDelDiv" >
                        <div class="small-box ${estadoClass} p-1" style=${bg}>
                            <div class="m-0 p-0">
                                <h4 id="evento">${res.evento}</h4>
                            </div>
                            <div class="p-0">
                                <p id="fecha">${res.fechaInicio}</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:${porcentaje}%" aria-valuenow="${porcentaje}" aria-valuemin="0" aria-valuemax="100">${porcentaje+'%'}</div>
                            </div>

                            <div class="icon">
                                   <span class='t-secondary' >pagado ${res.pagado} de ${res.total}  bs</span>
                                
                            </div>
                            <a href="#" class="small-box-footer btnMasInfo"  >
                                más info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        <span hidden id="idReserva">${res.id} </span>                   

                    </div>

                `;
            });

            $('#contenedorInicio').html(template);
        }
    });
}


$(document).on('click', '.btnMasInfo', function () {

    var idReserva = $(this).closest('.tuClaseDelDiv').find('#idReserva').text();
    var evento = $(this).closest('.tuClaseDelDiv').find('#evento').text();
    var fecha = $(this).closest('.tuClaseDelDiv').find('#fecha').text();

    console.log("id res = " + idReserva+evento+fecha);
    $.ajax({
        url:"../reservas/reservasDatosHome",
        type:'POST',
        data:{idReserva},
        success:function(response)
        {
        
         var json=JSON.parse(response);
         console.log(json.id);
         document.getElementById('nombreEvento').textContent=evento;
         document.getElementById("spClienteNombre").textContent=json.nombreCompleto;
         document.getElementById("spPagado").textContent=json.pagado;
         document.getElementById("spSaldo").textContent=json.saldo;

         document.getElementById("spTotal").textContent=json.total;
         document.getElementById("spDias").textContent=json.dias;
         document.getElementById("spFechaInicio").textContent=json.fechaInicio;
         document.getElementById("spClienteNombre").textContent=json.nombreCompleto;
         document.getElementById("spClienteNombre").textContent=json.nombreCompleto;
         document.getElementById("spIdReserva").textContent=json.id;
        },
    })
    $("#modalMasDetalles").modal('show');

});
$(document).on('click','#btnPagosYDetalle',function () {
    var id=document.getElementById('spIdReserva').textContent;
    $("#modalMasDetalles").modal('hide');

    $.ajax({
    url: '../reservas/cambiarRuta?id='+id,
    method: 'POST',
    data: { id },
    success: function (data) {
  
      var json =JSON.parse(data);
      // console.log(json.url);
      window.location.href = json.url; 
  
       $("#detalleEvento").modal('hide');
     
    },
    error: function () {
      console.error('Error al cargar la vista.');
    }
  });

})
   