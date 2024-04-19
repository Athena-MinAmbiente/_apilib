<?php

if (isset($_GET['cont_id'])) {
  $cont_id = $_GET['cont_id'];
}
if (isset($_GET['inf_id'])) {
  $inf_id = $_GET['inf_id'];
}

$link = mysqli_connect("172.18.0.228", "agutierrezd", "agutierrezd2030*", "dbct", 3311);
mysqli_set_charset($link, 'utf8');


/*

$query_RsBloqueB = "SELECT * FROM informe_intersup_plan_pagos WHERE id_cont_fk = $cont_id AND inf_st = 2";
$RsBloqueB = mysqli_query($link,$query_RsBloqueB);
//$row_RsBloqueB = mysqli_fetch_assoc($RsBloqueB);
$totalRows_RsBloqueB = mysqli_num_rows($RsBloqueB);

*/

$query_RsBloqueA = "SELECT * FROM q_genera_informe WHERE inf_id = $inf_id AND inf_estado = 4";
$RsBloqueA = mysqli_query($link,$query_RsBloqueA);
$row_RsBloqueA = mysqli_fetch_assoc($RsBloqueA);
$totalRows_RsBloqueA = mysqli_num_rows($RsBloqueA);

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%">
<tr>
    <td colspan="2" style="color:#0000BB; "><div align="center"><img src="logo_650X902.png" /></div></td>
    </tr>
  <tr>
<td width="100%" style="color:#0000BB;" align="center"><span style="font-weight: bold; font-size: 14pt;"></span>CERTIFICADO DE RECIBIDO A SATISFACCI&Oacute;N C&Oacute;DIGO:<strong>'.$row_RsBloqueA['inf_hash'].'</strong><br />GRUPO DE CONTRATOS
</strong></td>
</tr>
</table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
  <p>Pagina {PAGENO} de {nb}
  </p>
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<h3><br /><br /><p>EL (LA) SUSCRITO(A) SUPERVISOR(A) DEL CONTRATO ESTATAL DE '.$row_RsBloqueA['cert_modalidad'].' No. '.$row_RsBloqueA['inf_numerocontrato'].'</p></h3><br /><p>Por medio de la presente certifico que recib&iacute; el servicio, en desarrollo del <strong> CONTRATO DE '.$row_RsBloqueA['cert_modalidad'].' No. '.$row_RsBloqueA['inf_numerocontrato'].'</strong>, suscrito entre La Naci&oacute;n-Ministerio de Comercio, Industria y Turismo y <strong>'.$row_RsBloqueA['inf_nombrecontratista'].'</strong> identificado(a) con C&eacute;dula de Ciudadan&iacute;a No.<strong> '.$row_RsBloqueA['inf_doccontratista'].'</strong>, cuyo objeto es: - <em>'.$row_RsBloqueA['inf_objeto'].'</em><br /><br />
  El contratista cumpli&oacute; a satisfacci&oacute;n de conformidad con las Obligaciones establecidas durante el mes de '.$row_RsBloqueA['cert_mes'].' de '.$row_RsBloqueA['inf_anio'].', de acuerdo al consecutivo No. '.$row_RsBloqueA['inf_consecutivo'].',que comprende el periodo reportado entre el '.$row_RsBloqueA['inf_fecharep_i'].' y el '.$row_RsBloqueA['inf_fecharep_f'].'.
  <br />
  <br /><br />
