<?php

require("binaryReader.php");

$file = 'effects.bin';
$fp = fopen($file, 'rb');
$data = fread($fp, filesize($file));

$effects = new binaryReader($data);

var_dump($effects->readByte());
var_dump($effects->readShort());
var_dump($effects->readShort());