

// fin de validacion de agreagar

$(document).ready(function(){

 
  listarUsuario();

  function listarUsuario()
  {
   $.ajax({
    url:'../usuario/modifiaDatosUsuarioaFUll',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let usuario= JSON.parse(response);
      let template= "";
      usuario.forEach(usuario=>{
        template+=`
        <tr usuarioId=${usuario.id}>
        <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido} <input type="hidden" class="usuarioId" value ="${usuario.id}" ></td>
        <td class="d-none d-md-table-cell d-lg-table-cell">${usuario.ci}</td>
        <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
        <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
        <td  class="d-none d-md-table-cell d-lg-table-cell">${usuario.email}</td>
        <td>${usuario.nombreUsuario}</td>
        <td>${usuario.rol}</td>
        <td class="d-flex justify-content-center" > 

           <button type="submit" class="editaUsuario btn btn-sm btnt-primary" title="Editar" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
         <button class="eliminarUsuario btn btn-sm btnt-primary" title="Eliminar"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> 


        
          
        </td>

        </tr>
        `
      });
      $('#listaUsuario').html(template); 
    }
  });
 }

 $(document).on('click','.eliminarUsuario', function(){

 


      Swal.fire({
            title: "Eliminar Usuario",
            icon: 'warning',
            text: 'Esta seguro de eliminar Usuario',
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
                         let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/eliminarDatosUsuarioa',{id},function(response){
      listarUsuario();


    }) 
                  }
                  else
                  {
                    toastr.warning("Eliminacion Cancelada");
                  }
                  
        });

})

 $(document).on('click','.eliminarUsuarioFisico', function(){

 


      Swal.fire({
            title: "Eliminar Usuario",
            icon: 'warning',
            text: 'Esta seguro de eliminar Usuario Esta eliminacion Fisica desde base de datos',
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
                         let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/eliminarDatosUsuarioaFisico',{id},function(response){
      listarUsuario();


    }) 
                  }
                  else
                  {
                    toastr.warning("Eliminacion Cancelada");
                  }
                  
        });

})



function limpiarFormularioAgregar() {
 $('#aux').val(0);
 $('#idE').val(0);
 $('#nombre').val('').prop('disabled',false);
 $('#nombreUsuario').val('');

 $('#primerApellido').val('').prop('disabled',false);
 $('#segundoApellidoD').val('').prop('disabled',false);
 $('#ci').val('').prop('disabled',false).focus();
 $('#fechaNacimiento').val('2022-01-01').prop('disabled',false);
 $('#emailA').val('');
 $('#limpiar').prop('disabled',true);

}

  $(document).on('click','#limpiar',function(){// limpiar datos de 

   limpiarFormularioAgregar();
 })




  $(document).on('click','.editaUsuario',function(){// modificacion de datos personales
    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/modifiaDatosUsuarioa',{id},function(response){

      var json=JSON.parse(response);
    // console.log(json.email);
      listarUsuario();
      $('#idD').val(json.id);
      $('#nombreUsuarioD').val(json.nombre);
      $('#primerApellidoD').val(json.primerApellido);
      $('#segundoApellidoD').val(json.segundoApellido);
      $('#ciD').val(json.ci);
      $('#email').val(json.email);

      $('#fechaNacimientoD').val(json.fechaNacimiento);
      // $('#rolId').val(1);
      inputF=document.getElementById('radioF')
      inputM=document.getElementById('radioM')
      sexo=json.sexo;
       if(sexo==='f'){

        inputF.checked=true;
      }else
      {
        inputM.checked=true;
      }
     

      $("#rolId option").filter(function() {
        return $(this).text() === json.rol;
      }).prop("selected", true);

      console.log(json.email);
      $("#ModificarUsuario").modal("show");
    })

  })

  $("#formModificar").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/modificarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        var json= JSON.parse(data);
        
        listarUsuario();
        if(json.msg===2)
        {
          toastr.error("ci ya existe");
            
        }
        else if(json.msg===1)
        {
          toastr.success("Datos Modificados");
              
        $("#ModificarUsuario").modal("hide");
        }
        
        else
        {
          console.log("falla");
        }
      
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },
                  // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });

//guardar datos personales
  $("#formDatosPersonales").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/modificarDatosPersonales",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);

      if(json.uri===1)
      {
        toastr.success("Dato Personales modificados");
        $("#editarDatosPersonales").modal("hide");
      location.reload();

      }
      else if(json.uri===11)
      {
        toastr.warning("Ningun datos es modificado");

      }
      else
      {
       toastr.error("El ci de usuario ya existe");
       document.getElementById('ciP').focus();
      }

      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },
        500: function(xhr){
          alert();
        },
                  // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });

$(document).on('click','#btnNuevoUsuario',function(){// limpiar datos de 

        $("#agregarUsuario").modal("show");

 })


 $("#formRegistro2").submit(function(ev){
    ev.preventDefault();
//  alert();
    $.ajax({
      url: "../usuario/agregarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        var json= JSON.parse(data);
        console.log(json);
        if(json.uri==1)
        {
          toastr.warning("Por favor verifique la conexion a internet");
         
        }
        else if(json.uri==3){
          toastr.warning("Por favor verifique los campos");

        }
        else
        {
          
        if(json.uri==2)
        {
          // toastr.warning("El ci del usuario ya existe");

        }else {
          $("#agregarUsuario").modal("hide");
         
          toastr.success("Usuario Registrado con exit", json.msg1+ ' ' +json.msg2);
        console.log(json);

           limpiarFormularioAgregar();

          listarUsuario();
        }
        }
        
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },         // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });

}); //cierre de documentos 


