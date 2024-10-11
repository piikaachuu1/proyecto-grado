

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="<?php echo base_url();?>/adminlti/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/adminlti/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script src="<?php echo base_url();?>/miestilos/md/js/mdb.min.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>/adminlti/plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/jquery-validation/additional-methods.js"></script>

<script src="<?php echo base_url();?>/adminlti/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/adminlti/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/adminlti/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/adminlti/dist/js/demo.js"></script>


<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>/adminlti/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url();?>/adminlti/plugins/toastr/toastr.min.js"></script>
<!-- para validaciones de texbox propio -->
<!-- mapas -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- mapas -->
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/validaciones.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionUsuario.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionClientes.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionServicio.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/calendarioPrincipal.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionReservas.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionReportes.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/funciones/gestionHome.js"></script> 





<!-- jspdf -->
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/jspdf/jspdf.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/jspdf/jspdf.plugin.autotable.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/jspdf/numeroaletras.js"></script> 



<!-- alertas -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>miestilos/js/buscadorInterno/selectize.js"></script>  -->


<!-- Page specific script -->

<script>$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#formRegistro2').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
$.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });

  $('#formModificar').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


  // formularioAgregarServicio

  $('#formularioAgregarServicio').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  // nuevoClienteFormulario
  
  $('#nuevoClienteFormulario').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


  // formularioAgregarEvento

  $('#nuevoClienteFormulario').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  // formModificarServicio

  $('#formModificarServicio').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
     
    },
    messages: {
      email: {
        required: "Ingrese un correo",
        email: "Ingrese un correo valido"
      },
  
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.myBox').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
<script>
 

 function inicializarDataTableR(){

  $("#miTablaR").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "pageLength": 8,
    "searching": false,
    "pagingType": "full_numbers",
    "language": {
      "decimal": "",
      "emptyTable": "No hay datos disponibles en la tabla",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 a 0 de 0 registros",
      "infoFiltered": "(filtrado de _MAX_ registros totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
        "first": '<i class="fas fa-step-backward"></i>',
        "previous": '<i class="fas fa-chevron-left"></i>',
        "next": '<i class="fas fa-chevron-right"></i>',
        "last": '<i class="fas fa-step-forward"></i>'
      },
      "aria": {
        "sortAscending": ": activar para ordenar la columna ascendente",
        "sortDescending": ": activar para ordenar la columna descendente"
      }
    },
    
  });
}

 function inicializarDataTableCliente(){

    $(".miTablaCliente").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "pageLength": 8,
    "searching": false,
    "pagingType": "full_numbers",
    "language": {
      "decimal": "",
      "emptyTable": "No hay datos disponibles en la tabla",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 a 0 de 0 registros",
      "infoFiltered": "(filtrado de _MAX_ registros totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
        "first": '<i class="fa-solid fa-angles-left"></i>',
        "previous": '<i class="fas fa-chevron-left"></i>',
        "next": '<i class="fas fa-chevron-right"></i>',
        "last": '<i class="fa-solid fa-angles-right"></i>'
      },
      "aria": {
        "sortAscending": ": activar para ordenar la columna ascendente",
        "sortDescending": ": activar para ordenar la columna descendente"
      }
    },
  // "dom": '<"top"lf>rt<"bottom"ip>', // Cambia la posición del campo de búsqueda

  // "initComplete": function () {
  //   // Reemplaza el texto "Buscar" con el icono de búsqueda de Font Awesome
  //   $('.dataTables_filter label input[type="search"]').attr('placeholder', 'Buscar...');
  //   $('.dataTables_filter label').addClass('input-group');
  //   $('.dataTables_filter label').append('<span class="input-group-btn"><button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>');
  // },
    
  });
 }

   function inicializarDataTableServicio(){
      $("#miTablaServicio").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "pageLength": 8,
    "searching": false,
    "pagingType": "full_numbers",
    "language": {
      "decimal": "",
      "emptyTable": "No hay datos disponibles en la tabla",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 a 0 de 0 registros",
      "infoFiltered": "(filtrado de _MAX_ registros totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
        "first": '<i class="fa-solid fa-angles-left"></i>',
        "previous": '<i class="fas fa-chevron-left"></i>',
        "next": '<i class="fas fa-chevron-right"></i>',
        "last": '<i class="fa-solid fa-angles-right"></i>'
      },
      "aria": {
        "sortAscending": ": activar para ordenar la columna ascendente",
        "sortDescending": ": activar para ordenar la columna descendente"
      }
    },
  // "dom": '<"top"lf>rt<"bottom"ip>', // Cambia la posición del campo de búsqueda

  // "initComplete": function () {
  //   // Reemplaza el texto "Buscar" con el icono de búsqueda de Font Awesome
  //   $('.dataTables_filter label input[type="search"]').attr('placeholder', 'Buscar...');
  //   $('.dataTables_filter label').addClass('input-group');
  //   $('.dataTables_filter label').append('<span class="input-group-btn"><button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>');
  // },
    
  });
  
 }

 

</script>



</body>
</html>
