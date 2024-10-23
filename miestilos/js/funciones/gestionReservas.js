desstroyInicializa() 
//inicio listar servicios
 function EventosRealizadosFecha() {

    alert("holas");
}
function listarREservas() {
   // alert('rese');

    var fechaFulll = new Date();
    var fechaMomento = fechaFulll.getFullYear() + '-' + (fechaFulll.getMonth() + 1) + '-' + fechaFulll.getDate();
    // console.log(fechaMomento);
    $.ajax({
        url: '../reservas/reservasClientes',
        type: 'POST',
        data: {
            fechaMomento
        },
        success: function(response) {
            let clienteReservas = JSON.parse(response);
            // console.log(clienteReservas);
            let template = "";
            var i = 1;
            clienteReservas.forEach(reservado => {
                template += `
        <tr data-id="${reservado.id}" ci="${reservado.ci}" Estado='${reservado.rEstado}' nombreCliente="${reservado.nombreCompleto}" reservaId=${reservado.id} fechaInicioEvento=${reservado.fechaInicio} total=${reservado.total} pagado=${reservado.pagado} adelanto=${reservado.adelantoReserva} saldo=${reservado.saldo}>
        <td style="text-align: center;">${reservado.fechaInicio}</td>
 
        <td>${reservado.nombreCompleto}</td>
        <td >${reservado.evento} - ${reservado.dias}</td>
        <td style="text-align: right;">${reservado.total}</td>
        <td style="text-align: right;">${reservado.pagado}</td>
        <td style="text-align: right;">${reservado.saldo}</td>
        <td style="text-align: center;">
        ${
          reservado.estadoNumero == 1 
            ? `<div style="color:#00162B ; background:rgba(224, 132, 2, 0.8);"> ${reservado.rEstado}</div>` 
            : reservado.estadoNumero == 2 
              ? `<div style="color:#fff ; background:rgba(42, 145, 12, 1);">${reservado.rEstado}</div>`
              : reservado.estadoNumero ==3 
                ? `<div style="color:#fff ; background:rgba(13, 119, 182, 1);">${reservado.rEstado}</div>`
                : `<div style="color:#fff ; background:rgba(255, 0, 0, 1);">${reservado.rEstado}</div>`
        }</td>




         <td>
               <div class="d-flex justify-content-center">
                 <button class="btn btn-sm btn-success cobrar" type="button" data-id=${reservado.id}  ${reservado.estadoNumero ==9 ? 'disabled':''}> Cobrar </button>
               </div>

             </td>

             <td >
               <div class="d-flex justify-content-center ">
                
                 <button class="btn btn-md  p-1 m-1 btnt-primary detalleReservaReporte" id="detalleReservaReporte" type="button" ><i class="fa-solid fa-file-pdf fa-xl" style="color:orangered;"></i></button>
                ${isAdmin() ? `<button class="btn btn-md  p-1 m-1 btnt-primary" id="btnEliminar" type="button"><i class="fa-solid fa-trash fa-xl" style="color: #E30000;"></i></button>`:''}

               </div>

             </td>
       </tr>
        `
                i++;
            });
            $('.clienteReservadoT').html(template);
 
       
    inicializarDataTableR();
        }
    });


   setTimeout(function() {
  var urlParams = new URLSearchParams(window.location.search);
  var idRecuperado = urlParams.get('id');

  if (idRecuperado) {
    console.log('El parámetro "id" existe y su valor es: ' + idRecuperado);

    var nuevaURL = window.location.origin + window.location.pathname;
  history.replaceState({}, document.title, nuevaURL);
    buscarClienteDEsdeCalendario(idRecuperado);
  } else {
    console.log('El parámetro "id" no existe en la URL.');
  }
}, 800); // Esperar 1 segundo (1000 milisegundos)

}

