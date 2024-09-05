
<div class="wrapper" style="background: #white;">

  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header p-1">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-12 t-primary">
            <h1>Servicios</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
            <div class="card px-2" style="background:rgba(255, 255, 255, .2);height: 80vh; " >
            

                    <div class="row px-1">
                      <div class="col-6 d-flex align-items-center">
                        <button class="btn btn-sm btnt-primary" id="btnagregarServicio">Nuevo</button>
                      </div>
                       <div class=" col-6 d-flex justify-content-end m-0 p-0" >
                      <div class="myBox">
                        
                      <input class="myImputField form-control-sm" type="text" id="buscarServicio" name="" maxlength="18">
                      <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                      </div>
                    </div>
                    </div>
            
                 
                        <table id="miTablaServicio" class="table table-sm  miTablaServicio">
                          <thead class="t-secondary">
                            <tr>
                              <th style="text-align:center;">Nro</th>
                              <th style="text-align:center;">Servicios</th>
                              <th style="text-align:center;">unidad Medida</th>
                              <th style="text-align:center;">Precio Bs.</th>
                                <th style="text-align:center;">Cant.Maxima</th>
                              <th style="text-align:center;"> Descriccion</th>
                               
                              <th style="width:20px">acciones</th>

                            </tr>
                          </thead>
                          <tbody class="t-secondary-n" id="servicioT">
                            
                          </tbody>

                        </table>
              

    
              </div>
                    <form id="formModificarServicio" autocomplete="off">
                     <div class="modal modal-primary" id="modificarServicio" aria-hidden="true"  data-backdrop="static"  >
                      <div class="modal-dialog modal-dialog-centered modal-md" >
                        <div class="modal-content" >
                          <div class="modal-header bgt-primary" >
                            <div class="container">
                              <div class="row">

                                <h5 class="modal-title">Modificar Servicio <span id="titleModalDay"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span  aria-hidden="true" style="color: red;">X</span></button>
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">                    

                              <div class="row  d-flex" >
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <input type="hidden" id="idServicio" name="idServicio" >
                                    <input class=" myImputField" type="text" id="nombreServicioM" name="nombreServicioM"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="25"  required autofocus>
                                    <label class="mylabel" for="nombreServicio" >Nombre de servicio</label>
                                  </div>
                                </div>

                              </div>

                              <div class="row " >
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <select class=" myImputField" type="text" id="medidaM" name="medidaM" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus>
                                       <option>dia</option>
                                      <option>persona</option>
                                    </select>

                                    <label class="mylabel" for="medida" >Unidad Medida</label>
                                   
                                  </div>
                                </div>
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <input class=" myImputField" type="text" id="precioM" name="precioM" value="" onkeypress="return soloNumeroPunto(event)" minlength="1" maxlength="50" required autofocus>

                                    <label class="mylabel" for="precio" >Precio Unidad</label>
                                    <label class="mylabel-icon" for="precio" >Bs.</label>

                                  </div>
                                </div>
                                <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="maximoM" name="maximoM" value="" onkeypress="return soloNumero(event)" minlength="1" maxlength="3" required autofocus>

                                  <label class="mylabel" for="maximo" >Cantidad Maxima Servicio</label>
                                </div>
                              </div>
                                  <div  class="col-12 ">
                                    <div class="myBox">
                                      <input class=" myImputField" type="text" id="descripcionM" name="descripcionM"   minlength="1" maxlength="200" required autofocus>
                                      <label class="mylabel" for="descripcion" >Descriccion</label>
                                    </div>
                                  </div>




                                


                              </div> 



                            </div>

                            <div class="modal-footer d-flex justify-content-around" >
                             <button class="btn btn-sm btnt-primary" type="submit">
                              <i class="fas fa-save m-1 text-success"></i>Guardar</button>
                             <button class="btn btn-sm btnt-primary" type="button" data-dismiss="modal"><i class=" fas fa-times p-1 text-danger"></i>Cancelar</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- fin de incio de Modal -->
                    </form>
                 <form id="formularioAgregarServicio" autocomplete="off">
                     <div class="modal modal-primary" id="agregarServicioModal" aria-hidden="true"  data-backdrop="static"  >
                      <div class="modal-dialog modal-dialog-centered modal-md" >
                        <div class="modal-content " >
                          <div class="modal-header bgt-primary" >
                            <div class="container">
                              <div class="row">

                                <h5 class="modal-title">Agregar Nuevo Servicio <span id="titleModalDay"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span  aria-hidden="true" style="color:red">X</span></button>
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">                    

                                 <div class="col-12">
                           
                            <div class="row  d-flex" >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="nombreServicio" name="nombreServicio"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="250"  required autofocus>
                                  <label class="mylabel" for="nombreServicio" >Nombre de servicio</label>
                                </div>
                              </div>

                            </div>
                           
                            <div class="row " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <select class=" myImputField" type="text" id="medida" name="medida" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus><option>dia</option>
                                      <option selected>persona</option></select>

                                  <label class="mylabel" for="medida" >Unidad Medida</label>
                                </div>
                              </div>
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="precio" name="precio" value="" onkeypress="return soloNumeroPunto(event)" minlength="1" maxlength="5" required autofocus>

                                  <label class="mylabel" for="precio" >Precio Unidad</label>
                                  <label class="mylabel-icon" for="precio" >Bs.</label>

                                </div>
                              </div>
                               <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="maximo" name="maximo" value="" onkeypress="return soloNumero(event)" minlength="1" maxlength="3" required autofocus>

                                  <label class="mylabel" for="maximo" >Cantidad Maxima Servicio</label>
                                </div>
                              </div>

                            </div> 
                             <div class="row " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="descripcion" name="descripcion"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="225" required autofocus>
                                  <label class="mylabel" for="descripcion" >Descriccion</label>
                                </div>
                              </div>
                            </div>
                          
                         </div>



                            </div>

                            <div class="modal-footer d-flex justify-content-around" >
                             <button class="btn btn-sm btnt-primary" type="submit">
                              <i class="fas fa-save m-1 text-success"></i>Guardar</button>
                             <button class="btn btn-sm btnt-primary" type="button"  id="btnLimpiarAgregarServicio" ><i class=" fas fa-times p-1 text-danger"></i>Cancelar</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- fin de incio de Modal -->
                  </form>

                



         

</section>

</div>


</div>

<script type="text/javascript">


</script>