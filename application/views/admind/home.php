

  <!-- Content Wrapper. Contains page content -->
<div class="wrapper" >
<div class="content-wrapper " style="  background-image: url('<?php echo base_url();?>/img/fondo.jpg'); " >
        <div class="content-wrapper " style="background:rgba(255, 255, 255, .2);">

    <!-- Content cabeera (pagima cabera) -->
   
  
    <!-- <section class="content-header ">
      <div>
        <div class="row">
          <div class="col-12 d-flex justify-content-end  p-3"> 

            <div class="p-1"> <i class="fa-solid fa-square text-warning "></i> Confirmar</div>
            <div class="p-1"><i class="fa-solid fa-square text-success "></i> Falta de Pago </div>
            <div class="p-1"><i class="fa-solid fa-square text-info "></i> Completado </div>
         
          </div>
          
        </div>
      </div>


    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">


        <!-- contenedor de info incio-->
        <div class="" style="background:rgba(255, 255, 255, .2);">
          
       
        <div hidden class="row p-2" id="contenedorInicio">  
         

          <!-- ./col -->
        </div>
         </div>
        <div class="modal fade" id="modalMasDetalles" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  " role="document" >
            <div class="modal-content bgt-acent">
              <div class="modal-header p-2" >
                <h5 class="modal-title t-secondary" id="staticBackdropLabel"><span id="nombreEvento"></span></h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                  <span style="color: red;">x</span>
                </button>
              </div>
              <div class="modal-body bgt-acent"   >


              <table width="100%" class="t-secondary" rules="rows"> 
                <tr>
                   <th colspan="2"><b>Cliente: </b> <span id="spClienteNombre"></span></th>
                  
                </tr>
                <tbody>
                    <tr>
                    <td> <span><b>Total:</b></span></td>
                    <td style="text-align: right;"> <span id="spTotal"></span>  Bs.</td>

                  </tr>
                  <tr>
                    <td> <span><b>Pagado:</b></span></td>
                    <td style="text-align: right;"> <span id="spPagado"></span>  Bs.</td>
                  </tr>
                  <tr>
                    <td><span><b>Saldo Pagar:</b></span></td>
                    <td style="text-align: right;"><span id="spSaldo"></span>  Bs.</td>

                  </tr>
                
                  <tr>
                    <td> <span><b>Dias :</b></span></td>
                    <td>  <span id="spDias"></span></td>

                  </tr>
                  <tr>
                    <td> <span><b>Fechas Inicio:</b></span></td>
                    <td> <span id="spFechaInicio"></span></td>

                  </tr>
                </tbody>
              </table>
              <span hidden id="spIdReserva"></span>
            </div>
            <div class="modal-footer d-flex justify-content-around p-1">
              <!-- <button type="button" class="btn btn-sm  btnt-primary" data-dismiss="modal">Cancelar</button> -->
              <button type="button" class="btn btn-sm  btnt-primary" id="btnPagosYDetalle"> Pagos y Detalle</button>
            </div>
          </div>
        </div>
      </div>



    </div>


  </section>
     -->
</div>
</div>