$(document).on('keyup', '#txtBuscarReserva', function() {
  let valor = $(this).val();

  if (valor) {

   

    var fechaFulll = new Date();
    var fechaMomento = fechaFulll.getFullYear() + '-' + (fechaFulll.getMonth() + 1) + '-' + fechaFulll.getDate();
    console.log(fechaMomento);
    $.ajax({
        url: '../reservas/reservasClientesBuscar',
        type: 'POST',
        data: {fechaMomento,valor},
        success: function(response) {
            let clienteReservas = JSON.parse(response);
            console.log(clienteReservas);
            let template = "";
            var i = 1;
            clienteReservas.forEach(reservado => {
                template += `
        <tr data-id="${reservado.id}" ci="${reservado.ci}" Estado='${reservado.rEstado}' nombreCliente="${reservado.nombreCompleto}" reservaId=${reservado.id} fechaInicioEvento=${reservado.fechaInicio} total=${reservado.total} pagado=${reservado.pagado} adelanto=${reservado.adelantoReserva} saldo=${reservado.saldo}>
    
        <td style="text-align: center;">${reservado.fechaInicio}</td>

        <td>${reservado.nombreCompleto}</td>
        <td >${reservado.evento} - ${reservado.dias}</td>
        <td style="text-align: right;">${reservado.total}</td>
        <td style="text-align: right;">${reservado.pagado}</td>
        <td style="text-align: right;">${reservado.saldo}</td>
        <td style="text-align: center;">
        ${
          reservado.estadoNumero == 1 
            ? `<div style="color:#00162B ; background:rgba(224, 132, 2, 0.8);"> ${reservado.rEstado}</div>` 
            : reservado.estadoNumero == 2 
              ? `<div style="color:#fff ; background:rgba(42, 145, 12, 1);">${reservado.rEstado}</div>`
              : reservado.estadoNumero ==3 
                ? `<div style="color:#fff ; background:rgba(13, 119, 182, 1);">${reservado.rEstado}</div>`
                : `<div style="color:#fff ; background:rgba(255, 0, 0, 1);">${reservado.rEstado}</div>`
        }</td>




         <td>
               <div class="d-flex justify-content-center">

                 <button class="btn btn-sm btn-success cobrar" type="button" data-id=${reservado.id}  ${reservado.estadoNumero ==9 ? 'disabled':''}> Cobrar </button>

               </div>

             </td>

             <td >
               <div class="d-flex justify-content-center ">
                 <button class="btn btn-md  p-1 m-1 btnt-primary detalleReservaReporte" id="detalleReservaReporte" type="button" ><i class="fa-solid fa-file-pdf fa-xl" style="color:orangered;"></i></button>
                  ${isAdmin() ? `<button class="btn btn-md  p-1 m-1 btnt-primary" id="btnEliminar" type="button"><i class="fa-solid fa-trash fa-xl" style="color: #E30000;"></i></button>`:''}

               </div>

             </td>
       </tr>
        `
                i++;
            });
            $('.clienteReservadoT').html(template);
 
            
    
        }
    });


  }
});


function desstroyInicializa() {
    var table = $('#miTablaR').DataTable();
    
    // Destruir la instancia DataTable existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#miTablaR')) {
        table.destroy();
    }

    listarREservas();
}


function calcularDiferencia(total, pago) {
    // Calcular el 30% del total
    const treintaPorCiento = total * 0.30;

    // Verificar si el pago es mayor que el 30% del total
    if (pago > treintaPorCiento) {
        const diferencia = pago - treintaPorCiento;
        // console.log(El pago excede el 30% del total. Devolución: ${diferencia.toFixed(2)});
        return diferencia;
    } else {
        // console.log("El pago no excede el 30%, no hay devolución.");
        return 0;
    }
}


