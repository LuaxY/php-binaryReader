<?php

require("binaryReader.php");

$file = 'effects.bin';
$fp = fopen($file, 'rb');
$data = fread($fp, filesize($file));

$effects = new binaryReader($data);

for($i = 0; $i < 3; $i++)
{
    $effectType = $effects->readByte();

    if ($effectType == 6)
    {
        if ($effects->peekByte() == 67)
        {
            $effects->readByte();
            echo "id: ".$effects->readShort()."\n";
        }
        else
        {
            echo "targets: ".$effects->readInt()."\n";
            echo "id: ".$effects->readShort()."\n";
            echo "duration: ".$effects->readInt()."\n";
            echo "delay: ".$effects->readInt()."\n";
            echo "random: ".$effects->readInt()."\n";
            echo "group: ".$effects->readInt()."\n";
            echo "modificator: ".$effects->readInt()."\n";
            echo "trigger: ".$effects->readBool()."\n";
            echo "hidden: ".$effects->readBool()."\n";
            echo "raw zone: "./*$effects->readUTF().*/"\n";
        }

        echo "value: ".$effects->readShort()."\n\n";
    }
}