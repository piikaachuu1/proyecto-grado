<?php 

 function generarContraseña($texto)
{
    $letra=strtoupper(substr($texto, 0,1));
    $nombreTexto=substr($texto, 1,strlen($texto)-1);
    $numero = random_int(10, 99);

    $arreglo = array("@", "*", "+", "$", "&");

// Acceso aleatorio a un elemento del arreglo
        $indiceAleatorio = rand(0, count($arreglo) - 1);
        $caracter = $arreglo[$indiceAleatorio];

       $pwd=$letra.$nombreTexto.random_int(10, 99).$arreglo[rand(0, count($arreglo) - 1)];
       if(strlen($pwd)<8){
                $pwd=$pwd.$arreglo[rand(0, count($arreglo) - 1)].random_int(10, 99);
                return $pwd; 
       }
       return $pwd; 
}


function generarPwd($text) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#$%&*?';
    $longitud = 8;
    $pwd = '';
    
    // Agrega al menos un carácter de cada tipo
    $pwd .= $caracteres[rand(0, 25)]; // Letra mayúscula
    $pwd .= $caracteres[rand(26, 51)]; // Letra minúscula
    $pwd .= $caracteres[rand(52, 61)]; // Número
    $pwd .= $caracteres[rand(62, strlen($caracteres) - 1)]; // Carácter especial
    
    // Completa la contraseña con caracteres aleatorios
    for ($i = 4; $i < $longitud; $i++) {
        $pwd .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    
    // Mezcla los caracteres de la contraseña de manera aleatoria
    $pwd = str_shuffle($pwd);
    
    return $pwd;
}





function generarUsuario($texto){
        return trim(strtolower($texto));
}
function letraCapital($texto){
        return ucfirst(strtolower($texto));
}

?>

