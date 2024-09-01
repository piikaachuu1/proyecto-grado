  
<nav class="navbar navbar-expand-sm navbar-dark   header ">
  <div class="container-fluid rounded">
     
       <img class="rounded  logo" width="50px" src="<?php echo base_url();  ?>img/logo2.png">
     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          
          <a class="nav-link active" aria-current="page" href="<?php echo base_url();  ?>index.php/base/index">Inicio</a>
        </li>

        <li class="nav-item ">
          
          <a class="nav-link active" aria-current="page" href="<?php echo base_url();  ?>index.php/usuario/index">Usuarios</a>
        </li>

        <li class="nav-item">
         <a class="nav-link" aria-current="page" href="<?php echo base_url();  ?>index.php/base/resumen">Resumen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="<?php echo base_url();  ?>index.php/base/objetivos">Objetivos</a>
        </li>
      </ul>
      <form class="d-flex" method="POST" action="<?php echo base_url();  ?>index.php/usuario/formLogin">

       <button class= "btnM " type="submit"> Acceder</button>
      </form>
    </div>
  </div>
</nav>
