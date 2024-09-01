
<div class="wrapper " style="background: #C69F74;">

  <div class="content-wrapper p-0 px-2"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <section class=" p-2 m-0">


      <div class="row  d-flex justify-content-center">
        <div class="col-8 d-flex justify-content-center align-items-center">

          <h3 class="t-primary" >Reporte General de  Ingresos</h3>
        </div>
        
      </div>


    </section>
    <section class="px-2 py-1" style="background:rgba(255, 255, 255, .2); height: 78vh;"  >

      <div class="col-12 d-flex justify-content-end" >

        <button  title="Imprimir" class="btn btn-sm m-0  p-1 btnt-primary imprimirReporte" title="Eventos Realizados"><b><i class="fa-solid fa-print fa-xl"  ></i></b></button>

      </div>
      <div class="d-flex justify-content-center justify-content-center">
       <div class="d-flex"> 
         <div class="d-flex align-items-center">
          <h5>Desde </h5>
          <div class="myBox">

            <input id="fechaIncio" class="myImputField" type="date" value="2023-10-26" name="fechaIncio" >
          </div>
        </div>
        <div class="d-flex align-items-center">
          <h5>Hasta </h5>

          <div class="myBox">

            <input id="fechaFin" class="myImputField" type="date" value="2023-10-27" name="fechaFin" >
          </div>
        </div>
      </div>
    </div>

    <div class="mx-2">

      <div style="max-height: 60vh; overflow-y: auto; "  >
        <table id="" class="table table-sm"   width="100%" >

         <thead class="t-secondary ">
          <tr style="text-align: center;">
            <th style="width:25px">Nro </th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total Bl.</th>

          </tr>
        </thead>
        <div class="" style="background:orange;">
           <tbody class=" t-secondary-n tReporteGeneral" id=""  >


        </tbody>
        </div>
       
       
    </table>
  </div>

  <div>
   <table class=""  id=""  width="100%" >
         
        <tfoot >
         <tr style="border-top: 2px solid black;">
           <th colspan="3" style="text-align:center;"><h5>Ingresos:</h5></th>
          
           <th style="text-align:right; margin-right:15px">
            <span>Bs. </span><span id="ingresosReporte">0.00</span>
          </th>
        </tr>
      </tfoot>
    </table>
 </div>
</div>
</section>




