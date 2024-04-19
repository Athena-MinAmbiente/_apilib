<?php

if (isset($_GET['cont_id'])) {
  $cont_id = $_GET['cont_id'];
}
if (isset($_GET['inf_id'])) {
  $inf_id = $_GET['inf_id'];
}

$link = mysqli_connect("172.18.0.228", "agutierrezd", "agutierrezd2030*", "dbct", 3311);
mysqli_set_charset($link, 'utf8');

$query_RsBloqueB = "SELECT * FROM informe_intersup_plan_pagos WHERE id_cont_fk = $cont_id AND inf_st = 2";
$RsBloqueB = mysqli_query($link,$query_RsBloqueB);
//$row_RsBloqueB = mysqli_fetch_assoc($RsBloqueB);
$totalRows_RsBloqueB = mysqli_num_rows($RsBloqueB);


$query_RsBloqueC = "SELECT * FROM q_genera_informe_oe WHERE inf_id_fk = $inf_id";
$RsBloqueC = mysqli_query($link,$query_RsBloqueC);
//$row_RsBloqueC = mysqli_fetch_assoc($RsBloqueC);
$totalRows_RsBloqueC = mysqli_num_rows($RsBloqueC);


$query_RsBloqueA = "SELECT * FROM q_genera_informe WHERE inf_id = $inf_id";
$RsBloqueA = mysqli_query($link,$query_RsBloqueA);
$row_RsBloqueA = mysqli_fetch_assoc($RsBloqueA);
$totalRows_RsBloqueA = mysqli_num_rows($RsBloqueA);
// INICIO HTML

$html = 
'
<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 10pt;
}
p { margin: 0pt; }
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
    <td colspan="2" style="color:#0000BB; "><div align="center"><img src="logo_650X902.png"/></div></td>
    </tr>
  <tr>
<td width="100%" style="color:#0000BB;" align="center"><span style="font-weight: bold; font-size: 14pt;"></span>INFORME DE SUPERVISI&Oacute;N | INTERVENTOR&Iacute;A C&Oacute;DIGO:<strong>'.$row_RsBloqueA['inf_hash'].'</strong><br />GRUPO DE CONTRATOS
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

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; ">  El presente informe se presenta en cumplimiento de lo dispuesto en la Resoluci&oacute;n No. 3861 de 2015 Por la cual se adopta la versi&oacute;n 4 del manual de Contrataci&oacute;n del Ministerio de Comercio Industria y Turismo y se dictan otras disposiciones.    <br /></td>
</tr></table>
<table class="items" width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
                                        <tr class="success">
                                          <td colspan="4">INFORME N&Uacute;MERO :'.$row_RsBloqueA['inf_consecutivo'].'&nbsp;&nbsp;FECHA EN QUE SE RINDE : '.$row_RsBloqueA['inf_fechapresenta'].'</td>
  </tr>
                                        <tr bgcolor="#F7F7F7">
                                            <td>PERIODICIDAD</td>
                                          <td>AVANCE</td>
                                          <td colspan="2">PERIODO REPORTADO</td>
  </tr>
                                        <tr>
                                            <td>'.$row_RsBloqueA['periodo_name'].'</td>
                                            <td>'.$row_RsBloqueA['inf_avgejecucion'].'%</td>
                                            <td>'.$row_RsBloqueA['inf_fecharep_i'].'</td>
                                          <td>'.$row_RsBloqueA['inf_fecharep_f'].'</td>
                    </tr>
                                        <tr class="success">
                                            <td colspan="4">1. ASPECTOS GENERALES, ADMINISTRATIVOS Y LEGALES</td>
                                        </tr>
                                        <tr bgcolor="#F7F7F7">
                                          <td bgcolor="#F7F7F7">No. CONTRATO O CONVENIO</td>
                                          <td>VALOR DEL CONTRATO</td>
                                          <td>NOMBRE DEL CONTRATISTA</td>
                                          <td>DOCUMENTO</td>
                                        </tr>
                                        <tr>
                                          <td>'.$row_RsBloqueA['inf_numerocontrato'].'</td>
                                          <td>'.$row_RsBloqueA['inf_valorcontrato'].'</td>
                                          <td>'.$row_RsBloqueA['inf_nombrecontratista'].'</td>
                                          <td>'.$row_RsBloqueA['inf_doccontratista'].'</td>
                                        </tr>
                                        <tr>
                                          <td bgcolor="#F7F7F7">FECHA DE SUSCRIPCI&Oacute;N | FIRMA</td>
                                          <td bgcolor="#F7F7F7">FECHA DE INICIO</td>
                                          <td bgcolor="#F7F7F7">FECHA DE TERMINACI&Oacute;N</td>
                                          <td bgcolor="#F7F7F7">PLAZO | VIGENCIA</td>
                                        </tr>
                                        <tr>
                                          <td>'.$row_RsBloqueA['inf_fechasuscripcion'].'</td>
                                          <td>'.$row_RsBloqueA['inf_fechacont_i'].'</td>
                                          <td>'.$row_RsBloqueA['inf_fechacont_f'].'</td>
                                          <td>'.$row_RsBloqueA['inf_plazo'].'|'.$row_RsBloqueA['inf_vigencia'].'</td>
                                        </tr>
                                        <tr>
                                          <td bgcolor="#F7F7F7">COMPROMISO | RP</td>
                                          <td bgcolor="#F7F7F7">CDP</td>
                                          <td colspan="2" bgcolor="#F7F7F7">RUBRO</td>
                                        </tr>
                                        <tr>
                                          <td>'.$row_RsBloqueA['inf_rp'].'</td>
                                          <td>'.$row_RsBloqueA['inf_cdp'].'</td>
                                          <td colspan="2">'.$row_RsBloqueA['inf_rubrocode'].'</td>
                                        </tr>
                                        <tr>
                      <td bgcolor="#F7F7F7">OBJETO</td>
                                          <td colspan="3">'.$row_RsBloqueA['inf_objeto'].'</td>
                                        </tr>
                                        <tr>
                                          <td colspan="4" class="success">SUPERVISI&Oacute;N DEL CONTRATO</td>
                                        </tr>
                                        <tr bgcolor="#F7F7F7">
                                          <td>SUPERVISOR</td>
                                          <td>CARGO</td>
                                          <td colspan="2">DEPENDENCIA</td>
                                        </tr>
                                        <tr>
                                          <td>'.$row_RsBloqueA['inf_nombre'].'</td>
                                          <td>'.$row_RsBloqueA['inf_cargo'].'</td>
                                          <td colspan="2">'.$row_RsBloqueA['inf_dependencia'].'</td>
                                        </tr>
                                </table>
                <br />
                <h2>INFORMACI&Oacute;N SOBRE EJECUCI&Oacute;N DE PAGOS</h2>
                <hr>
