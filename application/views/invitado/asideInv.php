<!-- Main Sidebar Container -->
<!-- <aside class="main-sidebar sidebar-dark-info elevation-5 sideba-mini bgt-primary " style=" background-image: url('<?php echo base_url();?>/img/asideA.png');"> -->
    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-info elevation-5 sideba-mini bgt-primary " style=" background:red;">
  
    <div class="sidebar" style="background:rgba(255, 255, 255, 0.0);">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 pt-3 ">
            <div class="container ">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-center ">
                        <a href="<?php echo base_url();?>index.php/usuario/homeAdmind">   
                            <img src="<?php echo base_url();?>img/logo.png" alt="AdminLTE Logo" class=" img-circle elevation-3 " style="opacity: .8 ;height: auto ; width: 60px;">
                        </a>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <span class="brand-text" style="color:#FFAB6B; font-size:25px;"><b>Reserva Eventos</b></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="inicio">
                    <!-- <a href="<?php echo base_url();?>index.php/usuario/panel" class="nav-link "> -->
                        <i class="fa-solid nav-icon fa-house  t-acent"></i>
                        <p class="t-primary" ><b>Inicio</b></p>
                    <!-- </a> -->
                </li>

               

                
                <li class="nav-item" id="clientes">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie t-acent"></i>
                        <p class="t-primary">Reserva Eventos</p>
                    </a>
                </li>
                <li class="nav-item" id="clientes">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie t-acent"></i>
                        <p class="t-primary">Clientes</p>
                    </a>
                </li>

                <li class="nav-item" id="servicios">
                <a href="<?php echo base_url();?>index.php/servicios/index" class="nav-link">

                        <i class="nav-icon fas fa-clipboard-list t-acent"></i>
                        <p class="t-primary">Servicios</p>
                    </a>
                </li> 

               

                <li class="nav-item" id="salir">
                    <a href="<?php echo base_url();?>index.php/usuario/logout" class="nav-link">
                        <i class="nav-icon fas fa-power-off t-acent"></i>
                        <p>
                            Salir
                            <i class="fas  right ">
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;

    // Nuevo código para usar ids
    var menuIds = ["inicio", "calendario", "eventos", "usuarios", "clientes", "servicios", "reportes", "salir"];

    menuIds.forEach(function(id) {
        var menuLink = document.getElementById(id);
        if (menuLink && menuLink.href === currentUrl) {
            menuLink.classList.add('active');
            menuLink.querySelector('p').style.backgroundColor = 'pink'; // O el color que desees
        }
    });
});

</script>
