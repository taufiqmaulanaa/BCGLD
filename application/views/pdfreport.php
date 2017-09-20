<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

tcpdf();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Taufik Maulana');
$pdf->SetTitle('Send PDF');
$pdf->SetSubject('TCPDF Tutorial');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
// create some HTML content
$htmlcontent = "<html>
				  <body>
					<table width='500' border='1' align='center' cellpadding='5' cellspacing='0'>
					  <tr>
						<td width='165'>Extreme Customs Pty. Ltd.</td>
						<td width='165'>TAX INVOICE</td>";
		
$htmlcontent .= "<td width='165'>" . date('M-d-Y') . "</td></tr>";

$htmlcontent .=  "<tr>
        		    <td width='165'>Order No:</td>
		  	    	<td width='335' colspan='2'>58972</td>
      			  </tr>";

$htmlcontent .=  "<tr>
	    		    <td width='500' colspan='3'>&nbsp;</td>
	  			  </tr>";
for($i = 0; $i<count($data_kain);$i++){
    $htmlcontent .=  "<tr>
                        <td width='165'>Nama Perusahaan:</td>
			<td width='335' colspan='2'>".$data_kain[$i]->Nama_Perusahaan. "</td>"
            . "</tr>";
    
    $htmlcontent .=  "<tr>
                        <td width='165'>Tanggal Pembelian:</td>
			<td width='335' colspan='2'>".$data_kain[$i]->Tanggal_Pembelian. "</td>"
            . "</tr>";
    $htmlcontent .=  "<tr>
                        <td width='165'>ID Pesanan:</td>
			<td width='335' colspan='2'>".$data_kain[$i]->Id_Pesanan. "</td>"
            . "</tr>";
}



$htmlcontent .= "</table></body></html>";

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/data.pdf', 'F');