
<div class="wrapper" style="background: #C69F74;">

  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo3.jpg');">
    <!--  (cabecera header) -->
    <section class="content-header">


      <div class="row">
        <h1 class="t-primary" > Usuarios</h1>
      </div>


    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">

        <div class="card " style="background:rgba(255, 255, 255, .2);" >

          <div>
            <button class="btn btn-sm btnt-primary m-1 " id="btnNuevoUsuario"><i class="fa-solid fa-user-plus"></i> Nuevo</button>
          </div>
          <div class="card-body pe-2 ps-2 pb-2 pt-0 " >

            <!-- Inicio usuarios -->


            <div class="card-body m-0 p-0" style="max-height: 59vh;   overflow-y: auto;">
              <table class="table table-responsive-lg " rules="rows">
                <thead class="t-secondary">

                  <tr>
                    <th >Nombre Completo</th>
                    <th class=" d-none d-md-table-cell d-lg-table-cell">C.I</th>
                    <th class="d-none d-lg-table-cell">Sexo</th>
                    <th class="d-none d-lg-table-cell">Fecha Nacimiento</th>
                    <th class="d-none d-md-table-cell d-lg-table-cell">Email</th>

                    <th>Usuario</th>
                    <th>Rol</th>
                    <th style="width:20px">Acciones</th>


                  </tr>

                </thead>
                <tbody class="t-secondary-n" id="listaUsuario">


                </tbody>
              </table>
            </div>

            <!-- /.card-body -->

            <!-- Inicion modefica modal -->
            <form id="formModificar eeds-validation" novalidate>
             <div class="modal modal-primary" id="ModificarUsuario" aria-hidden="true"  data-backdrop="static"  >
              <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content " >
                  <div class="modal-header bgt-primary" >
                    <div class="container">
                      <div class="row">

                        <h5 class="modal-title ">Modificar Datos <span id="titleModalDay"></span></h5>
                        <button type="button" class="close red" data-dismiss="modal" aria-label="Close">
                          <span class="text-red" >X</span></button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-body">                    

                      <div class="post myborder"  style="border-bottom: 2px solid;">

                         <div class="row ">
                          <div  class=" col-sm-6 col-md-4  col-12  ">
                            <input type="hidden" id="idD" name="id">
                            <div class="myBox">
                              <input class=" myImputField" type="text" id="nombreUsuarioD" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                              <label class="mylabel" for="nombreUsuario" >Nombre</label>
                            </div>
                           

                          </div>

                          <div  class=" col-sm-6 col-md-4  col-12  ">

                            <div class="myBox">
                              <input class=" myImputField" type="text" id="primerApellidoD" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required value="mamani">
                              <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                            </div>
                          </div>
                          <div  class=" col-sm-6 col-md-4  col-12  ">

                            <div class="myBox">
                              <input class=" myImputField" type="text" id="segundoApellidoD" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25" placeholder="">
                              <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                            </div>
                          </div>


                        </div>
                        <div class="row ">

                         <div  class=" col-sm-3 col-md-4  col-12  ">

                          <div class="myBox">
                            <input class="myImputField" type="text" id="ciD" name="ci" onkeypress="return LetrasNumero(event)" minlength="7" maxlength="10"  required>
                            <label class="mylabel" for="ci" >C.I.</label>
                          </div>
                        </div>

                        <div  class=" col-sm-3 col-md-4  col-12 d-flex justify-content-center  ">


                          <div class="myBox">
                            <input class="myImputField" type="date" id="fechaNacimientoD" name="fechaNacimiento"   max="2024-08-01" value="2000-01-01"   required>
                            <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>

                          </div>
                        </div>

                      </div>

                      <div class="row t-secondary d-flex justify-content-center align-items-center">

                        <label class="form-label p-2 " for="inlineRadio3">Genero</label>


                        <div class=" p-2 form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                          <label class="form-check-label" for="radioF">Femenino</label>
                        </div>
                        <div class=" p-2 form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                          <label class="form-check-label" for="radioM">Masculino</label>
                        </div>

                      </div>

                    <div class="row">
                      <div  class=" col-sm-6 col-md-6  col-12 ">

                       <div class="myBox">
                        <input class="myImputField" type="email" id="email" name="email"  minlength="7" maxlength="50"  required>
                        <label class="mylabel" for="email" >Email</label>
                        <label class="mylabel-icon" for=""><i class="fa-solid fa-envelope"></i></label>

                      </div>
                    </div>
                    <div  class=" col-sm-6 col-md-6  col-12 ">
                      <div class="myBox">
                        <select class="myImputField" name="rol" id="rolId">

                          <!-- <option selected disabled class="bgt-acent">Seleccione ... </option> -->
                            <option  class="" value="admin" >administrador</option>
                            <option  class="" value="invitado" selected >invitado</option>
                        </select>
                        <label class="mylabel" for="email" >Rol Usuario</label>
                      </div>
                    </div>

                  </div>

                </div>


                <div class="clearfix"></div>        

              </div>

              <div class="modal-footer d-flex justify-content-around " >
               <button class="btn btn-sm btnt-primary" type="submit" data-dismiss="modal"><i class=" fas fa-times p-1 text-danger"></i>Cancelar</button>
               <button class="btn btn-sm btnt-primary" type="submit">
                <i class="fas fa-save m-1 text-success"></i>Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- fin de incio de Modal -->
      </form>
      
      <!-- fin Usuarios -->







      <form class="" id="formRegistro2">
        <div class="modal modal-primary" id="agregarUsuario" aria-hidden="true"  data-backdrop="static"  >
          <div class="modal-dialog modal-dialog-centered modal-lg" >
            <div class="modal-content " >
              <div class="modal-header bgt-primary" >
                <div class="container">
                  <div class="row">

                    <h5 class="modal-title ">Agregar Usuario <span id="titleModalDay"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="text-danger" aria-hidden="true">X</span></button>
                    </div>
                  </div>
                </div>
                <div class="modal-body m-0">    
               
                      <div class="col-sm-12 col-md-12" >

                    <div class="row ">
                      <div  class=" col-sm-6 col-md-4  col-12  ">

                        <div class="myBox">
                          <input class=" myImputField" type="text" id="nombre" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required placeholder>
                          <label class="mylabel" for="nombre" >Nombre</label>

                        </div>
                      </div>
                      <input type="hidden" name="nombreUsuario" id="nombreUsuario">
                      <div  class=" col-sm-6 col-md-4  col-12 ">

                        <div class="myBox">
                          <input class=" myImputField" type="text" id="primerApellido" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required placeholder>
                          <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                        </div>
                      </div>
                      <div  class=" col-sm-6 col-md-4  col-12  ">

                        <div class="myBox">
                          <input class=" myImputField" type="text" id="segundoApellido" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25" placeholder>
                          <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                        </div>
                      </div>


                    </div>
                    <div class="row ">


                      <div  class=" col-sm-6 col-md-6  col-12  ">



                        <div class="myBox">
                          <input class="myImputField" type="date" id="fechaNacimiento" name="fechaNacimiento"   max="2023-08-01" value="2005-01-01"   required>
                          <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>


                        </div>
                      </div>
                      <div class=" col-sm-6 col-md-6  col-12  ">

                        <label class="form-label p-2 t-secondary" for="inlineRadio3">Genero</label>


                        <div class=" p-2 form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioFm" value="f" checked>
                          <label class="form-check-label t-secondary-n" for="radioFm">Femenino</label>
                        </div>
                        <div class=" p-2 form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioMm" value="m">
                          <label class="form-check-label t-secondary-n" for="radioMm">Masculino</label>
                        </div>
                      </div>
                    </div>
                        <div class="row d-flex">

                         <div  class=" col-sm-6 col-md-6  col-12  ">
                          <input type="text" id="aux" name="aux" value="0" required>

                          <input type="text" id="idE" name="idE" value="0"> <div
                          class="myBox">

                          <input class="myImputField" type="text" id="ci" name="ci" onkeypress="return LetrasNumero(event)" list="informacion"   minlength="7" maxlength="10"  required autofocus placeholder>
                          <datalist id="informacion">

                          </datalist>

                          <!-- <label><small></small></label> -->

                          <label class="mylabel" for="ci" >C.I.</label>

                        </div>
                      </div>

                    </div>
                   

                  <div class="row">
                    <div  class=" col-sm-6 col-md-6  col-12 ">

                     <div class="myBox">
                      <input class="myImputField" type="email" id="emailA" name="email"  minlength="7" maxlength="50"  required placeholder >
                      <label class="mylabel" for="email" >Email</label>
                      <label class="mylabel-icon" for="email"><i class="fa-solid fa-envelope"></i></label>

                    </div>
                  </div>
                  <div  class=" col-sm-6 col-md-6  col-12 ">
                    <div class="myBox">
                      <select class="myImputField" name="rol" id ="rol" required>
<!-- hacer llegar desde base de datos -->
                        <!-- <option selected disabled class="bgt-acent">Seleccione ... </option> -->
                        <option   class="" value="admin" >administrador</option>
                            <option  class="" value="invitado" selected>invitado</option>
                      </select>
                      <label class="mylabel" for="rol" >Rol Usuario</label>
                    </div>
                  </div>

                </div>
                <div class="row d-flex justify-content-around">
                  <button class=" btn btn-sm btnt-primary " type="button" id="limpiar" >Limpiar </button>
                  <button class="btn btn-sm btnt-primary" type="submit" >
                    <i class="fas fa-save m-1 text-success"></i>Guardar</button>



                  </div> 

                </div>


          </div>


        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </form>


  <!-- find agregar -->


</div><!-- /.card-body -->

</div>
<!-- /.card -->



</div><!-- /.container-fluid -->
</section>


</div>
</div>


<!-- /.content -->