$(document).on('click', '#btnEliminar', async function() {
    let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    let ciCliente = $(element).attr('ci');
    let total = $(element).attr('total');
    let tpagado = $(element).attr('pagado');
    let adelanto = $(element).attr('adelanto');
    let saldo = $(element).attr('saldo');
    let estado = $(element).attr('estado');
    //datos de la tabla


     if(estado=="Pagado")
     {
        
         toastr.error('No es viable eliminar el evento una vez que ha sido completado.','', {
    "closeButton": true, // Muestra el botón de cierre
    "positionClass": "toast-top-right", // Posición del mensaje
    "preventDuplicates": true, // Evita mensajes duplicados
    "showDuration": "500", // Duración de la animación de mostrar
    "hideDuration": "1000", // Duración de la animación de ocultar
    "timeOut": "3000", // Tiempo de visualización del mensaje
    "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
   
  
});
     }
     else
      if( estado=="Reservado")
     {
         // toastr.warning("El Evento no puede ser eliminado por el evento esta completado");
         // generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ciCliente,4,tpagado);//nuestro
        document.getElementById("nombreClienteE").textContent=nomCliente;
        document.getElementById("idReserva").textContent=id;
       var ciCl= document.getElementById("ciClienteEliminar");
       ciCl.focus();

         $("#servciosModificar").modal("show");







        $(document).on('click', '#btnConfirmarElimacionEvento', function() {


        var id =document.getElementById("idReserva").textContent;
        var ciCliente =document.getElementById("ciClienteEliminar");
        ci=ciCliente.value;
        if(ciCliente.value=="" )
        {
            ciCliente.focus();
        }else
        {
            if(ciCliente.value.length>5)
            {


              
                 let dev= calcularDiferencia(total, tpagado);
                


                 let por = total * 0.3;
                    let per = por > tpagado ? tpagado : por;
                let estado=9;

                 $.ajax({
                  url: '../reservas/eliminarReservarEventos',
                        type: 'POST',
                        data: {
                            id,ci,dev,per,estado },
                        success: function(response) {
                            let res = JSON.parse(response);
                            switch (res.uri)
                            {
                            case 1:

                                  generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ci,5,tpagado);//nuestro
                                 $("#servciosModificar").modal("hide");
                                 desstroyInicializa();
                                  toastr.success('La eiminacion de reserva exitoso','', {
                                    "closeButton": true, // Muestra el botón de cierre
                                    "positionClass": "toast-top-right", // Posición del mensaje
                                    "preventDuplicates": true, // Evita mensajes duplicados
                                    "showDuration": "500", // Duración de la animación de mostrar
                                    "hideDuration": "1000", // Duración de la animación de ocultar
                                    "timeOut": "3000", // Tiempo de visualización del mensaje
                                    "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
                                   
                                  
                                });

                                

                                break;
                            case 2: 
                                   document.getElementById("msgModalEliminar").textContent="Fallo al eminar el la reserva";
                                 var ciCl= document.getElementById("ciClienteEliminar");
                                 ciCl.focus();
                              break;
                             default:
                                 document.getElementById("msgModalEliminar").textContent="El C.I. de cliente incorrecto";
                                 var ciCl= document.getElementById("ciClienteEliminar");
                                 ciCl.focus();

                             break;   
                            }
                            

                        
                        },
                    });
            }
            else
            {
                 ciCliente.focus();

                         toastr.warning('El valor debe mayor a 6 caracteres','', {
                    "closeButton": true, // Muestra el botón de cierre
                    "positionClass": "toast-top-right", // Posición del mensaje
                    "preventDuplicates": true, // Evita mensajes duplicados
                    "showDuration": "500", // Duración de la animación de mostrar
                    "hideDuration": "1000", // Duración de la animación de ocultar
                    "timeOut": "3000", // Tiempo de visualización del mensaje
                    "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
                   
                  
                });

            }
        }

        });




     }
     else if(estado=="Confirmar")
     {
         
           Swal.fire({
            title: 'Eliminar',
            icon: 'warning',
            text: 'El Evento no esta confirmado se puede proceder a eliminar',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            background: 'rgb(255, 255, 255)',
            customContainerClass: 'width:200px',
            customClass: {
                cancelButton: 'btnt-primary btn-sm', // Clase para el botón Cancelar
                confirmButton: 'btnt-primary',
                icon: 'text-warning' // Clase para el botón Cancelar
            }
        }).then((result) => {
              if (result.isConfirmed) {
                   
                    $.post('../reservas/eliminarConfirmarEventos',{id},function(response){
                       desstroyInicializaServicio()
                       console.log(response);
                       var json = JSON.parse(response);
                       if(json.uri===1)
                       { 
                          toastr.success("Eliminiacion con exito");
                                 desstroyInicializa();
                          
                              generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ciCliente,4,tpagado);//nuestro

                       }
                       else
                       {
                          toastr.warning("Fallo en proceso de eliminacion");

                       }


                    })
                  }
                  else
                  {
                    toastr.warning("Eliminacion Cancelada");
                  }
                  
        });



     }else
     {
        toastr.warning("El Error en la eliminacion");
     }


});
//consulta las fechas 