<table class="items" width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
      <thead>
        <tr>
              <th>ORDINAL</th>
              <th>FECHA INICIO</th>
              <th>FECHA FINAL </th>
              <th>VALOR A PAGAR</th>
            </tr>
      </thead>
      <tbody>
        ';
  do {
$html .= ' 
          <tr>
            <th>'.$row_RsBloqueB['inf_consecutivo'].'</th>
            <td>'.$row_RsBloqueB['inf_fecharep_i'].'</td>
            <td>'.$row_RsBloqueB['inf_fecharep_f'].'</td>
            <td>'.$row_RsBloqueB['inf_valor_pago'].'</td>
          </tr>
          ';
 } while ($row_RsBloqueB = mysqli_fetch_assoc($RsBloqueB));
$html .= '
      </tbody>
    </table>
<div style="text-align: center; font-style: italic;">N&uacute;mero de pagos : '.$totalRows_RsBloqueB.'</div>
<br />
                <h2>DESARROLLO DE ACTIVIDADES EN EL PERIODO REPORTADO</h2>
                <hr>
<table class="items" width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
  <tr class="success">
    <td colspan="4">ACTIVIDADES DESARROLLADAS</td>
  </tr>
  <tr>
    <td colspan="4">'.$row_RsBloqueA['inf_actividades'].'</td>
  </tr>
    <tr>
    <td bgcolor="#F7F7F7">DECLARA INCONFORMIDAD EN EL CUMPLIMIENTO DEL CONTRATO PARA ESTE PERIODO REPORTADO?</td>
    <td bgcolor="#F7F7F7">RAZON DE LA INCONFORMIDAD</td>
    <td bgcolor="#F7F7F7">DECLARA INCUMPLIMIENTO EN EL DESARROLLO DEL CONTRATO PARA ESTE PERIODO REPORTADO?</td>
    <td bgcolor="#F7F7F7">RAZON DEL INCUMPLIMIENTO</td>
  </tr>
  <tr>
    <td>'.$row_RsBloqueA['inf_declarainconf'].'</td>
    <td>'.$row_RsBloqueA['inf_declarainconf_obs'].'</td>
    <td>'.$row_RsBloqueA['inf_incumplimiento'].'</td>
    <td>'.$row_RsBloqueA['inf_incumplimiento_obs'].'</td>
  </tr>
  <tr>
    <td bgcolor="#F7F7F7">NOTA</td>
    <td colspan="3" bgcolor="#F7F7F7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"> En el evento que se detallen modificaciones al contrato / convenio, es necesario que se indique la fecha en la cual las mismas se realizaron, fecha de aprobaci&oacute;n de la garant&iacute;a y en general el cumplimiento de otros requisitos se&ntilde;alados en el documento mediante el cual se realiz&oacute; la modificaci&oacute;n. Cabe precisar que no todas las modificaciones implican aprobaci&oacute;n de garant&iacute;as. Es deber del supervisor verificar cada caso particular.</td>
  </tr>
