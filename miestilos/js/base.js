(function($){
    $("#formLogin").submit(function(ev){
        ev.preventDefault();
         $('#alert').html('');
        $.ajax({
            url: "../usuario/validarPrueba",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                
                var msg = document.getElementById('msg');
                var json = JSON.parse(data);
                msg.textContent = "";
                console.log(json.url);
               
              window.location.replace(json.url);
            },
            statusCode: {
                400: function(xhr){
                    
                    $("#usuario > input").removeClass('is-invalid');
                    $("#password > input").removeClass('is-invalid');
                     var json=JSON.parse(xhr.responseText);
                     if (json.usuario.length!=0) {
                     	$("#usuario > div").html(json.usuario);
                     	$("#usuario > input").addClass('is-invalid');

                     }
                     if (json.password.length!=0) {
                     	$("#usuario > div").html(json.password);
                     	$("#usuario > input").addClass('is-invalid');

                     }
                     console.log(400);
                },
                401: function(xhr){
                	console.log(xhr.responseText);
                	 var json=JSON.parse(xhr.responseText);

                	var msg = document.getElementById('msg');
                	var inputUsuario= document.getElementById('usuario');
                	var inputPwd= document.getElementById('password');

                	inputUsuario.style.border="2px solid red";
                	inputUsuario.focus();
                	inputPwd.style.border="2px solid red";
                	
                	msg.textContent=json.msg;
                	msg.style.color="red";
                	 var alert =document.getElementById('alert');
                	   alert.style.display = "block";
                	// $('#alert').style.display = "block";
                	$('#alert').html('<div class="alert alert-danger" role="alert">'+msg.textContent+'</div>')
                    
                },
                // Puedes agregar más códigos de estado aquí según sea necesario
            }
        });
    });
})(jQuery);


