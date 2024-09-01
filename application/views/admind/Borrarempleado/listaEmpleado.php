<div class="wrapper" style="background: #C69F74;">
  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 t-primary ">
            <h3><b>Empleados</b></h3>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="background:transparent;">
              <div class="card-header p-0  ">
                <ul class="nav nav-pills pt-0 bgt-acent t-primary">
                  <li class="nav-item"><a class="nav-link active " href="#empleados" data-toggle="tab">Empleados</a></li>
                  <li class="nav-item"><a class=" nav-link" href="#agregarEmpleado" data-toggle="tab">Agregar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Eliminados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body m-0 ps-2 pe-2 pt-0" style="background:rgba(255, 171, 107, .2);">
                <div class="tab-content">
                  <div class=" tab-pane active" id="empleados">
                    <div class=" d-flex justify-content-end m-0 p-0" >
                      <div class="myBox">
                        
                      <input class="myImputField form-control-sm" type="search" id="buscarEmpleado" name="">
                      <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                      </div>
                    </div>
                    <div class="card-body m-0 p-0" style="background:transparent;height:59vh;overflow-y: auto;">
                      <table id="example12" class="table  " >
                        <thead>
                          <tr>
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            
                            <th class="d-none d-lg-table-cell">Ci</th>
                            <th class="d-none d-lg-table-cell">F.Nacimiento</th>
                            <th class="d-none d-lg-table-cell">Sexo</th>

                            <th class="d-none d-lg-table-cell">Cargo</th>
                            <th>Salario</th>
                            <th>Telefono</th>
                            <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                            <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                          </tr>
                        </thead>
                        <tbody id="listaEmpleadoT">

                        </tbody>

                      </table>
                    </div>

                    <div>
                     <form id="formModificarEmpleado">
                       <div class="modal modal-primary" id="modificarEmpleado" aria-hidden="true"  data-backdrop="static"  >
                        <div class="modal-dialog modal-dialog-centered modal-lg" >
                          <div class="modal-content bgt-secondary" >
                            <div class="modal-header bgt-acent" >
                              <div class="container">
                                <div class="row">
                                  <input type="hidden" id="id" name="id">
                                  <h5 class="modal-title">Modificar Datos <span id="titleModalDay">Nombre</span></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span  aria-hidden="true">×</span></button>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-body">                    

                                <div class="post myborder"  style="border-bottom: 2px solid;">

                            
                                  <div class="post">
                                   <div class="row ">
                                     <label>
                                       Datos Basicos
                                     </label>
                                   </div>
                                   <div class="row ">
                                    <div  class=" col-sm-6 col-md-4  col-12 ">
                                     <div class="myBox">
                                      <input class=" myImputField" type="text" id="nombre" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                                      <label class="mylabel" for="nombreUsuario" >Nombre</label>
                                    </div>
                                  </div>
                                  <div  class=" col-sm-6 col-md-4  col-12 ">
                                   <div class="myBox">
                                    <input class=" myImputField" type="text" id="primerApellido" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required value="mamani">
                                    <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                                  </div>
                                </div>
                                <div  class=" col-sm-6 col-md-4  col-12 ">
                                 <div class="myBox">
                                  <input class=" myImputField" type="text" id="segundoApellido" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25">
                                  <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                                </div>
                              </div>
                            </div>
                            <div class="row ">
                              <div  class=" col-sm-6 col-md-3  col-12  ">
                               <div class="myBox">
                                <input class="myImputField" type="text" id="ci" name="ci" onkeypress="return LetrasNumero(event)" minlength="7" maxlength="10"  required>
                                <label class="mylabel" for="ci" >C.I.</label>
                              </div>
                            </div>
                            <div  class=" col-sm-6 col-md-3  col-12 ">
                              <div class="myBox">
                                <input class="myImputField" type="date" id="fechaNacimiento" name="fechaNacimiento"   max="2023-08-01" value="2020-01-01"   required>
                                <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>

                              </div>
                            </div>

                            <div class="col-6 col-sm-12 d-flex justify-content-center align-items-end t-secondary">


                              <div class="row ">

                                <label class="">Genero:</label>

                                <div class="col d-flex justify-content-around">
                                 <div class="form-check form-check-inline">
                                  <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                                  <label class="form-check-label" for="radioF">Femenino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                                  <label class="form-check-label" for="radioM">Masculino</label>
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>

                        <div class="row ">
                         <label>
                           Datos del Empleo
                         </label>

                       </div>
                       <div class="row">
                         <div class="form-group col-sm-6 col-md-3  col-12 ">


                           <div class="myBox">


                            <select class="myImputField"  id="cargoId" name="cargo">

                             
                              <?php foreach ($cargo ->result() as $row) {
                                ?>

                                <option class="bgt-acent" value="<?php echo $row->id; ?>" >
                                 <?php echo $row->nombreCargo; ?>
                               </option>


                               <?php

                             } 
                             ?>


                           </select>
                           <label class="mylabel">Cargo</label>

                         </div>
                       </div>
                       <div  class=" col-sm-6 col-md-3  col-12  ">
                        <div class="myBox">
                          <input class="myImputField" type="text" id="salario" name="salario" onkeypress="return soloNumero(event)" minlength="2" maxlength="10"  required>
                          <label class="mylabel" for="salario" >Salario</label>
                        </div>
                      </div>
                      <div  class=" col-sm-6 col-md-3  col-12  ">
                        <div class="myBox">
                          <input class="myImputField" type="text" id="telefono" name="telefono" onkeypress="return soloNumero(event)" minlength="7" maxlength="10"  required>
                          <label class="mylabel" for="telefono" >Telefono</label>
                        </div>
                      </div>
                      <div  class=" col-sm-6 col-md-3  col-12 ">
                       <div class="myBox">
                        <input class="myImputField" type="date" id="fechaInicio" name="fechaInicio"   max="" value="2023-09-01"   required>
                        <label class="mylabel" for="fechaInicio"  >Fecha Inicio</label>

                      </div>
                    </div>
                  </div>

                  </div>

              </div>
            
            </div>

            <div class="modal-footer d-flex justify-content-around bgt-secondary" >
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

  </div>

