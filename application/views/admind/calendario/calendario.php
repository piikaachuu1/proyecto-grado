   <!--  -->

   <script>"use strict";</script>
<script src="<?php echo base_url();?>/calendario/res/jquery.js"></script>
<script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>
<script src="<?php echo base_url();?>/calendario/res/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/underscore-min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/clndr.min.js"></script>

   <div class="wrapper" style="background-image: url('<?php echo base_url();?>/img/fondo.jpg');">

    <div class="content-wrapper"   style=" background:rgba(255, 255, 255, 1);">

      <!-- Content Header (Pa  ge header) -->
      <section class="content-header " >

        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="t-primary">reservas la fecha</h1>
            </div>
            <div hidden class="col-sm-6">
               <ul class="d-flex justify-content-end t-primary" style=" list-style: none; padding: 0; margin: 0;">
                 <li title="Cuando un cliente no reazlizo un monto para recervar"><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#E08402"></i>confirmar</li>
                 <li title="Cuando el cliente delanto un monto de reserva"><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#008800"></i>reservado</li>
                 <li title="Cuando el cliente completo la paga "><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#0D77B6"></i>Pagado</li>
                 <li  title="Cuando el cliente reserva pero no completo la paga y ya es cerca al evento " hidden><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#FF0000"></i>Pendiente</li>
          

               </ul>
            </div>
          
            </div>
          </div><!-- /.container-fluid -->

        </section>

        <!-- Main content -->
        <section class="content " >

          <div class="container-fluid">

            <div class="box box-primary no-border">
              <div class="box-body ">
                <!-- THE CALENDAR -->
                <div id="mini-clndr" class="" >
                  <div class="clndr">  

                  </div>
                </div>
           
              </div>
            </div>
       

          </div>
          <div hidden id="contenedorEventosPagar">
            <!-- /muy importante -->
          </div>


        </section>

      </div>
  </div>
