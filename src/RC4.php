<?php
namespace Corley\RC4;

class RC4
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function rc4($sentence)
    {
        $s = array();
        for ($i = 0; $i < 256; $i++) {
            $s[$i] = $i;
        }

        $j = 0;
        for ($i = 0; $i < 256; $i++) {
            $j = ($j + $s[$i] + ord($this->key[$i % strlen($this->key)])) % 256;
            $x = $s[$i];
            $s[$i] = $s[$j];
            $s[$j] = $x;
        }

        $i = 0;
        $j = 0;
        $res = '';
        for ($y = 0; $y < strlen($sentence); $y++) {
            $i = ($i + 1) % 256;
            $j = ($j + $s[$i]) % 256;
            $x = $s[$i];
            $s[$i] = $s[$j];
            $s[$j] = $x;
            $res .= $sentence[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
        }
        return $res;
    }

    public function __invoke($sentence)
    {
        return $this->rc4($sentence);
    }
}
