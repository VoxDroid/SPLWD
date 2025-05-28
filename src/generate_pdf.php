<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';

if(isset($_POST['submit_val']))
{
$dompdf = new Dompdf(); 
$dompdf->loadHtml('
<table border=1 align=center width=400>
<tr><td>Name : </td><td>'.$_POST['name'].'</td></tr>
<tr><td>Email : </td><td>'.$_POST['email'].'</td></tr>
<tr><td>Age : </td><td>'.$_POST['age'].'</td></tr>
<tr><td>Country : </td><td>'.$_POST['country'].'</td></tr>
</table>
');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("",array("Attachment" => false));
exit(0);
}
?>