<form id="formularioAgregarEvento">
  

    <div class="modal modal-primary" id="modalAddEvent" aria-hidden="true"  >
      <div class="modal-dialog modal-xl" >
        <div class="modal-content" >
          <div class="modal-header  p-2 m-0  bgt-primary" >
            <div class="container">
             <div class="row">

              <div class="col-11  d-flex justify-content-start align-items-center">
                <h5 class="modal-title ">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span> </h5>
              </div>
              <div hidden class="col-1 d-flex justify-content-end align-items-center m-0 p-0">
               <button type="button" class="btn " data-dismiss="modal" aria-label="Close" onclick="reserFormularioAgregarEvent()"><span  aria-hidden="true"><i class="fa-solid fa-x fa-lg t-light" style="color:red"></i></span></button>
             </div>

             <input type="hidden" name="fecha" id="fecha" >
           </div>
         </div>
       </div>
  

       <div class="modal-body mx-1 px-2">
        <section class="row p-0" >
          <div class="col-sm-12 col-lg-12" >
           <section class="row" >
            <!-- Sección para el nombre del evento -->
            <div class="col-12" >
              <div class="myBox">
                <input type="hidden" name="" id="idTipoEvento" value="">
                <input class="myImputField form-control form-control-sm" id="nombreEvento" list="listaEventos" type="text" placeholder="Ej.Cena Graduación Compromiso Matrimonio..." autofocus autocomplete="off" onkeypress="return soloLetrasEspacio(event)" onchange="seleccionTipoEvento(this)">
                <label class="mylabel">Tipo del Evento</label>
              </div>
            </div>
            <datalist id="listaEventos">
             
            </datalist>
            <div class ="myBox"> 
            <!-- <label class="mylabel" >Tipo del Evento</label> -->

            <select hidden class=" myImputField" type="hidden" id="nombreEvento" placeholder required>
                <option>Bautizo</option>

                <option>Baby Show</option>
                <option>Fiesta Privada</option>
                <option>Graduacion</option>
                <option >Promocion</option>
                <option>Matrimonio</option>
                <option>15 años</option>
                <option>18 años</option>
                <option>otros</option>




            </select>
            </div>
            <!-- Secciódn para la capacidad y detalles del evento -->
            <div hidden class="col-xl-12 col-lg-12  col-md-6  col-sm-12 col-12 d-flex">
              <div hidden class=" col-8">    <label >Capacidad del salon:</label>
              </div>
              <div hidden class="col-4">
               <input type="text" name="" value="400" disabled style="width: 40px; height: 25px;">
               <input type="hidden" name="" id="maxCapacidad" value="400" >

               <label><i class="fa-solid fa-person "></i></label> 
             </div>

             <div class="row">
              <div class="">
                <label>
                </label><input  type="hidden" id="nroInvitados" name="nroInvitados" onkeypress="return soloNumero(event)" maxlength="3" minlength="1"   value="20" style="width: 40px; height: 25px;" required onchange="cantidadInvitados()">
              </div>
            </div>
          </div>
          <div hidden class="col-xl-12 col-lg-12  col-md-6  col-sm-12 col-12 d-flex">
            <div hidden class="col-8">
              <label>  Dias del Evento:</label>
            </div>
            <div hidden class="col-4">
              <input type="text" name="" maxlength="1" id="txtDia" onkeypress="return soloNumero(event)"  value="1" required placeholder="dias" onchange="agregarBloques() "style="width: 40px; height:25px"> 

              <i class="fa-solid fa-calendar-day"></i>
            </div> 
          </div>

          <div hidden class="col-12 px-1 m-0 " id="contenedorBloques" style="background: rgba(255, 255, 255, .4);">
            <!-- muy impirta aqui se esta cargado lo ide de campos -->


          </div>

          <hr class="bgt-primary " style="
          height: 2px;
          ">
        </section>

      </div>
      <div class="col-sm-12 col-lg-12 p-1">
        <div class="col-12 d-flex ">

          <div class="col-11">
            <div class="myBox">

              <input type="hidden" id="txtId" name="idCliente" >
              <input type="text" class="myImputField" id="nombreCliente" required placeholder="" list="listaCliente" onchange="seleccionCliente(this)" autocomplete="off" onkeypress="return soloLetrasEspacio(event)"> 
              <label class="mylabel" id="lbLeyenda">Persona que contrata el evento</label>
            </div>

            <datalist id="listaCliente">

            </datalist>

          </div>
          <div class="col-1 d-flex justify-content-center align-items-center" >
            <button  class="btnt-primary btn-sm" title="Nuevo Cliente" data-toggle="modal" data-target="#agregarCliente"><i class="fa-solid fa-square-plus d-flex justify-content-center"></i></button>

          </div>
        </div>
        <div class="col-12 d-flex">
          <div hidden class="col-4">
            <div hidden class="myBox">

              <input class="myImputField" type="date" name="" id="fechaFin" readonly>
              <label class="mylabel">Fin del  Evento</label>
              <label class="mylabel-icon"><i class="fa-regular fa-calendar-days"></i></label>

            </div>
          </div>
          <div class="col-12">
            <div class="myBox">


              <input type="text" class="myImputField" id="txtBuscaeServicio" required placeholder="" list="listaServicio"  onautocomplete="off" onchange="seleccionarServicio(this)" onkeypress="return soloLetrasEspacio(event)"> 
              <label class="mylabel" >Buscar Servicio</label>
            </div>

            <datalist id="listaServicio">

            </datalist>
          </div>
          <div class="col-1 d-flex justify-content-center align-items-center" >
            <button class="btnt-primary btn-sm" disabled ><i class="fa-solid fa-magnifying-glass fa-sm"></i></button>
          </div>
        </div >

        <div class="row p-0 mx-1" style="overflow-x:auto; min-width:50px">

          <table class="p-1" rules="all" width="100%" id="detalleServicio">
            <thead class="bgt-primary">
              <tr>
                <th style="text-align: center; min-width: 150px; width: auto;"><small>Nombre Servicio</small></th>
                <th style="text-align: center; min-width: 100px;"><small>dia/Cant</small></th>
                <th style="text-align: center;  min-width: 50px;"><small>PU(Bs)</small></th>
                <th style="text-align: center; min-width: 110px;"><small>inporte(Bs)</small></th>
                <th style="text-align: center;  min-width: 100px;"><small>Descuento(Bs)</small></th>
                <th style="width:7px"></th>
              </tr>
            </thead>
            <tbody id="servicioDetalle" class="servicioDetalle">

            </tbody>
            <tfoot class="bgt-primary">
             <tr>
              <td colspan="3"><small>Total Sumas</small></td>
              <td style="text-align:right;"><small>bs.</small><input type="text"  id="total" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>
              </td>
              <td style="text-align:right;"><small>bs.</small><input type="text"  id="descuento" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly></td>
            
            </tr>
            <tr>
              <td colspan="3"><small>Total a Pagar</small></td>
              <td style="text-align:right;"><small>bs.</small><input type="text"  id="totalPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly></td>
                   <td class="bgt-secondary" rowspan="3">
                   <div class="myBox" hidden>
                      <select class="myImputField" type="date" name="" id="plazoConfirmacion">
                        <option value="02:00" selected>02 HORAS</option>
                        <option value="05:00">05 HORAS</option>
                        <option value="12:00">12 HORAS</option>
                        <option value="24:00">24 HORAS</option>



                      </select>
                  <label class="mylabel" >Confirmacion</label>

                   </div>
                   </td>
            </tr>
            <tr>
              <td colspan="3"><small>Monto adelantado</small></td>
              <td style="text-align:right;"><small>bs.</small><input type="text"  id="montoAdelantado" onkeypress="return soloNumero(event)"  class="" name=""  value="0.00"  style="width:80px; height: 20px; font: 10px; text-align: right;"></td>
            </tr>
            <tr>
              <th colspan="3"><small>Saldo a pagar</small></th>
              <td style="text-align:right;"><small>bs.</small><input type="text"  id="saldoPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly></td>
            </tr>
          </tfoot>
        </table>
      </div>



    </div>
  </section>


  <!-- <div class="clearfix"></div>         -->

