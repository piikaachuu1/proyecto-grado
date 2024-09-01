
  <div class="container "	>
  	
 
  	<h1>Usuarios</h1>
    
    <div class="table-responsive-lg ">
  	<table class="table">
      
  		<thead>
        <th>Numero</th>

  			<th>Usuario</th>
  			<th>Email</th>
  			<th>Rol</th>
  			

  		
  		</thead>
  		<tbody>
  			<?php 
       $i=1;
          foreach ($infoUsuario->result() as $row) {
         ?>
  		      <tr>
              <td><?php echo $i; ?></td>
      			<td><?php echo $row->nombreUsuario; ?></td>
      			<td><?php echo $row->email; ?></td>
      			<td><?php echo $row->rol; ?></td>


            <?php 
            
            $i++;} 
            ?>
  		</tr>
  		
  		</tbody>
  		
  	</table>
   </div>
  </div>
