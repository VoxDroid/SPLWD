<?php
use PhpOffice\PhpWord\Writer\Word2007\Element\Table;


require "vendor/autoload.php";
$pw = new \PhpOffice\PhpWord\PhpWord();

$section = $pw->addSection();

$html="<table style='border-style: dotted;'>
<tr>
<th>Fname".$_POST['fname']."</th>
<th>joshua</th>
<th>joshuapascual</th>

</tr>
</table>";
               

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

$pw->save("h1212.docx", "Word2007");