</div>
<div class="modal-footer d-flex justify-content-around p-1 bgt-acent " >
  <button type="button" class=" btn btn-md btnt-primary " data-dismiss="modal" onclick="reserFormularioAgregarEvent()"> <i class="fa-solid fa-xmark text-warning"></i>Cancelar</button>
  <button type="button" class=" btn btn-md btnt-primary" id="btnGuardar" > <i class="fa-solid fa-floppy-disk text-success"></i> Agregar</button>


</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

</div>

</form>

<!-- Modal -->
<form id="formNuevoCliente" action="#" method="POST">


  <div class="modal fade" id="agregarCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-1">


         <div class="container">
           <div class="row">

            <h5 class="modal-title ">Nuevo cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>


          </div>
        </div>
      </div>
      <div class="modal-body">

        <!-- Post -->        

        <div class="row">

          <div class=" col-md-12 ">
           <div class="myBox">

            <input  class="myImputField" type="text" name="nombre" id="txtNombre" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required autofocus />
            <label class="mylabel" for="">Nombre</label>


          </div>
        </div>
        <div class=" col-sm-12 col-md-6">
         <div class="myBox">

          <input  class="myImputField form-control-md" type="text" name="primerApellido" id="txtApellido1" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required  />
          <label class="mylabel" for="">Primer Apellido</label>


        </div>
      </div>
      <div class=" col-sm-12 col-md-6 ">
       <div class="myBox">

        <input  class="myImputField form-control-sm" type="text" name="segundoApellido" id="txtApellido2" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25"  />
        <label class="mylabel" for="">Segundo Apellido</label>


      </div>
    </div>

  </div>


  <div class="row">


   <div class=" col-md-12 col-sm-12">
     <div class="myBox">

      <input  class="myImputField" type="text" name="ci" id="txtCi" onkeypress="return LetrasNumero(event)" minlength ="1" maxlength ="9"  required  />
      <label class="mylabel" for="">C.I.</label>
      <label class="mylabel-icon" for=""><i class="fa-solid fa-id-card"></i></label>

    </div>
  </div>
  <div  class=" col-sm-12 col-md-6  ">
    <div class="myBox">

      <input  class="myImputField" type="text" name="celular" id="txtCelular" onkeypress="return soloNumero(event)" minlength ="1" maxlength ="9"  required  />
      <label class="mylabel" for="">Celular</label>
      <label class="mylabel-icon" for=""><i class="fa-solid fa-mobile-retro"></i></label>

    </div>
  </div>
  <div  class=" col-sm-12 col-md-6">
    <div class="myBox">

      <input  class="myImputField" type="text" name="telefono" id="txtTelefono"  onkeypress="return soloNumero(event)"minlength ="1" maxlength ="9"/>
      <label class="mylabel" for="">Telefono</label>
      <label class="mylabel-icon" for=""><i class="fa-solid fa-phone"></i></label>

    </div>
  </div>
