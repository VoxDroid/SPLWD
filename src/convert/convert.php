<?php
include('../connect.php');
require "vendor/autoload.php";
$pw = new \PhpOffice\PhpWord\PhpWord();

$section = $pw->addSection();
$html ="<h1>hello</h1>";
$html ="<p>hello</p>";
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

$pw->save("haha1.docx", "Word2007");

header('location:haha.docx');