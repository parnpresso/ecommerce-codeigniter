<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';


if (!empty($_POST)) {
  echo '$_POST';
}

$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;

?>
