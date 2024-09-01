
<div class="wrapper" style="background:red">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bgt-acent">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Perfil</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    
    <section class="content">
      <div class="container-fluid">



        <div class="row flex-lg-row flex-column-reverse p-0"  >
          <div class="col-lg-8  col-12  "  >
            <!-- small card -->
            <div class="small-box bgt-secondary " >
              <div class="inner">


                <div class="row">
                  <div class="col-12">
                    <div class="card bgt-secondar ">
                      <div class=" p-0 bgt-acent">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Previo</a></li>
                          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body bgt-secondary">
                        <div class="tab-content">
                          <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                              <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                <span class="username">
                                  <a href="#">Elmer.</a>
                                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">Shared publicly - 7:30 PM today</span>
                              </div>
                              <!-- /.user-block -->

                              <?php echo form_open_multipart('usuario/agregarActividad'); ?>
                              <div class="container"> 
                                <div class="row">
                                  <div class="col-sm-6"><img src="" alt="aquie imagen">
                                    <input type="file" name="userfile" placeholder="subir foto" title="seleccione una foto">
                                    <input type="text" class="form-control" name="nombre" placeholder="nombre evento">
                                  </div>
                                  <div class="col-sm-6">
                                    <label for="#textarea1">Ingrese la descriccion de Evento </label>

                                    <textarea rows="10" cols="30" name="descripcion" id="textarea1" placeholder="Ingrese descrccion de nuevo evento">

                                    </textarea>
                                  </div>
                                </div>
                                <div class="row d-flex justify-content-around">
                                 <button class="btn btn-outline-success " type="submit">Guardar</button>
                               </div>
                             </div>
                             <?php echo form_close(); ?>

                           </div>



                         </div>
                         <!-- /.tab-pane -->
                         <div class="tab-pane" id="timeline">
                          <!-- The timeline -->
                          <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-danger">
                                10 Feb. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-envelope bg-primary"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                  quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-user bg-info"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-comments bg-warning"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                  Take me to your leader!
                                  Switzerland is small and neutral!
                                  We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-success">
                                3 Jan. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-camera bg-purple"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                  <img src="https://placehold.it/150x100" alt="...">
                                  <img src="https://placehold.it/150x100" alt="...">
                                  <img src="https://placehold.it/150x100" alt="...">
                                  <img src="https://placehold.it/150x100" alt="...">
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                              <i class="far fa-clock bg-gray"></i>
                            </div>
                          </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                          <form class="form-horizontal">
                           <div class="row  ">

                             <div class="col-lg-6 col-12 "  >
                              <label class="form-label" >Usuario</label>
                              <input type="text" class="form-control" name="" placeholder="Usuario">
                            </div><div class="col-lg-6 col-12">
                              <label>Usuario</label>
                              <input type="text" class="form-control" name="" placeholder="Usuario">
                            </div> 

                          </div>
                          <div class="row  ">

                           <div class="col-lg-4 col-12 ">
                            <label class="form-label" >Nombre</label>
                            <input type="text" class="form-control" name="" placeholder="Nombre">
                          </div><div class="col-lg-4 col-12">
                           <label class="form-label" >Primer Apellido</label>
                           <input type="text" class="form-control" name="" placeholder="Primer Apellido">
                         </div> 
                         <div class="col-lg-4 col-12">
                           <label class="form-label" >Segunndo Apellido</label>
                           <input type="text" class="form-control" name="" placeholder="Segundo Apellido">
                         </div> 
                       </div>
                       <div class="row  ">

                         <div class="col-lg-4 col-12 ">
                          <label class="form-label" >Nombre</label>
                          <input type="text" class="form-control" name="" placeholder="Nombre">
                        </div><div class="col-lg-4 col-12">
                         <label class="form-label" >Primer Apellido</label>
                         <input type="text" class="form-control" name="" placeholder="Primer Apellido">
                       </div> 
                       <div class="col-lg-4 col-12">
                         <label class="form-label" >Segunndo Apellido</label>
                         <input type="text" class="form-control" name="" placeholder="Segundo Apellido">
                       </div> 
                     </div>
                     <div class="row">
                      <div class="col-lg-8 col-12">

                      </div>
                      <div class=" col-lg-4 col-12">
                        <button class="btn btn-primary">Actualizar</button>
                      </div> 
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>





    </div>
  </div>

</div>


<!-- perfil lateral -->
<div class="col-lg-4 col-md-12  col-sm-12  " >
  <!-- small card -->
  <div class="small-box bgt-secondary "  style="height:400px">



   <div class="inner" >
    <div class=" row d-flex justify-content-center">

      <div class="image ">
        <img src="<?php echo base_url();?>/adminlti/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        <div class=" d-flex justify-content-end"><a href="#"><i class="fas fa-edit t-acent "></i></a></div>
      </div>


    </div>

    <div class="row" style="height: 200px;">
      <div class="small-box col bg-primary">
        <h5><?php echo $this->session->userdata('nombreUsuario'); ?></h5>
      </div>
      <div class="small-box col bg-primary">
        <h5><?php echo $this->session->userdata('nombreUsuario'); ?></h5>
      </div>
    </div>



  </div>
</div>

</div>
<!-- fin perfil lateral -->
</div>
<!-- /.row -->


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