</div>
























<div class="tab-pane" id="agregarEmpleado">
  <!-- Post -->
  <!-- <?php  echo form_open_multipart('empleado/agregarEmpleado'); ?> -->
  <form id="formularioRegistroEmpleados">
    <div class="post">
     <div class="row ">
       <label>
         Datos Basicos
       </label>
     </div>
     <div class="row ">
      <div  class=" col-sm-6 col-md-4  col-12 ">
       <div class="myBox">
        <input class=" myImputField" type="text" id="nombreUsuarioD" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
        <label class="mylabel" for="nombreUsuario" >Nombre</label>
      </div>
    </div>
    <div  class=" col-sm-6 col-md-4  col-12 ">
     <div class="myBox">
      <input class=" myImputField" type="text" id="primerApellidoD" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required >
      <label class="mylabel" for="primerApellido" >Primer Apellido</label>
    </div>
  </div>
  <div  class=" col-sm-6 col-md-4  col-12 ">
   <div class="myBox">
    <input class=" myImputField" type="text" id="segundoApellidoD" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25">
    <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
  </div>
</div>
</div>
<div class="row ">
  <div  class=" col-sm-6 col-md-6  col-12  ">
   <div class="myBox">
    <input class="myImputField" type="text" id="ciD" name="ci" onkeypress="return LetrasNumero(event)" minlength="7" maxlength="10"  required>
    <label class="mylabel" for="ci" >C.I.</label>
  </div>
</div>
<div  class=" col-sm-6 col-md-6  col-12 ">
  <div class="myBox">
    <input class="myImputField" type="date" id="fechaNacimientoD" name="fechaNacimiento"   max="2023-08-01" value="2020-01-01"   required>
    <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>

  </div>
</div>

<div class="col-6 d-flex justify-content-center align-items-end t-secondary">


  <div class="row ">

    <label class="">Genero:</label>

    <div class="col d-flex justify-content-around">
     <div class="form-check form-check-inline">
      <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
      <label class="form-check-label" for="radioF">Femenino</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
      <label class="form-check-label" for="radioM">Masculino</label>
    </div>
  </div>
</div>

</div>

</div>

<div class="row ">
 <label>
   Datos del Empleo
 </label>

</div>
<div class="row">
 <div class="form-group col-sm-6 col-md-3  col-12 ">


   <div class="myBox">


    <select class="myImputField"  name="cargo">


      <?php foreach ($cargo ->result() as $row) {
        ?>

        <option class="bgt-acent" value="<?php echo $row->id; ?>" <?php echo ($row->nombreCargo == 'mantenimiento') ? 'selected' : ''; ?>>
         <?php echo $row->nombreCargo; ?>
       </option>


       <?php

     } 
     ?>


   </select>
   <label class="mylabel">Cargo</label>

 </div>
</div>
<div  class=" col-sm-6 col-md-3  col-12  ">
  <div class="myBox">
    <input class="myImputField" type="text" id="salario" name="salario" onkeypress="return soloNumero(event)" minlength="" maxlength="10"  required>
    <label class="mylabel" for="salario" >Salario</label>
  </div>
</div>
<div  class=" col-sm-6 col-md-3  col-12  ">
  <div class="myBox">
    <input class="myImputField" type="text" id="telefono" name="telefono" onkeypress="return soloNumero(event)" minlength="7" maxlength="10"  required>
    <label class="mylabel" for="telefono" >Telefono</label>
  </div>
</div>
<div  class=" col-sm-6 col-md-3  col-12 ">
 <div class="myBox">
  <input class="myImputField" type="date" id="fechaInicio" name="fechaInicio"   max="" value="2023-09-01"   required>
  <label class="mylabel" for="fechaInicio"  >Fecha Inicio</label>

</div>
</div>
</div>


<div class="row d-flex justify-content-around p-3">
  <button class="btn btn-sm btnt-primary" type="submit">
    <i class="fas fa-save text-success me-2"></i> Guardar</button>



    <button class="btn btn-sm btnt-primary" type="button"><i class="fas fa-times me-2 text-warning"></i> Cancelar</button>


  </div>



</div>
<!-- /.post -->
</form>
</div>


<!-- /.tab-pane -->

<div class="tab-pane" id="settings">
  <div class="card-body">
    <table id="example12" class="table ">
      <thead>
        <tr>
          <th>Nro</th>
          <th>Nombre Completo</th>

          <th class="d-none d-lg-table-cell">Ci</th>
          <th class="d-none d-lg-table-cell">F.Nacimiento</th>
          <th class="d-none d-lg-table-cell">Sexo</th>

          <th class="d-none d-lg-table-cell">Cargo</th>
          <th>Salario</th>
          <th>Telefono</i></th>

          <th>Activar</th>
        </tr>
      </thead>
      <tbody id="listaEmpleadoTDesabilitados">

      </tbody>

    </table>
  </div>


</div>
</div>
</div>
</div>

</div>
</div>


</div>
</section>

</div>
</div>




