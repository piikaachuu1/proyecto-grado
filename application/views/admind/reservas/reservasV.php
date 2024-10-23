
<div class="wrapper " style="background: #C69F74;">

  <div class="content-wrapper p-0 px-2"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <section class=" px-0 pt-0 m-0">


      <div class="row ">
        <div class="col-8 d-flex justify-content-start align-items-center">

          <h3 class="t-primary" >Eventos Reservados</h3>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center ">
          <div class="myBox">
            <label class="mylabel-icon"><i class="fas fa-search"></i></label>
            <input id="txtBuscarReserva" class="myImputField" type="search" name="buscarReserva"  onkeypress="return soloLetrasEspacio(event); ">
          </div>

        </div>
      </div>


    </section>
    <section class="px-2 py-1" style="background:rgba(255, 255, 255, .2); height: 75vh;"  >

      <div>
        <a href="<?php echo base_url();?>index.php/usuario/calendario" title="Se redicccionara al calderario"><button class="btn btn-sm m-0 btn-primary p-1"><b>Agregar</b></button></a>

        <button  class="btn btn-sm m-0  p-1 btnt-primary" title="Eventos Realizados" id='EventosRealizadosFecha' onclick="EventosRealizadosFecha()">eventos Anteriores</button>

      </div>


      <div>

        <div>
          <table id="miTablaR" class="miTablaR" rules="all" width="100%" >

           <thead class="t-secondary ">
            <tr style="text-align: center;">
              <th style="width:100px">Fecha</th>
              <th>Cliente</th>
              <th style="width:150px">Evento-Dias</th>
          

              <th style="width:100px">Total</th>
              <th style="width:100px">Pagado</th>
              <th style="width:100px">Saldo Pagar</th>

              <th style="width:100px">
                <div class="d-flex justify-content-center align-items-center">
                  Estado
                  <button class="btn btn-sm m-0" type="button"><i class="fa-solid fa-sort"></i></button> 
                </div>
              </th>
              <th style="width:10px">Cobrar</th>

              <th style="width:10px">Acciones</th>
            </tr>
          </thead>
          <tbody class="clienteReservadoT t-secondary-n" id="clienteReservadoT">
          

         </tbody>
         <tfoot id="">
           
         </tfoot>
       </table>
     </div>
   </div>
 </section>

 <div class="modal fade" id="servicioCobro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header p-2 bgt-primary">


       <div class="container">
         <div class="row">
          <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title ">  Cliente:  <span id="nombreCliente" style="color:white;"></span> <span hidden id="ciCliente"></span><span hidden id="fechaInicio"></span></h5>

          </div>
          <div class=" col-2 d-flex justify-content-end">
            <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
          </div>



        </div>
      </div>
    </div>
    <div class="modal-body  m-0 p-0 px-2">

      <!-- Post -->        
      <div>
    
      </div>
      <div class="row">

        <div class=" col-md-12 ">

          <table rules="all" width="100%" id=""> 
            <thead class="bgt-acent">
             

            </thead>
            <tbody class="servicioReservado" id="servicioReservado">
           
         
             </tbody>
          <tfoot rules="none">
            <tr>
              <th colspan="4" style="text-align: right;"> Total Parcial </th>
              <th style="text-align: right;"> <span id="tParcial"></span>  </th>
              <th style="text-align: right;"> <span id="tDes"></span> </th>

            </tr>
             <tr>
              <th colspan="4" style="text-align: right;"> Total Pagar </th>
              <th style="text-align: right;"> <span id="tTotal"></span>  </th>
        
            </tr>
             <tr>
              <th colspan="4" style="text-align: right;"> Pagado </th>
              <th style="text-align: right;"> <span id="tPagado">0.00</span>  </th>
        
            </tr>
              <tr>
              <th colspan="4" style="text-align: right;"> Anticipo </th>
              <th style="text-align: right;"> <span id="tAdelando"></span>  </th>
        
            </tr>
             <tr>
              <th colspan="4" style="text-align: right;"> Saldo a pagar </th>
              <th style="text-align: right;"> <span id="tPagar"></span>  </th>
        
            </tr>
          </tfoot>


        </table>
   <div class="myBox">



   </div>
 </div>


</div>
</div>
<div class="modal-footer d-flex justify-content-start p-1 bgt-acent t-secondary-n">
  <div class="d-flex justify-content-center align-items-center col-12">
     <h5>Ingrese Monto a Pagar</h5>
    <input class="form-control form-control-md col-sm-3 " style="text-align:right;" onkeypress="return soloNumeroPunto(event)" type="text" name="" maxlength="7"    id="txtPagar" autocomplete="off">
    <button type="button" class="btn btn-md btn-success" id="btnPagar" >Pagar</button>
    <input type="hidden" name="" id="txtIdeReserva">
  </div>
</div>
</div>
</div>
</div>

<!-- Servicio cobro fin -->

<!-- Moda modificar  -->
<div class="modal fade" id="servciosModificar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-2 bgt-acent bgt-primary">


       <div class="container">
         <div class="row">
          <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title t-secondary"> Cliente:  <span id="nombreClienteE"></span><span hidden id="idReserva"></span></h5>
            
          </div>
          <div class=" col-2 d-flex justify-content-end">
            <button hidden type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
          </div>
          


        </div>
      </div>
    </div>
    <div class="modal-body  p-3 ">

      <!-- Post -->      
      <div class="row p-1 d-flex justify-content-center">
        <i class=" fa-solid fa-triangle-exclamation fa-2xl text-warning"></i>
       </div>
      <div class="row  p-2"> 
        <h4 class="col-12 d-flex justify-content-center ">Cancelar evento tiene costos por</h4>
        <h4 class="col-12 d-flex justify-content-center  ">cada servicio Reservado.</h4>
      </div>  
    
      <div class="myBox">
        <input id="ciClienteEliminar" class="myImputField" type="text" name="ciClienteEliminar" onkeypress="return LetrasNumero(event)" maxlength="10" minlength="1" autocomplete="off">
        <label class="mylabel">C.I.</label>
      </div>
      <div class=" d-flex justify-content-center" >
          <span class="text-danger" id="msgModalEliminar"></span>
      </div>
  </div>
<div class="modal-footer  bgt-acent d-flex justify-content-around p-1">
 
    <button type="button" id="btnConfirmarElimacionEvento" class="btn btnt-primary btn-md">Confirmar</button>
    <button type="button" class="btn btnt-primary btn-md" data-dismiss="modal" aria-label="Close">Cancelar</button>

 </div>
</div>
</div>
</div>
<!-- fin servici modificar -->