
<div class="content "  >
    <div class="d-flex justify-content-center align-items-center fondoCompleta " style="background-image: url('<?php echo base_url();?>/img/fondologuin.png'); background-repeat: ; opacity:1" >  
        <div class="d-flex justify-content-center align-items-center  " style="width:1000px;height: 100vh; background-image: url('<?php echo base_url();?>/img/fondologuin2.png'); background-repeat: no-repeat;" >
            <div class="container1 "  style = "background:rgba(255,255,255,0.5)">
                <div class="login-logo d-flex justify-content-center mt-10px rounded">  <img  src="<?php echo base_url();  ?>img/logo.png" width="120px" alt="aqui imagen">
                </div>       
                <div class="login-section">
                    <div class="form-box login">

                        <form action="<?php echo base_url();?>index.php/usuario/f" id="formLogin" method="POST">
                           <?php 

                           $msg=0;
                           switch ($msg) {
                             case 1:
                             $mensaje="Error Ingreso";
                             break;
                             case 2:
                             $mensaje="Acceso No valido";
                             break;
                             case 3:
                             $mensaje="Gracias";
                             break;

                             default:
                             $mensaje="Ingrese los datos";
                             break;
                         }
                         ?>

                         <label id="msg">  </label>
                       




                         <h2><b>Iniciar sesión</b></h2>

                         <div class="input-box" id="idDivUsuario">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <input type="text" id="usuario" name="usuario" onkeypress="return LetrasNumero(event)" minlength="1" maxlength="15"   autofocus autocomplete="off" required>
                            <label >Usuario</label>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="input-box" id="idDivPassword">
                              <span class="icon"><i class="fas fa-key"></i></span>
                            <input type="password" name="password" id="password" minlength="1" maxlength="25"  autocomplete="new-password" required>
                            <label>Password</label>
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="forget-passs">

                            <!-- <p><a  class="forgetPassword" href="#">¿Has olvidado la clave?</a></p> -->
                            <p style="color:black">Por seguridad, nunca revele su contraseña.</p>

                        </div>
                        <button type="submit" class="btn btn-primario">Iniciar sesión</button>
                        <div class="create-account">
                            <!-- crear nueva cueentas -->
                            <p> <a href="#" class="register-link"></a></p>
                        </div>
                        <div  id="alert"></div>

                    </form>
                </div>
                <div class="form-box forget d-flex justify-content-center mt-5">
                    <form action="">
                       <h2><b>Olvidaste tu contraseña</b></h2>

                       <div class="input-box">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" required autocomplete="off">
                        <label >email</label>
                    </div>

                    <button class="btn">Restablecer</button>



                    <div class="create-account">

                       <p><a href="#" class="login-regresar">Regresar</a></p>
                   </div>
               </form>
           </div>
           <div class="form-box register">
               <?php echo form_open_multipart('usuario/registrarUsuario'); ?>

               <h2><b>Registrarse</b></h2>


               <div class="input-box">
                <span class="icon"><i class="fas fa-user"></i></span>
                <input type="text"  name="nombreUsuario" minlength="5" onkeypress="return LetrasNumero(event)" maxlength="15" required autofocus>
                <label >Usuario</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <input type="email" id="email" name="email"  required>
                <label >Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="fas fa-key"></i></span>

                <input type="password" name="password" minlength="8" required>
                <label>Password</label>
            </div>

            <div class="input-box">
                <span class="icon"><i class="fas fa-key"></i></span>
                <input type="password" name="passwordRepeat" minlength="8" required>
                <label>Repetir Password</label>
            </div>
            <div class="remember-password">
                <label for=""><input type="checkbox">estoy de acuerdo con esta afirmacion</label>
            </div>
            <button class="btn">Crear</button>
            <div class="create-account">
                <p>Ya tienes una cuenta? <a href="#" class="login-link">Iniciar Session</a></p>
            </div>
            <?php   echo form_close(); ?>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
 document.addEventListener("DOMContentLoaded",function(){


    var inputs= document.getElementById("usuario");
    var inputPwd= document.getElementById("password");

    var msg = document.getElementById("msg");
    var divUser=document.getElementById('idDivUsuario');
    var alert =document.getElementById('alert');
    inputs.addEventListener("input",function(){
      msg.textContent='';
      alert.style.display = "none";
        var car = inputs.value.length;
        // msg.textContent=car;
        if(car<5)
        {
            inputs.style.borderBottom="2px solid red";
            // msg.textContent="Nombre de Usuario mayor a 5 caracres";
           
        }
        else
        {
            inputs.style.borderBottom="2px solid green";
            // msg.textContent="Correcto";
            msg.style.color="green";

        }


    });
      inputPwd.addEventListener("input",function(){
      msg.textContent='';
       var car = inputPwd.value.length;
      alert.style.display = "none";
      if(car<8)
        {
            inputPwd.style.borderBottom="2px solid red";
            // msg.textContent="Nombre de Usuario mayor a 5 caracres";
           
        }
        else
        {
            inputPwd.style.borderBottom="2px solid green";
          

        }
       

    });
});
</script>
</div>
</div>