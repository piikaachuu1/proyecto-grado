<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {		
		
        public function Header(){
            //si se requiere agregar una imagen
            //$this->Image('ruta de la imagen',x,y,ancho,alto);


            $ruta= base_url();
              
           $this->Image('img/bisa.jpeg',15,0,50,30);

            // $this->Image('img/marca.png',0,2,200,);
            $this->SetFont('Arial','B',18);
           
             $this->SetY(15);
             $this->SetX(70);
             $this->SetTextColor(0,50,50);

             $this->Cell(130,10,'Estado de cuenta',0,0,'R',0);
              // $this->Image('img/bisa.jpeg',15,0,50,30);
           
            $this->SetDrawColor(0,80,180);

             $this->SetFillColor(230,230,0);
             $this->SetTextColor(220,50,50);
             $this->Ln('15');
       }

	   public function Footer(){
           $this->SetY(1);
           $this->SetX(180);


           // $this->SetFont('Arial','I',7);
           // $this->Cell(10,10,'Fecha. '.$this->PageNo().'/{nb}',0,0,'R');

           // $this->Cell(20,10,'Usuario. '.$this->PageNo().'/{nb}',0,0,'R');

           $this->Cell(30,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
      }
}
?>