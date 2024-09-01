


  <div class="wrapper"   style=" background:rgba(255, 255, 255, .1);">
<div class="content-wrapper" style="background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 d-flex justify-content-start text-light">
            <h1><b>Clientes</b></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">





        <div class="row">
          <div class="col-12">
            <div class="card " style="background: rgba(255, 255, 255, .2);">
             
              
                
                  <div >
                    <!-- Post -->
                    <div class="d-flex">
                      <div class="col-6 d-flex align-items-center">
                        <button class="btn btn-md btnt-primary m-0 p-1" id="btnAgregarCliente">Nuevo</button>
                      </div>
                      <div class="col-6  d-flex justify-content-end m-0 p-0" >
                      <div class="myBox">
                        
                      <input class="myImputField form-control-sm" type="text" id="buscarCliente" name="" onpaste="return false;" onkeypress="return LetrasNumero(event)">
                      <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                      </div>
                    </div>
                    </div>

                    <div class="card-body m-0 p-0" style="height: 67vh;">
                      <table id="miTablaCliente" class="table table-sm miTablaCliente"  style="color: #001f3f;">
                        <thead>
                          <tr class="">
                            <th>Nro</th>
                            <th style="text-align: center;">Nombre Completo<i class="fa-solid fa-sort"></i></th>
                            
                            <th style="text-align: center;">Ci</th>

                            <th style="text-align: center;"> Telefono</th>

                            <th width="30px">Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="tbCliente" style="color: #001f3f;">




                        </tbody>

                      </table>
                    </div>



                  </div>

                 
          </div>
   


    </div>
  </div>


</div>
</section>
<div class="modal modal-primary" id="agregarClienteModal" aria-hidden="true"  data-backdrop="static"  >
  <div class="modal-dialog " >
    <div class="modal-content " >
      <div class="modal-header bgt-primary" >
        <div class="container">
          <div class="row">

            <h5 class="modal-title">Agregar Nuevo Cliente<span id="titleModalDay"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span  aria-hidden="true" style="color:red">X</span></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
               <form id="nuevoClienteFormulario" autocomplete="off">

                      <!-- Post -->        

                      <div class="row">

                        <div class=" col-md-12 ">
                         <div class="myBox">

                          <input  class="myImputField" type="text" name="nombre" id="txtNombre" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required autofocus autocomplete="off" onpaste="return false;"/>
                          <label class="mylabel" for="">Nombre</label>


                        </div>
                      </div>
                      <div class=" col-sm-12 col-md-6">
                       <div class="myBox">

                        <input  class="myImputField form-control-md" type="text" name="primerApellido" id="txtApellido1" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required  autocomplete="off" onpaste="return false;"/>
                        <label class="mylabel" for="">Primer Apellido</label>


                      </div>
                    </div>
                    <div class=" col-sm-12 col-md-6 ">
                     <div class="myBox">

                      <input  class="myImputField form-control-sm" type="text" name="segundoApellido" id="txtApellido2" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" autocomplete="off" onpaste="return false;"/>
                      <label class="mylabel" for="">Segundo Apellido</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                 <div class=" col-md-12 col-sm-12">
                   <div class="myBox">

                    <input  class="myImputField" type="text" name="ci" id="txtCi" onkeypress="return LetrasNumero(event)" minlength ="1" maxlength ="9"  required  autocomplete="off" onpaste="return false;"/>
                    <label class="mylabel" for="">C.I.</label>
                    <label class="mylabel-icon" for=""><i class="fa-solid fa-id-card"></i></label>

                  </div>
                </div>
                <div  class=" col-sm-12 col-md-6  ">
                  <div class="myBox">

                    <input  class="myImputField" type="text" name="celular" id="txtCelular" onkeypress="return soloNumero(event)" minlength ="1" maxlength ="9"  required  autocomplete="off" onpaste="return false;"/>
                    <label class="mylabel" for="">Celular</label>
                    <label class="mylabel-icon" for=""><i class="fa-solid fa-mobile-retro"></i></label>

                  </div>
                </div>
                <div  class=" col-sm-12 col-md-6">
                  <div class="myBox">

                    <input  class="myImputField" type="text" name="telefono" id="txtTelefono"  onkeypress="return soloNumero(event)"minlength ="1" maxlength ="9" autocomplete="off" onpaste="return false;"/>
                    <label class="mylabel" for="">Telefono</label>
                    <label class="mylabel-icon" for=""><i class="fa-solid fa-phone"></i></label>

                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-around m-3">
                <button class="btn btn-sm btnt-primary btn-save" type="submit">
                  <i class="fas fa-save text-success"> </i>Guardar</button>

                  <button class="btn btn-sm btnt-primary" type="button" onclick="limmpiarCampos()"><i class="fas fa-times text-warning"></i>limpiar</button>
                </div>

              </form>
        </div>        

      </div>
    </div>
    <!-- /.modal-content -->
  </div> 

