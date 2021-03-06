<?php
include "models/proyectos/printproyecto.model.php";
require('libs/fpdf/fpdf.php');

require_once('libs/pdf/config/lang/eng.php');
require_once('libs/pdf/tcpdf.php');



class printproyecto {

    var $View;
	var $Model;
		

	function printproyecto() {
		
	 $this->Model = new printproyectoModel(); 
         $this->loadPage();		
						 
	}
	
	
	 function __construct(){
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->titulo = $this->getPlan();

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Red de Universidades Anahuac');
$pdf->SetTitle('Gestión de Proyectos');
$pdf->SetSubject($this->getProyectos());
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'N', 10);

// add a page
$pdf->AddPage();

$pdf->SetY(5);
$html = "
<!-- EXAMPLE OF CSS STYLE -->
<style>
     
	td{
	border:1px solid #666;
	}
	
	td.title{
	background:#E5E5E5;
	padding:10px;
	}
   
</style> <br />";
 
$html .= $this->Model->getLineas();

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('proyecto.pdf', 'I');
		
	 }
	 
	 
	  
	function getProyectos(){
	
	$row = $this->Model->getProyectos($_GET['idProyecto']);
	
	return $row['PROYECTO'];
			
	}
	  
	  
}


class MYPDF extends TCPDF {
     
    var $titulo;
	
    //Page header
    public function Header() {
        // Logo
        $image_file = 'skins/default/img/red.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
       // $this->SetY(25);
        //$this->Cell(0, 25, __toHtml($this->titulo, ENT_QUOTES, "ISO-8859-1"), 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


?>