$(document).on('click', '.cobrar', async function() {
    let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    let ciCliente = $(element).attr('ci');
    document.getElementById("nombreCliente").textContent = nomCliente;
    document.getElementById("ciCliente").textContent = ciCliente;
    document.getElementById("fechaInicio").textContent = inicioEvento;


    let total = $(element).attr('total');
    let tpagado = $(element).attr('pagado');

    let adelanto = $(element).attr('adelanto');
    let saldo = $(element).attr('saldo');


    let tTotal = document.getElementById('tTotal');
    tTotal.textContent = parseFloat(total).toFixed(2);
    let tadelanto = document.getElementById('tAdelando');
    tadelanto.textContent = parseFloat(adelanto).toFixed(2);
    let saldoPagar = document.getElementById('tPagar');
    saldoPagar.textContent = parseFloat(saldo).toFixed(2);

    let txtpagado = document.getElementById('tPagado');
    txtpagado.textContent = parseFloat(tpagado-adelanto).toFixed(2);
 
    let tParcial = document.getElementById('tParcial');
    let tDes = document.getElementById('tDes');
    let sumaTotal = 0;
    let sumDEs = 0;
    try {
        let fechas = await obtenerFechas(id);
        let template = "";
        for (const fecha of fechas) {
            let fechaReservaServicio = fecha.fecha;
            console.log(fechaReservaServicio);
            template += `

                <tr style="border-top: none;">
                    <td colspan="6" > <b><u style="size:2px">Servicios dia ${fechaReservaServicio}</u></b></td>
        
                </tr>
                 <tr class=" bgt-acent t-secondary" style="text-align: center;">
                <th>Nro</th>
                <th>Servicio </th>
                <th>cant.</th>
                <th>pu(Bs.)</th>

                <th>Importe<small>(bs.)</small></th>
                <th>Descuento(Bs.)</th>
               
              </tr>`;
            let serviciosParaEstaFecha = await obtenerServicios(id, inicioEvento, fechaReservaServicio);
            i = 1;
            subtotal = 0;
            subDes = 0;
            serviciosParaEstaFecha.forEach(res => {
                template += `
                    <tr>
                        <td style="text-align:right; margin-right: 2px;">${i}</td>

                        <td >${res.servicio}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.cantidad}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.PU}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.subTotal}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.descuento}</td>



                    </tr>`;
                i++;
                subtotal += parseFloat(res.subTotal);
                subDes += parseFloat(res.descuento);
            });
            template += `

                <tr style="border-bottom: none;">
                    <td class="" colspan="4" style="border-bottom: none;color:blue">SubTotales</td>
                    <td class="text-info " style="border-bottom: none; text-align:right; margin-right: 2px;">${subtotal.toFixed(2)}</td>
                    <td class="text-gray " style="border-bottom: none; text-align:right; margin-right: 2px;">${subDes.toFixed(2)}</td>


                </tr>
        
               `;
            sumaTotal += subtotal;
            sumDEs += subDes;
        }
        tParcial.textContent = parseFloat(sumaTotal).toFixed(2);

        tDes.textContent = parseFloat(sumDEs).toFixed(2);
        var pagar = document.getElementById('txtPagar');
        pagar.placeholder = parseFloat(saldo).toFixed(2) + "";
        document.getElementById('txtIdeReserva').value = id;
        $('#servicioCobro').modal('show');
        $('.servicioReservado').html(template);
    } catch (error) {
        console.error('Error:', error);
    }
});
// Función para obtener las fechas
function obtenerFechas(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../reservas/fechasEventos',
            type: 'POST',
            data: {
                id
            },
            success: function(response) {
                let fechas = JSON.parse(response);
                resolve(fechas);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}
// Función para obtener los servicios
function obtenerServicios(id, inicioEvento, fechaReservaServicio) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../reservas/servicioReservados',
            type: 'POST',
            data: {
                id,
                inicioEvento,
                fechaReservaServicio
            },
            success: function(response) {
                let servicios = JSON.parse(response);
                resolve(servicios);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}

$(document).on('keyup', '#txtPagar', function() {
    var pagar = document.getElementById('txtPagar');
    let saldoPagar = document.getElementById('tPagar');
    if (parseFloat(pagar.value) > parseFloat(saldoPagar.textContent)) {
        if( parseFloat(saldoPagar.textContent)==0.00){

      
        toastr.success('El cliente ya completo La Pago','', {
                "closeButton": true, // Muestra el botón de cierre
                "positionClass": "toast-top-right", // Posición del mensaje
                "preventDuplicates": true, // Evita mensajes duplicados
                "showDuration": "500", // Duración de la animación de mostrar
                "hideDuration": "1000", // Duración de la animación de ocultar
                "timeOut": "3000", // Tiempo de visualización del mensaje
                "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
               
              
            });
        pagar.value = saldoPagar.textContent;
       $('#servicioCobro').modal('hide');

        }
        else
        {

         toastr.warning('El monto ingresado no debe ser mayor saldo a pagar','', {
                "closeButton": true, // Muestra el botón de cierre
                "positionClass": "toast-top-right", // Posición del mensaje
                "preventDuplicates": true, // Evita mensajes duplicados
                "showDuration": "500", // Duración de la animación de mostrar
                "hideDuration": "1000", // Duración de la animación de ocultar
                "timeOut": "3000", // Tiempo de visualización del mensaje
                "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
               
              
            });
        pagar.value = saldoPagar.textContent;
        }
    }
})


$(document).on('click', '#btnPagar', function() {
    var pagar = document.getElementById('txtPagar');
    var btnPagar = document.getElementById('btnPagar');
    let saldoPagar = document.getElementById('tPagar');
    var anticipoPagado=document.getElementById('tAdelando');
    var mPagado=document.getElementById('tPagado');

    var nomCliente=document.getElementById('nombreCliente').textContent;
    var ciCliente=document.getElementById('ciCliente').textContent;
    var tTotalPagar=document.getElementById('tTotal');
    var fechaInicioEvento=document.getElementById("fechaInicio").textContent;
    



    var anticipo=0;
    var pagado=0;
    var saldo=0;
    var estados = 1;

    if(parseFloat(saldoPagar.textContent)==0.00)
    {
          toastr.success('El cliente ya completo La Pago','', {
                "closeButton": true, // Muestra el botón de cierre
                "positionClass": "toast-top-right", // Posición del mensaje
                "preventDuplicates": true, // Evita mensajes duplicados
                "showDuration": "500", // Duración de la animación de mostrar
                "hideDuration": "1000", // Duración de la animación de ocultar
                "timeOut": "3000", // Tiempo de visualización del mensaje
                "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
               
              
            });
          $('#servicioCobro').modal('hide');


    }

    else if (pagar.value == "" || parseFloat(pagar.value) == 0) {
         toastr.warning('Ingrese Monto a pagar','', {
                "closeButton": true, // Muestra el botón de cierre
                "positionClass": "toast-top-right", // Posición del mensaje
                "preventDuplicates": true, // Evita mensajes duplicados
                "showDuration": "500", // Duración de la animación de mostrar
                "hideDuration": "1000", // Duración de la animación de ocultar
                "timeOut": "3000", // Tiempo de visualización del mensaje
                "extendedTimeOut": "1000" // Tiempo adicional si el usuario pasa el ratón sobre el mensaje
               
              
            });
        pagar.focus();
        pagar.value = "";
        estados = 1;

    } else {
        if (parseFloat(saldoPagar.textContent) > parseFloat(pagar.value) && parseFloat(pagar.value) > 0) {
            estados = 2;
              saldo=parseFloat(saldoPagar.textContent)-parseFloat(pagar.value)
              anticipo = parseFloat(pagar.value);
              pagado= parseFloat(mPagado.textContent)+ parseFloat(anticipoPagado.textContent)+parseFloat(pagar.value);
        } else  if((parseFloat(saldoPagar.textContent) == parseFloat(pagar.value) && parseFloat(pagar.value) > 0)){
            estados = 3;
            saldo=parseFloat(saldoPagar.textContent)-parseFloat(pagar.value)
            anticipo = parseFloat(pagar.value);
            pagado= parseFloat(mPagado.textContent)+ parseFloat(anticipoPagado.textContent)+parseFloat(pagar.value);
            
        }
        var idReserva = document.getElementById('txtIdeReserva').value;
        Swal.fire({
            icon: 'warning',
            text: 'Confirmar el pago',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            background: 'rgb(251, 214, 169)',
            customContainerClass: 'width:200px',
            customClass: {
                cancelButton: 'btnt-primary btn-sm', // Clase para el botón Cancelar
                confirmButton: 'btnt-primary',
                icon: 'text-warning' // Clase para el botón Cancelar
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../reservas/servicioReservadosPagar', { idReserva,estados,saldo,anticipo,pagado}, function(response) {
                    var json = JSON.parse(response);
                    if (json.uri === 1) {
                        toastr.success('Transaccion completas');

                     $('#servicioCobro').modal('hide');
                       desstroyInicializa();

                                setTimeout(function() {
                                       // buscarFilas(idReserva);
            

                                    generarPdf(idReserva,fechaInicioEvento,nomCliente,tTotalPagar, anticipo,saldo,ciCliente,1,pagado);//nuestro


                                }, 1000); 
                    } else {
                        toastr.warning('Falla al realizar Transaccion');
                     $('#servicioCobro').modal('hide');
                    }

         


                })
            }
        });
    pagar.value="";

    }
})

