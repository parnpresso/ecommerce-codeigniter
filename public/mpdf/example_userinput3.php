<?php

require __DIR__ . '/vendor/autoload.php';

$mpdf = new mPDF();

$html ='<html>
<body>
	<div>'.$_POST['text'].'</div>
	<img src="' . "../tmp/" . $_POST['filename'] . '" />
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
