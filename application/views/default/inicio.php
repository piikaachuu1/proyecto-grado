<div class="container">
     
  <div class="row  " >
      
      
    <div class="col-md-9 col-sm-6   " >
     <?php foreach ($actividad->result() as $row) {
       // code...
       ?>

      <div class="row">
        <div class="col-4" >
          <img width="300px" src="<?php echo base_url();?>uploads/usuario/<?php echo $row->foto ;?>">
        </div>
       <div class="col-8" style=" ">
          <p><?php echo 'descripcion';?></p>

          <p><?php echo $row->nombre ;?></p>


       </div>
      </div>
      <hr>
     <?php } ?>
   </div>
    <div class=" col-md-3 col-sm-6  d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
          <img class="card-img  " src="<?php echo base_url();  ?>img/nombre.gif" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Este logo nos identficara como a un a mine negocio que se dedica a desarrollo de software para  administracion y reserva ,para eventos  de fiestas de manera que el programa se puede personalizar de manera facil y sencillo para cualquier salon de eventos</p>
          </div>
    </div>
   </div>

  </div>
      
 </div> 
   