function buscarFilas(idReserva)//codigo que no se usar verificar
{
   
var idBuscado = idReserva;
var tabla = document.getElementById('clienteReservadoT');

var filas = tabla.querySelectorAll('[data-id]');
for (var i = 0; i < filas.length; i++) {
    var fila = filas[i];
    

    var dataId = fila.getAttribute('data-id');
    

    if (dataId === idBuscado) {
     
        console.log('Encontré la fila con data-id:', idBuscado);
    
    
        // Puedes detener el bucle ya que encontraste la fila
      var generarReporte = fila.querySelector('td:nth-child(9) div .detalleReservaReporte');

        console.log(generarReporte);
            if (generarReporte) {
                generarReporte.click();
            } else {
                console.error('No se encontró el botón "Pagar" en la fila.');
            }
        break;
    }
}

}


function agregarCeros(numero) {
  const numeroConCeros = '000000' + numero;
  return numeroConCeros.slice(-6); // Tomar solo los últimos 6 dígitos
}

//incio


//metodo funcional

function obtenerParteDecimal(numero) {
    return parseFloat('' + numero.toString().split('.')[1]) || '00';
}



$(document).on('click', '#detalleReservaReporte', async function() {
     let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    let ci = $(element).attr('ci');

    let total = $(element).attr('total');
    let adelanto = $(element).attr('adelanto');
    let saldo = $(element).attr('saldo');
    let pagado = $(element).attr('pagado');
    var estado=2;


    generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ci,estado,pagado);

})

 async function generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ci,estado,pagado) {
     
    //estado 1 generado dessde pagar ; 2= genera desde pdf ;3 =desde el calendario


    let sumaTotal = 0;
    let sumDEs = 0;
    
     var nombreUsuarioSeccion=document.getElementById('nombreUsuarioSeccion').textContent;


    const fechaActual = new Date();

// Obtener los componentes de la fecha (año, mes, día, hora, minuto, segundo)
const año = fechaActual.getFullYear();
const mes = fechaActual.getMonth() + 1; // Meses van de 0 a 11, por lo que sumamos 1
const día = fechaActual.getDate();
const hora = fechaActual.getHours();
const minuto = fechaActual.getMinutes();
// Formatear la fecha como desees (ejemplo: YYYY-MM-DD HH:mm:ss)
const fechaFormateada = `${año}-${mes.toString().padStart(2, '0')}-${día.toString().padStart(2, '0')} ${hora.toString().padStart(2, '0')}:${minuto.toString().padStart(2, '0')}`;





    var doc = new jspdf.jsPDF('p','mm','letter');

        var urlCompleta = window.location.href;
     doc.addImage(urlCompleta+"../../../../img/logo.png", "PNG", 20, 15, 30, 30);

     doc.setTextColor(217, 0, 0);  
    doc.text(170, 20, 'Nº '+agregarCeros(id))
    doc.setFontSize(22);
    doc.setFont("helvetica", "bold"); 
    doc.setTextColor(0, 25, 62);  
    doc.text(92, 25, 'RECIBO');
    doc.setFontSize(19);
    doc.setTextColor(0, 25, 62);  
    doc.text(77, 33, 'Reserva de Servicios');
    doc.setFont("helvetica", "bold"); 
    doc.setTextColor(0, 0, 0);  
    doc.setFontSize(12);
    doc.text(22, 53, 'CI: ');
    doc.text(22, 59, 'Razón Social: ');
    doc.text(22, 65, 'Fecha emision: ');

    doc.setFont(undefined,'normal');
    doc.setTextColor(0, 25, 62);  
    doc.text(30, 53, ''+ci);
    doc.text(52, 59, ''+nomCliente);
    doc.text(54, 65, ''+fechaFormateada);



    
    //fin cabezera doc

    //confiuracion de tablas 

  const tableWidth = 170;

 var maxWidthColumn2 = 20;

    const columnStyles = {
    0: { fontStyle: 'bold', halign: 'right',textColor: 0 },
    1: { halign: 'left',textColor: 0 },
    2: { cellWidth: maxWidthColumn2, overflow: 'linebreak', halign: 'center',textColor: 0 },
    3: { halign: 'right',textColor: 0 },
    4: { halign: 'right' ,textColor: 0},
    5: { halign: 'right' ,textColor: 0},

  };
  const tableConfig = {
    
    styles: { cellPadding: 1, fontSize: 10 },
    columnStyles,
    tableWidth, // Ancho de la tabla
    margin: { top: 30, right: 22, bottom: 30, left: 22 }, // Márgenes para centrar la tabla
    headStyles: {
     fillColor: [0, 64, 128],
      halign: 'center'}, // Color de fondo para la fila de encabezado
    bodyStyles: { fillColor: [253, 235, 253] }, // Color de fondo para las filas de datos
    alternateRowStyles: { fillColor: [153, 228, 251] }, // Color de fondo para filas alternas
    showHead: 'everyPage', // Mostrar el encabezado en cada página
  };

  // const imageUrll = '../img/bisa.jpeg';
  // doc.addImage(imageUrl, 'JPEG', 10, 10, 50, 50); 
 


    var inicia=76;
    try {
        let fechas = await obtenerFechas(id);
        let cout = 1;
        var newPagina =false;
        for (const fecha of fechas) {
            let fechaReservaServicio = fecha.fecha;
           
            // console.log(fechaReservaServicio);

            let serviciosParaEstaFecha = await obtenerServicios(id, inicioEvento, fechaReservaServicio);
            i = 1;
            subtotal = 0;
            subDes = 0;

                doc.setFont("helvetica", undefined);

            doc.setTextColor(0, 0, 0);  
            doc.setFontSize(12);
            doc.text(22, (inicia-3), 'Servicios Reservados para el dia: '+fechaReservaServicio);
            var head = [['Nro', 'Servicios', 'cant','PU Bs.','Importe Bs.','Descuento Bs.']]
            var body=[];
            serviciosParaEstaFecha.forEach(res => {

               
                subtotal += parseFloat(res.subTotal);
                subDes += parseFloat(res.descuento);
                     

                 var datos= [i, res.servicio, res.cantidad ,res.PU,res.subTotal,`${res.descuento}`];
                 body.push(datos);

                i++;
                })


             body.push([{ content: 'subTotales',  colSpan: 4,  styles: { halign: 'center' ,fillColor: [255, 255, 255]} },
                { content: ''+subtotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+subDes.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]);
            doc.autoTable({ 
            startY: inicia,
            head: head,
            body: body,
            // foot:foo,
            ... tableConfig

            })
                
                var espacioSuficiente = inicia + 30 < doc.internal.pageSize.height;

              var posicionFinalTablaAnterior = doc.autoTable.previous.finalY;
             // alert(posicionFinalTablaAnterior+'ul  --ant'+(posicionFinalTablaAnterior-inicia) +'-- es'+(inicia)+30);

            
             if(250<(posicionFinalTablaAnterior+(posicionFinalTablaAnterior-inicia)+30))
             {
                doc.addPage();
                cout++;
                inicia=30;
                newPagina=true;
                
             }
             else
             {

             inicia=doc.previousAutoTable.finalY+30;
             }
           
            sumaTotal += subtotal;
            sumDEs += subDes;
            doc.setFont(undefined,'normal');
                doc.setTextColor(0, 0, 0);  
                doc.setFontSize(10);
                doc.text(`Página ${doc.internal.getNumberOfPages()}`, 90, 270);
                doc.text(`Usuario: `+nombreUsuarioSeccion, 20, 270);

        }


        const end = doc.previousAutoTable.finalY;
         var ultimaPosicionY=end
        if(newPagina && 250<(end+(end-inicia))+30)
        {
            ultimaPosicionY=30;
            
        }
      
       
           doc.line(22, ultimaPosicionY+3, 190, ultimaPosicionY+3);
          

            var bodyPied=[];
            var montoParaLiteral=0;
            if(estado==1)
            {
               bodyPied= [[{ content: 'Total Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Total Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+(sumaTotal.toFixed(2)-sumDEs.toFixed(2)).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]

                , [{ content: 'Pagado Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+(pagado-adelanto).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]
                ,[{ content: 'Anticipo Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+adelanto.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Saldo Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+saldo.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]];
               montoParaLiteral=adelanto;

            }
            else if(estado==2)
            {
                 bodyPied=  [[{ content: 'Total Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Total Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+(sumaTotal.toFixed(2)-sumDEs.toFixed(2)).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]

                , [{ content: 'Pagado Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+ parseFloat(pagado).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]
               ,[{ content: 'Saldo Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+parseFloat(saldo).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]];
                 montoParaLiteral=pagado;

            }
             else if(estado==3)
            {
                 bodyPied= [[{ content: 'Total Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Total Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+(sumaTotal.toFixed(2)-sumDEs.toFixed(2)).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]
                ,[{ content: 'Anticipo Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+parseFloat(adelanto).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Saldo Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+parseFloat(saldo).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]];
               montoParaLiteral=adelanto;

            } else   if(estado==4 || estado== 5)
            {
               bodyPied= [[{ content: 'Total Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Total Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+(sumaTotal.toFixed(2)-sumDEs.toFixed(2)).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]

                , [{ content: 'Pagado Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+parseFloat(pagado).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]
               ,[{ content: 'Saldo Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+parseFloat(saldo).toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]];
               montoParaLiteral=pagado;

            }

             doc.autoTable({ 
            startY: ultimaPosicionY+5,
            
        
            body: bodyPied,
            // foot:foo,
            ... tableConfig

            })

             var pTotal=(sumaTotal.toFixed(2)-sumDEs.toFixed(2)).toFixed(2);

              var adelantoLiterla=  NumeroALetras(parseInt(montoParaLiteral));
              var pagarLiteral=  NumeroALetras(parseInt(saldo));
             const ultimaPosicionEnd= doc.previousAutoTable.finalY;
             var ulend=ultimaPosicionEnd;

           doc.line(135, ulend-12, 160, ulend-12);
           doc.line(135, ulend-13, 160, ulend-13);
           doc.line(22, ulend+1, 190, ulend+1);
                   doc.setFont(undefined,'bold');


        switch (estado) {
                case 1:
                   
                      if(pTotal==pagado && saldo==0)
                        {
                                 doc.setTextColor(0, 200, 0);  
                                  doc.setFontSize(30);
                                 doc.text(22, ulend-3,'Completado',10);


                        }
                                doc.setLineDash([1, 1]);
                                doc.setTextColor(0, 0, 0);  
                                  doc.setFontSize(11);
                                 doc.line(60, ulend+20, 102, ulend+20);
                                 doc.line(110, ulend+20, 152, ulend+20);
                                 doc.text(70, ulend +24,'Firma Gerente');
                                 doc.text(120, ulend+24,'Firma Cliente');
                                 doc.setLineDash([]);

                    break;
                case 2:
                   
                        if(pTotal==pagado && saldo==0)
                        {
                                 doc.setTextColor(0, 200, 0);  
                                  doc.setFontSize(30);
                                 doc.text(22, ulend-3,'Completado',10);
                                


                        }
                      else  if(pTotal>=pagado && saldo==pTotal)
                        {
                                doc.setTextColor(200, 0, 0);  
                                  doc.setFontSize(30);
                                doc.text('Evento no confirmado ', 22, ulend + 3,10);
                              

                        }
                       else if(pTotal>=pagado && saldo>0)
                        {
                             doc.setTextColor(0, 250, 0);  
                                  doc.setFontSize(30);
                                 doc.text(22, ulend-3,'Reservado',10);
                              


                                 
                        }
                        else if(pTotal*0.3>=pagado && saldo==0)
                            {
                                doc.setTextColor(255, 102, 102);  
                                      doc.setFontSize(30);
                                     doc.text(22, ulend-3,'Cancelado',10);
                                  
    
    
                                     
                            }
                    break;
                case 3:
          
                      if(adelanto==0)
                        {
                                 doc.setTextColor(250, 0, 0);  
                                  doc.setFontSize(11);
                                 doc.text(22, ulend + 30,'Si no se confirma el evento dentro del plazo establecido, la fecha seguirá estando disponible.');


                        }  
                        
                        
                      if(adelanto!=0)
                        {




                                 doc.setTextColor(0, 0, 0);  
                                  doc.setFontSize(11);
                                  doc.text(22, ulend + 30,'Si se cancela el evento por motivos personales, se cobrará el 30% del total de la reserva.');


                        }  doc.setFont(undefined,'normal');
                                 doc.setTextColor(0, 0, 0);  

                                doc.setLineDash([1, 1]);
                                 doc.line(60, ulend+20, 102, ulend+20);
                                 doc.line(110, ulend+20, 152, ulend+20);
                                 doc.text(70, ulend +24,'Firma Gerente');
                                 doc.text(120, ulend+24,'Firma Cliente');
                                 doc.setLineDash([]);

                    break;
                case 4:






                                doc.setTextColor(200, 0, 0);  
                                doc.setFontSize(12);
                                doc.text(22, ulend + 9,'La cancelación de un evento conlleva costos según las condiciones establecidas.');
                                doc.setTextColor(0, 0, 0);  
                                 
                                doc.setFontSize(11);
                               
                                doc.setLineDash([1, 1]);
                                 doc.line(60, ulend+20, 102, ulend+20);
                                 doc.line(110, ulend+20, 152, ulend+20);
                                 doc.text(70, ulend +24,'Firma Gerente');
                                 doc.text(120, ulend+24,'Firma Cliente');
                                 doc.setLineDash([]);

                    break;
                    case 5:


                    let dev= calcularDiferencia(pTotal, pagado);
                    let per = pTotal*0.3> pagado ? pagado: pTotal*0.3;
             
                    doc.setTextColor(200, 0, 0);  
                    doc.setFontSize(11);
                    doc.text(22, ulend + 8,'devoluciones '+ dev);
                    doc.text(22, ulend + 12,'por danos y perfuicios '+ per );

                    doc.setTextColor(0, 0, 0);



                    doc.setTextColor(200, 0, 0);  
                    doc.setFontSize(12);
                    doc.text(22, ulend + 15,'La cancelación de un evento conlleva costos 30% de los servicios del total de reserva.');
                    doc.setTextColor(0, 0, 0);  
                     
                    doc.setFontSize(11);
                   
                    doc.setLineDash([1, 1]);
                     doc.line(60, ulend+20, 102, ulend+20);
                     doc.line(110, ulend+20, 152, ulend+20);
                     doc.text(70, ulend +24,'Firma Gerente');
                     doc.text(120, ulend+24,'Firma Cliente');
                     doc.setLineDash([]);
                    

                  break;
                default:
                    // Código para el caso por defecto
                    break;
            }



           var nPosition=ultimaPosicionY;
            doc.setFontSize(12);
            doc.setTextColor(0, 25, 62);  

            doc.text(22, ulend+5,'SON: '+adelantoLiterla);
            doc.setFontSize(12);
             // doc.text(20, nPosition+40, pagarLiteral);
            doc.setFontSize(12);
            doc.text(150, ulend+5, obtenerParteDecimal(adelanto)+'/100');


      
             var pdfContent = doc.output('blob');
             var blobUrl = URL.createObjectURL(pdfContent);
            window.open(blobUrl, '_blank');





    } catch (error) {
        console.error('Error:', error);
    }
     // abrirPDF(id);

}


//solo cuando llego desde el calendario se ejecuta este codgio  es muy importantes
       
function buscarClienteDEsdeCalendario(idRecuperado) {
    var idBuscado = idRecuperado;
    var tabla = $('#miTablaR').DataTable();

    // Asegurémonos de que DataTables esté inicializado y la tabla tenga datos
    if (!tabla || !tabla.page.info().pages) {
        console.error('Error: DataTables no está inicializado o la tabla no tiene datos.');
        return;
    }

    // Obtén el número total de páginas
    var totalPaginas = tabla.page.info().pages;

    // Itera a través de todas las páginas
    for (var pagina = 0; pagina < totalPaginas; pagina++) {
        // Ir a la página actual
        tabla.page(pagina).draw('page');

        // Obtén todas las filas en la página actual
        var filas = tabla.rows().nodes();

        // Itera a través de las filas
        for (var i = 0; i < filas.length; i++) {
            var fila = filas[i];
            var dataId = fila.getAttribute('data-id');

            if (dataId === idBuscado) {
                fila.style.backgroundColor = '#aaffaa';

                var nombreCliente = fila.getAttribute('nombreCliente');
                var reservaId = fila.getAttribute('reservaId');

                console.log('Nombre del cliente:', nombreCliente + ' en la página ' + (i + 1));
                

                var generarReporte = fila.querySelector('td:nth-child(8) div .cobrar');

                console.log(generarReporte);
                if (generarReporte) {
                    // Ir a la página que contiene la fila encontrada
                   if((((i + 1)/8)-1)>0)
                   {
                        tabla.page((((i + 1)/8)-1)).draw('page');
                       setTimeout(function () {

                    generarReporte.click();
                       }, 300 )
                   }else{
                        generarReporte.click();
                   }

                    // Mostrar la página actual en la consola
                    console.log('La fila se encuentra en la página:', ((i + 1)/8));

                    return; // Importante: detener la ejecución después de cambiar de página
                } else {
                    console.error('No se encontró el botón "Pagar" en la fila.');
                }
            }
        } 
    }

    console.log('No se encontró la fila con data-id:', idBuscado);
}