</div>



</div>

<div class="modal-footer d-flex justify-content-around p-1 bgt-acent">
 <button type="button" class="btn btnt-primary btn-sm" data-dismiss="modal"><i class="fas fa-times"> </i>Cancelar</button>
 <button class="btn btn-sm btnt-primary" type="submit"><i class="fas fa-save"></i>Guardar</button>

</div>
</div>
</div>
</div>
</form>



<!-- Evento resevado con su estaod para esa fecha -->

  <div class="modal fade" id="detalleEvento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header p-2 bgt-primary">


         <div class="container">
           <div class="row">
            <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title "> Evento : <span id="dtnombreEvento"></span></h5>
              
            </div>
            <div class=" col-2 d-flex justify-content-end">
                  <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
            </div>
        


          </div>
        </div>
      </div>
      <div class="modal-body  m-0 p-0 px-2">

        <!-- Post -->        

        <div class="row">

          <div class=" col-md-12 ">
            <label class="row"><div class="col-lg-6 col-md-8 col-sm-12"> Servicios reservados para el  dia <span id="dtdiaL"></span> <span id="dtdia"></span> </div>
             <div hidden  class="col-lg-6 col-md-4 col-sm-12">Horas<span id="horaInicio">10:00</span> - <span id="horaFin">14:00</span></div></label>
            <table rules="all" width="100%"> 
              <thead class="bgt-acent">
                <tr class="t-secondary-n" style="text-align: center;">
                  <th>Nro</th>
                  <th>Servicio </th>
                  <th>cant. </th>
                  <th>PU <small>(bs.)</small></th>

                  <th>Precio Total<small>(bs.)</small></th>
           
                </tr>
              </thead>
              <tbody class="servicioReservado" id="servicioReservado">
            
              </tbody>


            </table>
           <div class="myBox">

  

          </div>
        </div>
      
   

  </div>




</div>

<div class="modal-footer d-flex justify-content-start p-2 bgt-acent t-secondary-n">
<div class="col-6">
  Cliente: <label id="eventoCliente"></label>

</div><div hidden class="d-flex justify-content-end col-5">
  <span id="txtestado" hidden></span>
  <button hidden type="button" class="btn btn-warning" id="btnRemoverEvento">Remover</button>
  <span hidden id="idReserva" ></span>

  <button hidden type="button" class="btn btn-success" id="btnPagarCalendario">Pagar</button>
</div>
</div>
</div>
</div>
</div>






<script>
  // window.dataLayer = window.dataLayer || [];
  // function gtag(){dataLayer.push(arguments);}
  // gtag('js', new Date());
  // reservarsalon = ['UA', '114663401', '1' ];
  // gtag('config', reservarsalon.join("-"));
</script>