</table>
<br />
                <h2>DESARROLLO DE LAS OBLIGACIONES ESPEC&Iacute;FICAS</h2>
                <hr>
<table class="items" width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
          <thead>
            <tr>
                <th>ORDINAL</th>
                <th>OBLIGACI&Oacute;N</th>
                <th>ACTIVIDAD REALIZADA</th>
        <th>ESTADO</th>
              </tr>
          </thead>
          <tbody>
            ';
  do {
$html .= '
              <tr>
                <th>'.$row_RsBloqueC['oe_ordinal'].'</th>
                <td>'.$row_RsBloqueC['oe'].'</td>
                <td>'.$row_RsBloqueC['actividad'].'</td>
        <td>'.$row_RsBloqueC['sn_oe'].'</td>
              </tr>
               ';
 } while ($row_RsBloqueC = mysqli_fetch_assoc($RsBloqueC));
$html .= '
          </tbody>
        </table>
<div style="text-align: center; font-style: italic;">N&uacute;mero de obligaciones procesadas: '.$totalRows_RsBloqueC.'</div>
<br />
<br />
<p><strong>Supervisor</strong></p>
<br />
<br />
<p>&nbsp;</p>
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

// FIN HTML
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Letter', 'margin_top' => '40', 'margin-bottom' => '10' ]);
$mpdf->SetHTMLHeader('
<div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" style="color:#0000BB;"><div align="center"><img src="logocpe.png" width="960" height="150" /></div>
    </strong></td>
  </tr>
</table>
</div>');
  $mpdf->SetHTMLFooter('<table width="100%" style="vertical-align: bottom; font-family: serif; 
    font-size: 6pt; color: #000000; font-weight: bold; font-style: italic;">
    <tr>
      <td>&nbsp;</td>
      <td align="center"><hr /></td>
      <td style="text-align: right;">&nbsp;</td>
    </tr>
    <tr>
      <td><p align="center">&nbsp;</p></td>
      <td colspan="2">EN CASO DE REPRODUCCIÓN, SE CONSIDERA COMO COPIA NO CONTROLADA</td>
    </tr>
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">By DragonFly</td>
    </tr>
</table>');
$mpdf->SetTitle("INFORME DE SUPERVISIÓN");
$mpdf->SetAuthor("MinCIT");
$mpdf->SetWatermarkText("FIRMADO CPE: H25947863");
$mpdf->SetProtection(array());
$mpdf->showWatermarkText = true;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML( $html );

// Obtener el nombre del directorio
$directoryName = "../GesDoc/Contratos/" . $cont_id .'/'.'INFORMES/' ;

// Verificar si el directorio ya existe
if (!is_dir($directoryName)) {
    // Intentar crear el directorio si no existe
    if (!mkdir($directoryName, 0777, true)) {
        // Manejar errores si la creación del directorio falla
        die('Error: No se pudo crear el directorio.');
    }
}

// fin


$rutaGuardarPDF = '../GesDoc/Contratos/'.$cont_id.'/INFORMES/'.'INF_'. $row_RsBloqueA['inf_consecutivo'].'_'.$row_RsBloqueA['inf_numerocontrato'].'_'.$row_RsBloqueA['inf_hash'].'.pdf'; 
//$mpdf->Thumbnail('firma_2.pdf', 4, 5);
$mpdf->Output($rutaGuardarPDF,'F');
$mpdf->Output($rutaGuardarPDF,'I');
//$mpdf->Output($row_RsBloqueA['inf_hash'].'.pdf', 'I' );
//$mpdf->Output();
exit;

?>