Unidad Ejecutora:&nbsp;'.$row_RsBloqueA['inf_rubroname'].'
  Rubro presupuestal:&nbsp;'.$row_RsBloqueA['inf_rubrocode'].'<br />Uso presupuestal:&nbsp;<strong>'.$row_RsBloqueA['inf_usopresupuestal'].'</strong>
  <br />
  Registro presupuestal No.<strong>&nbsp;'.$row_RsBloqueA['inf_rp'].'</strong>- CDP No.<strong>&nbsp;'.$row_RsBloqueA['inf_cdp'].'</strong>
  <br />
  Fecha inicio de contrato:&nbsp;<strong>'.$row_RsBloqueA['inf_fechacont_i'].'</strong>&nbsp;Fecha Final de contrato:&nbsp;<strong>'.$row_RsBloqueA['inf_fechacont_f'].'</strong>
  <br /> 
  Valor a pagar:<strong>$&nbsp;'.number_format($row_RsBloqueA['inf_valor_pago'],2,".",",").'</strong>
  <br /> 
  Tipo de pago:&nbsp;'.$row_RsBloqueA['tipopago_nombre'].'&nbsp;Mes de pago:&nbsp;'.$row_RsBloqueA['mes_concepto'].'
  <br /> 
   <br />  <br />
  '.$row_RsBloqueA['cert_msj'].'<br />
  <br />
  Certificado en Bogot&aacute; D.C., en el mes de: '.$row_RsBloqueA['cert_mes'].' de '.$row_RsBloqueA['inf_anio'].'<br />
</p>
<br />
<br />
<p><strong>Cordialmente,</strong></p>
<br />
<p>Nombre:'.$row_RsBloqueA['inf_nombre'].'<br />
Documento:'.$row_RsBloqueA['inf_intersup'].'<br />
Cargo:'.$row_RsBloqueA['inf_cargo'].'</p>
Dependencia:'.$row_RsBloqueA['inf_dependencia'].'</p>
<br />
Notas:<br><br/>Para efectos de admisibilidad y fuerza probatoria seg&uacute;n lo dispuesto en la ley 527 de 1999, el interesado puede probar la validez del mismo a trav&eacute;s del siguiente sitio WEB: http://gestion.mincit.gov.co/Athena/GestionContrato. La coincidencia entre la informaci&oacute;n desplegada en pantalla y la contenida en informe impreso, confirma la autenticidad del informe emitido.<br />
El documento se ha validado a trav&eacute;s del ingreso de esta clave din&aacute;mica por el supervisor del contrato.
<br/>
</div>
<br />
<p>Fecha | Hora de firma:'.$row_RsBloqueA['sign_verificacert_date'].'<br />
Firmado por:'.$row_RsBloqueA['sign_verificacert_user'].'<br />
Firmado desde la IP:'.$row_RsBloqueA['sign_verificacert_ip'].'</p>
</body>
</html>
';

//==============================================================

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Letter', 'margin_top' => '40', 'margin-bottom' => '10' ]);
//$mpdf=new mPDF('c','A4','','',20(izquierda),15(derecha),50(desde arriba),20(desde abajo),50(header),10);
//$mpdf->SetProtection(array('print','modify'));
$mpdf->SetTitle("CERTIFICADO DE RECIBIDO A SATISFACCIÓN");
$mpdf->SetAuthor("MinCIT");
$mpdf->SetWatermarkText("CRS FIRMADO:".$row_RsBloqueA['inf_hash']);
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
//$mpdf->SetImportUse();	

// Obtener el nombre del directorio
$directoryName = "../GesDoc/Contratos/" . $cont_id .'/'.'CRS/' ;

// Verificar si el directorio ya existe
if (!is_dir($directoryName)) {
    // Intentar crear el directorio si no existe
    if (!mkdir($directoryName, 0777, true)) {
        // Manejar errores si la creación del directorio falla
        die('Error: No se pudo crear el directorio.');
    }
}

// fin

$mpdf->WriteHTML($html);
// Ruta donde se almacenará el PDF
$rutaGuardarPDF = '../GesDoc/Contratos/'.$cont_id.'/CRS/'.'CRS_'. $row_RsBloqueA['inf_consecutivo'].'_'.$row_RsBloqueA['inf_numerocontrato'].'_'.$row_RsBloqueA['inf_hash'].'.pdf'; 
//$mpdf->Thumbnail('firma_2.pdf', 4, 5);
$mpdf->Output($rutaGuardarPDF,'F');
$mpdf->Output($rutaGuardarPDF,'I');
exit;
?>