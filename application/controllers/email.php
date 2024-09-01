<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{

   
   function send(){
         $msg=$_POST['msg'];
       $this->load->library('phpmailer_lib');
      $this->phpmailer_lib->load('hola','aqui boya enviar mensage'.$msg);
        
        
       
    }
    
}