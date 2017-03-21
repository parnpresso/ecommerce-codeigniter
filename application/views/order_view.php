<?php

require_once '../../public/mpdf/vendor/autoload.php';

$mpdf = new mPDF();
$mpdf->WriteHTML('Hello World');
$mpdf->Output();

?>
