<?php

class binaryReader
{
    private $data;
    private $bak;
    private $index;

    public function __construct($_data)
    {
        $this->data = $_data;
        $this->bak = $_data;
        $this->index = 0;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function setIndex($_index)
    {
        if ($_index > $this->index)
        {
            $this->data = substr($this->data, $_index - $this->index);
        }
        elseif ($_index < $this->index)
        {
            $this->data = $this->bak;
            substr($this->data, $_index);
        }

        $this->index = $_index;
    }

    public function peekBool()
    {
        return (unpack('C', $this->data)[1] ? true : false);
    }

    public function readBool()
    {
        $byte = $this->peekBool();
        $this->data = substr($this->data, 1);
        $this->index += 1;
        return $byte;
    }

    public function peekByte()
    {
        return unpack('C', $this->data)[1];
    }

    public function readByte()
    {
        $byte = $this->peekByte();
        $this->data = substr($this->data, 1);
        $this->index += 1;
        return $byte;
    }

    public function peekShort()
    {
        return unpack('v', $this->data)[1];
    }

    public function readShort()
    {
        $short = $this->peekShort();
        $this->data = substr($this->data, 2);
        $this->index += 2;
        return $short;
    }

    public function peekInt()
    {
        return unpack('N', $this->data)[1];
    }

    public function readInt()
    {
        $int = $this->peekInt();
        $this->data = substr($this->data, 4);
        $this->index += 4;
        return $int;
    }

    public function peekFloat()
    {
        return unpack('f', $this->data)[1];
    }

    public function readFloat()
    {
        $float = $this->peekFloat();
        $this->data = substr($this->data, 8);
        $this->index += 8;
        return $float;
    }

    public function peekDouble()
    {
        return unpack('d', $this->data)[1];
    }

    public function readDouble()
    {
        $double = $this->peekDouble();
        $this->data = substr($this->data, 16);
        $this->index += 16;
        return $double;
    }
}
