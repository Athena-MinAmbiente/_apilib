<?php


// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);



if (isset($_GET['id_activity'])) {
  $id_activity = $_GET['id_activity'];
}
if (isset($_GET['inf_id'])) {
  $inf_id = $_GET['inf_id'];
}
   	$link = mysqli_connect("172.18.0.115","root","9H1IgEtLAG","th_services","3306");
    $link -> set_charset("utf8");
   	//$linkA = mysqli_connect("127.0.0.1","root","1qaz2wsx","dbct");
	$no = 1;
	//rs 1
	$query_RsBloqueA = "SELECT * FROM q_actividades_funcionarios WHERE q_actividades_funcionarios.id_activity = 240";
	$RsBloqueA = mysqli_query($link,$query_RsBloqueA);
	$totalRows_RsBloqueA = mysqli_num_rows($RsBloqueA);
	$row_RsBloqueA = mysqli_fetch_assoc($RsBloqueA);
	//rs 2
	$query_RsBloqueB = "SELECT * FROM q_actividades_funcionarios WHERE q_actividades_funcionarios.id_activity = 240";
	$RsBloqueB = mysqli_query($link,$query_RsBloqueB);
	$totalRows_RsBloqueB = mysqli_num_rows($RsBloqueB);
	

	$html = '
<html>
<body>
mpdf-->

<table class="items" width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
                                        <tr>
                                          <td colspan="4" class="success"><strong>ACTIVIDAD: '.$row_RsBloqueA['activity_name'].'</strong></td>
                                        </tr>
                                        <tr bgcolor="#F7F7F7">
                                          <td>TIPO ACTIVIDAD</td>
                                          <td>FECHA INICIO</td>
                                          <td colspan="2">FECHA FINAL</td>
                                        </tr>
                                        <tr>
                                          <td>'.$row_RsBloqueA['type_name'].'</td>
                                          <td>'.$row_RsBloqueA['activity_datei'].'</td>
                                          <td colspan="2">'.$row_RsBloqueA['activity_datel'].'</td>
                                        </tr>
                                </table>
<br />
								<h3>USUARIOS REGISTRADOS</h3>
								<hr>
<table width="100%" border="1" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
          <thead>
            <tr>
                <th>APELLIDOS</th>
                <th>NOMBRES</th>
                <th>DOCUMENTO</th>
                <th>EMAIL</th>
                <th>DEPENDENCIA</th>
                <th>FONDO SALUD</th>
              </tr>
          </thead>
          <tbody>
            ';
  while ($row_RsBloqueB = mysqli_fetch_assoc($RsBloqueB)) {
$html .= '
              <tr>
                <th>'.$row_RsBloqueB['usr_lname'].'</th>
                <td>'.$row_RsBloqueB['usr_name'].'</td>
                <td>'.$row_RsBloqueB['usr_personalid'].'</td>
                 <td>'.$row_RsBloqueB['usr_email'].'</td>
                  <td>'.$row_RsBloqueB['nombre'].'</td>
                   <td>'.$row_RsBloqueB['tfo_dsfdosal_b'].'</td>
              </tr>
               ';
 } 
$html .= '
          </tbody>
        </table>
</body>
</html>';
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'Letter', 'margin_top' => '36', 'margin-bottom' => '20' ]);
$mpdf->SetHTMLHeader('
<div style="height: 500px; text-align: right; font-weight: bold;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" style="color:#0000BB;"><img src="logo_960x100.png" width="960" height="100" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="color:#0000BB;"><div align="center"><span style="font-weight: bold; font-size: 14pt;"></span>ACTIVIDAD '.$row_RsBloqueA['activity_name'].' | C&Oacute;DIGO:<strong>'.$row_RsBloqueA['id_activity'].'</strong>
    
    </td>
  </tr>
</table>
</div>');
  $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td><td width="33%" style="text-align: right;">Talento Humano</td>
    </tr>
</table>');
$mpdf->SetTitle("TALENTO HUMANO");
$mpdf->SetAuthor("MinCIT");
$mpdf->SetWatermarkText("Actividad:".$row_RsBloqueA['activity_name']);
$mpdf->SetProtection(array());
$mpdf->showWatermarkText = true;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML( $html );
$mpdf->Output($row_RsBloqueA['inf_hash'].'.pdf', 'I' );
$mpdf->Output();
exit;

?>