<script id="calendar-template" type="text/template">  
  <div class="row" >
    <div class="col-md-8 "  >

      <div class="controls d-flex " style="background:rgba(138,149,151,1  );">
        <div class="clndr-previous-button">&lsaquo;</div>
        <div class="month"><%= month %>&nbsp;<%= year %></div>
        <div class="clndr-next-button">&rsaquo;</div>
      </div>

      <div class="days-container " >
        <div class="days" >
          <div class="headers" style="background:rgba(10,170,228,1);">
            <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
          </div>
          <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
        </div>
      </div>

    </div>

    <div class="col-md-4" id="listevents" style="background:rgba(255,255,255,0.3); height: 70vh;overflow-y: auto;">
      <div class="event-listing hidden-xs">
        <div class="event-listing-title text-center" style="background:rgba(0,0,0,0.51);color:white">Eventos programados-<span id="mesL"></span> </div>
        <div>
           <table  class="table table-sm" rules="rows" width="100%">
            <tbody class="eventosMensuales">
                   
            </tbody>
          </table>
                
        </div>

      </div>
    </div>
  </div>

</script>

<script>


  var myCalendar;
  var currentPeriod = 202308;
  var eventsArray = [];
  var fechasAColor = [];
  var estado=[];
  var fechaActual ;
  var ban=1;
$(document).ready(function() {
    fechaActual = moment();
  // console.log("Fecha actual:", fechaActual.format('YYYY-MMMM-dddd'));

   // cargarFechasDesdeBaseDeDatos();
  cargarFechasDesdeBaseDeDatos(fechaActual);



 
});

  function cargarFechasDesdeBaseDeDatos(fecha) {
    estado=[];
    fechasAColor = [];
    fechasRemover = [];

    mes =fecha.format("MM");
    anio =fecha.format("YYYY");
   actual = moment();
 hoy=actual.format('YYYY-MM-DD');
    // alert(hoy);
    $.ajax({
    url: '../reservas/listaFechasReservar', // Reemplaza con la URL de tu servidor
    method: 'POST',
    data:{mes,anio,hoy},
    success: function (response) {
      let fechas = JSON.parse(response);
         fechas.forEach(fecha=>{
           // console.log(fecha.fecha+'fecha par calendario');


        fechasAColor.push(fecha.fecha);
        estado.push(fecha.estado);
         });


    aplicarEstilosAFechas();
     listaEventoDelMes(fecha);

    },

  });

  }

 function fechaLimpiarConfirmar(id) {

    fechasRemover = [];
  
    $.ajax({
    url: '../reservas/fechasLimpiar', 
    method: 'POST',
    data:{id},
    success: function (response) {
      let fechas = JSON.parse(response);
         fechas.forEach(res=>{
          
        fechasRemover.push(res.fecha);
     


         });

      console.log(fechasRemover);
      resetearEstilosDeFechas();
    },
  });
  
  }



function resetearEstilosDeFechas() {

     fechasRemover.forEach(function (fecha) {


     var currentCell = $('#mini-clndr .calendar-day-' + fecha);
        
        currentCell.removeClass('colored-date has-event');
        currentCell.css({
          'background-color':'',
        })
   })
}
  function aplicarEstilosAFechas() {

      var i=0;
      fechasAColor.forEach(function (fecha) {
        var currentCell = $('#mini-clndr .calendar-day-' + fecha);

        currentCell.addClass('colored-date has-event');
      


       if(estado[i]==1){
            currentCell.css({
        'background-color': '#E08402',
        'color': '001F3F', 
      });
        }
          else if(estado[i]==2){
            currentCell.css({
        'background-color': '#E08402',
        'color': '#C7FFCB', 
      });
        }  else if(estado[i]==3){
            currentCell.css({
        'background-color': '#E08402',
        'color': '#F8FCFF', 
      });
        }
        else if(estado[i]==4){
               currentCell.css({
            'background-color': '#FF0000',
            'color': '#000', 
          });
         }

         //codigo done si as mes pasado tiene pendienetes
    //       if (moment(fecha).isBefore(fechaActual, 'day')) {
    //   currentCell.css({
    //     'background-color': '#808080', 
    //     'color': '#00162B', 
    //   });
    // }
        i=i+1;
      
      });
    }
  var time=0;
  function cargarPorSeccion(){
  moment.locale('es'); /*Lang*/

    var aux;
    myCalendar = $('#mini-clndr').clndr({

      daysOfTheWeek: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
      template  :    $('#calendar-template').html(),
      events    :    eventsArray,

      ready     :    function() {setInterval(getNewData, 1000);  
   // aplicarEstilosAFechas();
   // listaEventoDelMes(aux.date);
  
    },  

    clickEvents: {

      click: function(target){
        aux = target;

        dayClass = aux.element.className;

        /*today o YYYY-mm-dd*/
        clickedDay = aux.date._i;  /*dayClass.split(" ")[1].replace("calendar-day-", '');*/

        if ( dayClass.indexOf('event') > -1 ){

          eventDetail = aux.events[0];
          prepareModalDetail( clickedDay, eventDetail,aux );
           fechaActual= aux.date;


        }else{

          if ( dayClass.indexOf('past') < 0 && dayClass.indexOf('adjacent-month') < 0 ) {
            prepareModalToAdd( clickedDay );

           fechaActual= aux.date;

          }else
          {
            toastr.info("La fecha seleccionada debe estar dentro de este mes.");
          }
        }

      },
      onMonthChange: function(month) {
        // waitOnCalendarLoad(true);
        currentPeriod =  month.format('YYYYMM');
        var mesL=month.format('MMMM');//nombre mes

        var diaL=month.format('dddd');//nombre dias

        var mes=month.format('MM');
        var anio=month.format('YYYY');
        cargarFechasDesdeBaseDeDatos(month);

        // console.log(month);
        listaEventoDelMes(month);
        // setTimeout(aplicarEstilosAFechas, 400);
        

      }

    }

  });



//     var enjoyhint_instance = new EnjoyHint({});



// // https://github.com/xbsoftware/enjoyhint
//     enjoyhint_instance.set(enjoyhint_script_steps);
//     enjoyhint_instance.run();

}

