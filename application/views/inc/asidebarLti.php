<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-5 sideba-mini bgt-primary " style=" background-image: url('<?php echo base_url();?>/img/asideAd.png');">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 pt-3 ">
            <div class="container ">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-center ">
                        <a href="<?php echo base_url();?>index.php/usuario/homeAdmind">   
                            <img src="<?php echo base_url();  ?>img/logo.png" alt="AdminLTE Logo" class=" img-circle elevation-3 " style="opacity: 1 ;height: auto ; width: 100px;">
                        </a>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <span class="brand-text" style="color:#fff; font-size:25px;"><b>Salon de Eventos</b></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="inicio">
                    <a href="<?php echo base_url();?>index.php/usuario/homeAdmind" class="nav-link ">
                        <i class="fa-solid nav-icon fa-house  t-acent"></i>
                        <p class="t-primary" ><b>Inicio</b></p>
                    </a>
                </li>
                <li class="nav-item" id="usuarios">
                    <a href="<?php echo base_url();?>index.php/usuario/agregarView" class="nav-link">
                        <i class="nav-icon fas fa-users t-acent"></i>
                        <p class="t-primary">Usuarios</p>
                    </a>
                </li>
                
              

              

                <li class="nav-item" id="servicios">
                    <a href="<?php echo base_url();?>index.php/servicios/index" class="nav-link">
                  
                        <i class="nav-icon fas fa-clipboard-list t-acent"></i>
                        <p class="t-primary">Servicios</p>
                    </a>
                </li>
                <li class="nav-item" id="clientes">
                <a href="<?php echo base_url();?>index.php/cliente/index" class="nav-link">

                        <i class="nav-icon fas fa-user-tie t-acent"></i>
                        <p class="t-primary">Clientes</p>
                    </a>
                </li>
                <li class="nav-item" id="clientes">
                <a href="<?php echo base_url();?>index.php/usuario/calendario" class="nav-link">
                        <i class="nav-icon fas fa-user-tie t-acent"></i>
                        <p class="t-primary">Reservar Evento</p>
                    </a>
                </li>
               
        

                <li class="nav-item" id="reportes">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt t-acent"></i>
                        <p class="t-primary">Reportes <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left:20px">
                        <li class="nav-item" id="ingresos">
                            <a href="#" class="nav-link">
                                <i class='fa fa-money' style="color:red"></i>
                                <p class="t-primary">Ingresos</p>
                            </a>
                        </li>
                  
                        <li class="nav-item" id="otros">
                            <a href="#" class="nav-link">
                                <i class='fa fa-user-circle-o' style="color:red"></i>
                                <p class="t-primary">Otros</p>
                            </a>
                        </li>
                    </ul>
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
