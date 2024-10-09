
  listarServicios();

//inicio listar servicios
 function listarServicios()
  {
  
   $.ajax({
    url:'../servicios/listaServicios',
    type:'POST',
    success:function(response){
      
      let servicio= JSON.parse(response);
 
      let template= "";
      var i=1;

      servicio.forEach(servicio=>{
        var precio=parseFloat(servicio.precio).toFixed(2);

        template+=`
        <tr servicioId=${servicio.id} nombreServicio='${servicio.nombre}'>
        <td style="text-align:center">${i}</td>

        <td>${servicio.nombre}</td>
        <td >${servicio.medida}</td>
        <td style="text-align: right;">${precio}</td>
        <td style="text-align: center;">${servicio.maximo}</td>

        <td >${servicio.descriccion}</td>

        <td> 
       <div  class="d-flex justify-content-center" >
        <button title="Editar"  type="submit" class="datosServicio btn btn-sm btnt-primary mx-1" data-target="#datosServicio" ><i class="fa-solid fa-eye-low-vision text-light text-lg"></i></button> 

        <button title="Editar"  type="submit" class="editarServicio btn btn-sm btnt-primary" data-target="#ModificarProveedor" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
       ${isAdmin() ? `<button title="Eliminar" class="eliminarServicio btn btn-sm btnt-primary mx-1">
                              <i class="fa-solid fa-trash fa-lg text-danger"></i>
                            </button>` : ''}
       </div>
        </td>
       </tr>
        `
        i++;
      }); 
      $('#servicioT').html(template); 
      // alert('des');
      inicializarDataTableServicio();
    }
  });
 }//fin lista servicions
function isAdmin() {
  var esAdmin=false;
   var rol=document.getElementById("userDataRol");
   // console.log(rol.textContent)
   if(rol.textContent=='admin'){

      var esAdmin = true; 
     
   }
  return esAdmin;
  
}

$(document).on('keyup', '#buscarServicio', function() {
  let valor = $(this).val();
  if (valor) {
       $.ajax({
    url:'../servicios/listaServiciosBuscar',
    type:'POST',
    data:{valor},
    success:function(response){
      
      let servicio= JSON.parse(response);
 
      let template= "";
      var i=1;

      servicio.forEach(servicio=>{
        var precio=parseFloat(servicio.precio).toFixed(2);

        template+=`
        <tr servicioId=${servicio.id} nombreServicio='${servicio.nombre}'>
        <td style="text-align:center">${i}</td>

        <td>${servicio.nombre}</td>
        <td >${servicio.medida}</td>
        <td style="text-align: right;">${precio}</td>
        <td style="text-align: center;">${servicio.maximo}</td>

        <td >${servicio.descriccion}</td>

        <td> 
       <div  class="d-flex" >
        <button title="Editar"  type="submit" class="datosServicio btn btn-sm btnt-primary" data-target="#datosServicio" ><i class="fa-solid fa-eye-low-vision text-light text-lg"></i></button> 

        <button title="Editar"  type="submit" class="editarServicio btn btn-sm btnt-primary" data-target="#ModificarProveedor" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
       ${isAdmin() ? `<button title="Eliminar" class="eliminarServicio btn btn-sm btnt-primary mx-1">
                              <i class="fa-solid fa-trash fa-lg text-danger"></i>
                            </button>` : ''}

                             </div>
        </td>
       </tr>
        `
        i++;
      });
      $('#servicioT').html(template); 
      // alert('des');
    }
  });

  }
});








function desstroyInicializaServicio() {
    var table = $('#miTablaServicio').DataTable();
    
    // Destruir la instancia DataTable existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#miTablaServicio')) {
        table.destroy();
    }

    listarServicios();
}