function listaEventoDelMes(month){
  mes=month.format('MM');
  anio=month.format('YYYY');
  mesL=month.format('MMMM');
 actual = moment();
 hoy=actual.format('YYYY-MM-DD');
      $.ajax({
    url: '../reservas/listaReservasMensuales', 
    method: 'POST',
    data:{mes,anio,hoy},
    success: function (res) {
 
        var servicios= JSON.parse(res);    
        let template= "";
      servicios.forEach(servicioR=>{
        // console.log(servicioR.estado);   
        template+=` <tr title="${servicioR.nombreCompleto}">
      <td>
         ${
          servicioR.estado == 1 
            ? '<i class="fa fa-square" style="color:#E08402"></i>' 
            : servicioR.estado == 2 
              ? '<i class="fa fa-square" style="color:#008800"></i>' 
              : servicioR.estado ==3 
                ? '<i class="fa fa-square" style="color:#0D77B6"></i>' 
                : '<i class="fa fa-square" style="color:red"></i>'
        }
      </td>

      <td>${servicioR.dias}</td>
      <td>${servicioR.evento}</td>

      <td>${servicioR.nombreCompleto}</td>
    </tr>
        `
      });
      $('.eventosMensuales').html(template); 

        var mes=document.getElementById('mesL');
      mes.textContent=mesL;

    },

  });
      // console.log('deee +');
}

  
  function getNewData(){
          if(ban==1)
          {
               // cargarFechasDesdeBaseDeDatos(fechaActual);
               // listaEventoDelMes(fechaActual);
               // aplicarEstilosAFechas();
               // setTimeout(aplicarEstilosAFechas, 500);

               ban=0;
            
          } 
        
  }
  function actuliazarNuevoEventoagreados(){
         fechasAColor=[];
         estado=[];
    
       cargarFechasDesdeBaseDeDatos(fechaActual);
      listaEventoDelMes(fechaActual);    
      aplicarEstilosAFechas();     
      setTimeout(aplicarEstilosAFechas, 1000);
      
  }

  cargarPorSeccion();

  // actuliazarNuevoEventoagreados();

  $(document).ready(function() {
    // Botón para cargar y mostrar la Segunda Vista
    $('#btnPagarCalendario').click(function() {
         var id=$('#idReserva').text();
          cargarYMostrarVista(id);
         
    });
 });

    // Función para cargar y mostrar la Segunda Vista
  var idCliente=0;
   function cargarYMostrarVista(id) {
    // alert(id);
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
}








</script>






