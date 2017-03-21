<?php
//this data will be passed on to the view
$data['the_content']='mPDF and CodeIgniter are cool!';

//load the view, pass the variable and do not show it but "save" the output into $html variable
$html=$this->load->view('pdf', $data, true);

//this the the PDF filename that user will get to download
$pdfFilePath = "the_pdf_output.pdf";

//load mPDF library
$this->load->library('m_pdf');
//actually, you can pass mPDF parameter on this load() function
$pdf = $this->m_pdf->load();
//generate the PDF!
$pdf->WriteHTML($html);
//offer it to user via browser download! (The PDF won't be saved on your server HDD)
$pdf->Output($pdfFilePath, "D");

?>
