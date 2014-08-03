<?php

class binaryReader
{
    private $data;

    public function __construct($_data)
    {
        $this->data = $_data;
    }

    public function readByte()
    {
        $byte = unpack('C', $this->data);
        $this->data = substr($this->data, 1);
        return $byte;
    }

    public function readShort()
    {
        $short = unpack('n', $this->data);
        $this->data = substr($this->data, 2);
        return $short;
    }

    public function readInt()
    {
        $int = unpack('N', $data);
        $this->data = substr($this->data, 4);
        return $int;
    }

    public function readFloat()
    {
        $float = unpack('f', $data);
        $this->data = substr($this->data, 8);
        return $float;
    }

    public function readDouble()
    {
        $double = unpack('d', $data);
        $this->data = substr($this->data, 16);
        return $double;
    }
}
