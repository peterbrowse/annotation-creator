<?php

include 'settings.php';
include 'resources.php';
include 'functions.php';

header('Content-Type: text/xml');

$xml_string = $xml_start . $title . build_label(1) . build_button(1, 0, 0, 60) . build_label(2) . build_button(2, 0, 0, 60) . build_label(3) . build_button(3, 0, 0, 60) . build_label(4) . build_button(4, 0, 0, 60) .build_label(5) . build_button(5, 0, 0, 60) . build_label(6) . build_button(6, 0, 0, 60) . build_label(7) . build_button(7, 0, 0, 60) . build_label(8) . build_button(8, 0, 0, 60) . build_label(9) . build_button(9, 0, 0, 60) . build_label(10) . build_button(10, 0, 0, 60) . build_label(11) . build_button(11, 0, 0, 60) . build_label(12) . build_button(12, 0, 0, 60) . $xml_end;

print_r($xml_string);

?>