//eliminar servicio

 $(document).on('click','.eliminarServicio', function(){
     let element = $(this).closest('[servicioId]');
       let nombreServicio= $(element).attr('nombreServicio');
     
 
    Swal.fire({
            title: nombreServicio,
            icon: 'warning',
            text: 'Esta seguro de eliminar servicios',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            background: 'rgb(251, 214, 169)',
            customContainerClass: 'width:200px',
            customClass: {
                cancelButton: 'btnt-primary btn-sm', // Clase para el botón Cancelar
                confirmButton: 'btnt-primary',
                icon: 'text-warning' // Clase para el botón Cancelar
            }
        }).then((result) => {
              if (result.isConfirmed) {
                    let id= $(element).attr('servicioId');
                  
                    let estado=0;
                    $.post('../servicios/eliminar',{id,estado},function(response){
                       desstroyInicializaServicio()
                       console.log(response);
                       var json = JSON.parse(response);
                       if(json.uri===1)
                       { 
                          toastr.success("Eliminiacion con exito");
                       }
                       else
                       {
                          toastr.warning("Fallo en proceso de eliminacion");

                       }


                    })
                  }
                  else
                  {
                    toastr.warning("Eliminacion Cancelada");
                  }
                  
        });


})






 $(document).on('click','.editarServicio',function(){// modificaionde datos a nivel general
     let element = $(this).closest('[servicioId]');
    let id= $(element).attr('servicioId');

  $.post('../servicios/datoServicio',{id},function(response){

    var json=JSON.parse(response);

    $("#idServicio").val(json.id);
    $("#nombreServicioM").val(json.nombre);
    $("#medidaM").val(json.medida);maximoM
    $("#precioM").val(json.precio);
    $("#maximoM").val(json.maximo);


    $("#descripcionM").val(json.descriccion);
    $("#modificarServicio").modal("show");
                 
  })

})

$(document).on('click','.datosServicio',function(){// modificaionde datos a nivel general
  
  let element = $(this).closest('[servicioId]');
    let id= $(element).attr('servicioId');

  $.post('../servicios/datoServicio',{id},function(response){

    var json=JSON.parse(response);

    $("#idServicio").text(json.id);
    $("#nombreServicioV").text(json.nombre);
    $("#medidaV").text(json.medida);
    $("#precioV").text(json.precio);
    $("#maximoV").text(json.maximo);
    $("#gastoV").text(json.gasto+'%');
    $("#imageV").text(json.imagen);

    $("#imagenServicio").attr("src", "../../uploads/servicios/" + json.imagen);



    $("#descripcionV").text(json.descriccion);
    $("#datosServicio").modal("show");
                 
  })

              
})



// limpiar3(){

//   $("#idServicio").val('');
//   $("#nombreServicioV").val('');
//   $("#medidaV").val('');
//   $("#precioV").val('');
//   $("#maximoV").val('');
//   $("#descripcionV").val('');

// }
  $("#formModificarServicio").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../servicios/modificarServicio",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        console.log(data);
        var json= JSON.parse(data);
          if (json.uri==1) {
            

  
          toastr.success('Servicio modifica'+json.msg);
            $("#modificarServicio").modal("hide");
                desstroyInicializaServicio();


          }
          else
          {
            
          toastr.warning('Ningun campo modificado');
                desstroyInicializaServicio();
            $("#modificarServicio").modal("hide");
          

          }
      },
    });
  }); 




 $(document).on('click','#btnagregarServicio',function(){// modificaionde datos a nivel general
      $("#agregarServicioModal").modal("show");

})


  $("#formularioAgregarServicio").submit(function(ev){
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "../servicios/agregarServicio",
      type: "POST",
      data: formData,
      contentType: false,  // Necesario para enviar archivos
      processData: false,
      success: function(data){

        var json= JSON.parse(data);
          if (json.uri==1) {
            

  
          toastr.success('Servicio Agregado'+json.msg);
         $("#agregarServicioModal").modal("hide");

          desstroyInicializaServicio();

          }
          else if(json.uri==2){
          toastr.warning('Verifique los campos '+json.msg);

          }
          else if(json.uri==3){
            toastr.warning(' '+json.msg);
  
            }
          else
          {
            
          desstroyInicializaServicio();
          
          toastr.warning('fallo de registro servicio '+json.msg);

          }
      },
    });
  }); 











 $(document).on('click','#btnLimpiarAgregarServicio', function(){
 
      var formulario = document.getElementById("formularioAgregarServicio");

    formulario.reset();
})