<div class="modal modal-primary" id="ModificarCliente" aria-hidden="true"  data-backdrop="static"  >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content bgt-secondary" >
      <div class="modal-header bgt-primary" >
        <div class="container">
          <div class="row">

            <h5 class="modal-title">Modificar Datos <span id="titleModalDay"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span  aria-hidden="true" style="color:red">X</span></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
            <form id="forModificarCliente">

                    <!-- Post -->        

                    <div class="row">

                      <div class=" col-md-12 ">
                       <div class="myBox">
                          <input type="hidden" name="id" id="idM">
                        <input  class="myImputField" type="text" name="nombre" id="txtNombreM" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required autofocus autocomplete="off" onpaste="return false;"/>
                        <label class="mylabel" for="">Nombre</label>


                      </div>
                    </div>
                    <div class=" col-sm-12 col-md-6">
                     <div class="myBox">

                      <input  class="myImputField form-control-md" type="text" name="primerApellido" id="txtApellido1M" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required  autocomplete="off" onpaste="return false;"/>
                      <label class="mylabel" for="">Primer Apellido</label>


                    </div>
                  </div>
                  <div class=" col-sm-12 col-md-6 ">
                   <div class="myBox">

                    <input  class="myImputField form-control-sm" type="text" name="segundoApellido" id="txtApellido2M" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" autocomplete="off" onpaste="return false;"/>
                    <label class="mylabel" for="">Segundo Apellido</label>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class=" col-md-12 col-sm-12">
                 <div class="myBox">

                  <input  class="myImputField" type="text" name="ci" id="txtCiM" onkeypress="return LetrasNumero(event)" minlength ="1" maxlength ="9"  required autocomplete="off" onpaste="return false;"/>
                  <label class="mylabel" for="">C.I.</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-id-card"></i></label>

                </div>
              </div>
              <div  class=" col-sm-12 col-md-6  ">
                <div class="myBox">

                  <input  class="myImputField" type="text" name="celular" id="txtCelularM" onkeypress="return soloNumero(event)" minlength ="1" maxlength ="9"  required autocomplete="off" onpaste="return false;"/>
                  <label class="mylabel" for="">Celular</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-mobile-retro"></i></label>

                </div>
              </div>
              <div  class=" col-sm-12 col-md-6">
                <div class="myBox">

                  <input  class="myImputField" type="text" name="telefono" id="txtTelefonoM"  onkeypress="return soloNumero(event)"minlength ="1" maxlength ="9" autocomplete="off" onpaste="return false;"/>
                  <label class="mylabel" for="">Telefono</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-phone"></i></label>

                </div>
              </div>
            </div>
          <div class="row d-flex justify-content-around m-3">
            <button class="btn btn-sm btnt-primary btn-save" type="submit">
              <i class="fas fa-save" style="color:green;"></i> Guardar Cambios</button>

            </div>
             
          </form>



        </div>        

      </div>
    </div>
    <!-- /.modal-content -->
  </div> 
  <!-- /.modal-dialog -->
</div>


</div>




