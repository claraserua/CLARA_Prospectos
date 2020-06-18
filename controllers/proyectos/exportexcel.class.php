<?php
include "models/proyectos/exportexcel.model.php";


/** Include PHPExcel */
require_once 'libs/excel/excel/Classes/PHPExcel.php';

/** Include PHPExcel_IOFactory */
require_once 'libs/excel/excel/Classes/PHPExcel/IOFactory.php';


class exportexcel{

    
	var $Model;
	

	function __construct() {
		
	 $this->Model = new exportexcelModel(); 
	 
     $this->loadPage();
	// $this->loadContent();		
						 
	}
	
	

	 function loadPage(){
	 
	 $proyecto= $this->Model->getProyectos($_GET['IDProyecto']);
	 $titulo = $proyecto['PROYECTO'];
	 
	 $jerarquia = $proyecto['PK_JERARQUIA'];
	 
	 
	$jerarquia = $this->Model->getJerarquia($proyecto['PK_JERARQUIA']);
	 
	 $namefile = 'media/download/'.$_GET['IDProyecto'].'.xlsx';
	 $file = $_GET['IDProyecto'].'.xlsx';

    
    $objPHPExcel = new PHPExcel();
    
    $objPHPExcel->getProperties()->setCreator("Sistema de Gestión de Propuestas")
							 ->setLastModifiedBy("Sistema de Gestión de Propuestas")
							 ->setTitle($proyecto['PROYECTO'])
							 ->setSubject($proyecto['PROYECTO'])
							 ->setDescription("Propuesta del proyecto.")
							 ->setKeywords("Propuesta del proyecto")
							 ->setCategory("Propuesta del proyecto");
    		
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setTitle('Propuesta del Proyecto');



$objPHPExcel->getActiveSheet()->mergeCells('B1:H1');
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B1', utf8_encode($titulo));
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B2', utf8_encode($jerarquia));
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
//$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
//$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);



$objPHPExcel->getActiveSheet()->setCellValue('B4', 'En Resumen Ejecutivo se describe:');
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setSize(8);
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('B5', 'Un resumen de las principales características del proyecto, incluyendo la denominación, una breve descripción, su vinculación con el plan estratégico.');
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setSize(8);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->setCellValue('B6', 'presupuesto anual de la universidad, el monto total y las fuentes de inversión y el plazo de tiempo en el que se desarrollará.');
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setSize(8);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setBold(true);



$objPHPExcel->getActiveSheet()->mergeCells('B8:H8');
$objPHPExcel->getActiveSheet()->getStyle('B8:H8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B8:H8')->getFill()->getStartColor()->setARGB('FFD9D9D9');

	

$celda=9;
//$contlinea = 1;

	
$objPHPExcel->getActiveSheet()->setCellValue('B'.$celda, '1. Resumen Ejecutivo');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->getColor()->setARGB('FF7C4300');

$objPHPExcel->getActiveSheet()->mergeCells('B'.$celda.':H'.$celda);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->getStartColor()->setARGB('FFF8991D');

                               
              
			   	
				    $celda++;
					$objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(26);
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, '1.1 Nombre del Proyecto');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->getStartColor()->setARGB('FFD9D9D9');
										
						     
					$celda++;
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, utf8_encode($proyecto['PROYECTO']));
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getAlignment()->setWrapText(true);
					
					
				//FOLIO
				
				
				 $celda++;
					$objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(26);
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, '1.2 Folio');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->getStartColor()->setARGB('FFD9D9D9');
										
									     
					$celda++;
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, utf8_encode($proyecto['FOLIO']));
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getAlignment()->setWrapText(true);
								
		           	
					$celda++;
					
					
					$objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(26);
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, '1.3 Descripción');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFill()->getStartColor()->setARGB('FFD9D9D9');	                    
                       
                   $celda++;
							 $objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(23);
							// $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, $contlinea.'.'.$contobjetivo.'.'.$contmedio);
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
							 
				           
							 
				             $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H16');
				             $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, utf8_encode($proyecto['DESCRIPCION']));
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':H'.$celda)->getAlignment()->setWrapText(true);
					         
					         
		 if($proyecto['CONT_PE']==0){$cont_PE="no";}
		 else{$cont_PE="sí";}
		 if($proyecto['CONT_PO']==0){$cont_PO="no";}
		 else{$cont_PO="sí";}
		 if($proyecto['INC_PRESUPUESTO']=='S'){$inc_Pres="sí";}
		  if($proyecto['INC_PRESUPUESTO']=='P'){$inc_Pres="una parte";}
		 else{$inc_Pres="no";}	
							
					$celda++;
					$objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(26);
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, '1.4 ¿Contribuye a los Objetivos del Plan Estratégico?');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda.':D'.$celda)->getFill()->getStartColor()->setARGB('FFD9D9D9');
										
									     
					$celda++;
				    $objPHPExcel->getActiveSheet()->mergeCells('C'.$celda.':H'.$celda);
				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$celda, utf8_encode($cont_PE));
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$celda)->getAlignment()->setWrapText(true);
								
		           	
							
							
							
							
							
					/*		 
							 
							 //RESPONSABLE RESULTADO
					         $responsable = $this->Model->getResponsable($medios['PK_RESPONSABLE']);
					         $objPHPExcel->getActiveSheet()->mergeCells('F'.$celda.':G'.$celda);
				             $objPHPExcel->getActiveSheet()->setCellValue('F'.$celda, utf8_encode($responsable));
                             $objPHPExcel->getActiveSheet()->getStyle('F'.$celda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('F'.$celda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('F'.$celda)->getAlignment()->setWrapText(true);
							 
							 
							 $contmedio++;
				            }
			           $objPHPExcel->getActiveSheet()->mergeCells('H'.$rowevidencia.':H'.$celda);
					   $evidencias = $this->Model->getEvidencias($resultados['PK1']);
				       $objPHPExcel->getActiveSheet()->setCellValue('H'.$rowevidencia, utf8_encode($evidencias));
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$rowevidencia)->getFont()->setName('Tahoma');
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$rowevidencia)->getFont()->setSize(8);
					   $objPHPExcel->getActiveSheet()->getStyle('H'.$rowevidencia)->getAlignment()->setWrapText(true);
					   $objPHPExcel->getActiveSheet()->getStyle('H'.$rowevidencia)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					  
			   }
                           
						   

$contlinea++;
$celda++;	
	}

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);
$objPHPExcel->getActiveSheet()->setTitle('Diagnóstico Inicial');
$objPHPExcel->getActiveSheet()->mergeCells('B1:H1');
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B1', utf8_encode($titulo));
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B2', utf8_encode($jerarquia));
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);



$objPHPExcel->getActiveSheet()->setCellValue('B4', 'En este apartado, el Rector expone un diagnóstico inicial del estado general que guarda la universidad al inicio del año.');
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setSize(8);
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->mergeCells('B6:H6');
$objPHPExcel->getActiveSheet()->getStyle('B6:H6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B6:H6')->getFill()->getStartColor()->setARGB('FFF8991D');
$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Áreas de oportunidad');
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->getColor()->setARGB('FF7C4300');

                           $contcelda=7;
			
				           $this->Model->getAreas($idplan);
						   $contarea = 1;
			               foreach($this->Model->areas as $areas){
						   	
							$objPHPExcel->getActiveSheet()->setCellValue('B'.$contcelda, $contarea.'.');
                             $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda.':H'.$contcelda)->getAlignment()->setWrapText(true);
							
						   	 
							 $objPHPExcel->getActiveSheet()->mergeCells('C'.$contcelda.':H'.$contcelda);
				             $objPHPExcel->getActiveSheet()->setCellValue('C'.$contcelda, utf8_encode($areas['AREA']));
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda.':H'.$contcelda)->getAlignment()->setWrapText(true);
							$contarea++;	
							$contcelda++;
							}
							
							$contcelda++;
							
$objPHPExcel->getActiveSheet()->mergeCells('B'.$contcelda.':H'.$contcelda);
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda.':H'.$contcelda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda.':H'.$contcelda)->getFill()->getStartColor()->setARGB('FFF8991D');
$objPHPExcel->getActiveSheet()->setCellValue('B'.$contcelda, 'Fortalezas');
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->getColor()->setARGB('FF7C4300');

                            $contcelda++;
							
                          $this->Model->getFortalezas($idplan);
						   $contarea = 1;
			               foreach($this->Model->fortalezas as $fortalezas){
						   	
							 $objPHPExcel->getActiveSheet()->setCellValue('B'.$contcelda, $contarea.'.');
                             $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('B'.$contcelda.':H'.$contcelda)->getAlignment()->setWrapText(true);
							
						   	 
							 $objPHPExcel->getActiveSheet()->mergeCells('C'.$contcelda.':H'.$contcelda);
				             $objPHPExcel->getActiveSheet()->setCellValue('C'.$contcelda, utf8_encode($fortalezas['FORTALEZA']));
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda)->getFont()->setName('Tahoma');
                             $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda)->getFont()->setSize(8);
					         $objPHPExcel->getActiveSheet()->getStyle('C'.$contcelda.':H'.$contcelda)->getAlignment()->setWrapText(true);
							$contarea++;	
							$contcelda++;
							}





//PLAN ESTRATEGICO

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(2);
$objPHPExcel->getActiveSheet()->setTitle('Planeación Estratégica');
$objPHPExcel->getActiveSheet()->mergeCells('B1:H1');
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B1:H1')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B1', utf8_encode($titulo));
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B2:H2')->getFill()->getStartColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->setCellValue('B2', utf8_encode($jerarquia));
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);




$celda=5;
$contlinea = 1;
foreach($this->Model->lineas as $row){
	
$objPHPExcel->getActiveSheet()->setCellValue('B'.$celda, 'Línea estratégica '.$contlinea.':');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->getColor()->setARGB('FF7C4300');

$objPHPExcel->getActiveSheet()->mergeCells('B'.$celda.':H'.$celda);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->getStartColor()->setARGB('FFF8991D');


$celda++;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$celda, utf8_encode($row['LINEA']));
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->getColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->mergeCells('B'.$celda.':H'.$celda);

$celda++;
$celda++;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$celda, "Objetivos Estratégicos");
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setName('Tahoma');
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->getColor()->setARGB('FF7C4300');
$objPHPExcel->getActiveSheet()->mergeCells('B'.$celda.':H'.$celda);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B'.$celda.':H'.$celda)->getFill()->getStartColor()->setARGB('FFD9D9D9');

           $contobjetivo = 1;
           $this->Model->getObjetivosEstrategicos($row['PK1']);
		   foreach($this->Model->objetivose as $rowe){
		   	$celda++;

			//OBJETIVO ESTRATEGICO
				    $objPHPExcel->getActiveSheet()->mergeCells('B'.$celda.':H'.$celda);
					$objPHPExcel->getActiveSheet()->getRowDimension($celda)->setRowHeight(23);
				    $objPHPExcel->getActiveSheet()->setCellValue('B'.$celda,$contobjetivo.". ".utf8_encode($rowe['OBJETIVO']));
                    $objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setName('Tahoma');
                    $objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getFont()->setSize(8);
					$objPHPExcel->getActiveSheet()->getStyle('B'.$celda)->getAlignment()->setWrapText(true);
			        $contobjetivo++;
			
			}

$contlinea++;
$celda++;
}*/

$objPHPExcel->setActiveSheetIndex(0);


/*$objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);*/

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$file.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;





	 }
	 

	
  
	 function loadContent(){
	   	
	  
	   $this->View->template = TEMPLATE.'excel.tpl';
	   $this->View->loadTemplate();	
	  
	  
	   $section = "<table width=\"1200\">";
	   $section .= $this->getPlan();
	   $section .= $this->getLineas();
	   $section .= "</table>";
	   
	   
	   $this->View->replace_content('/\#CONTENT\#/ms' ,$section);
	
	   $this->View->viewPage();
		
		}
	 
	  
	
	   function getLineas(){
		      
		return $this->Model->getLineas();
		   	   
	   }
	
	  
	   
	  
	 
	
}

?>