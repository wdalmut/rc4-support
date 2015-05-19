<?php
namespace Corley\RC4;

class RC4Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider sentences
     */
    public function testEncodingWithInvoke($key, $sentence, $crypt)
    {
        $obj = new RC4($key);
        $this->assertEquals($crypt, $obj($sentence));
    }

    /**
     * @dataProvider sentences
     */
    public function testEncodingWithMethod($key, $sentence, $crypt)
    {
        $obj = new RC4($key);
        $this->assertEquals($crypt, $obj->rc4($sentence));
    }

    public function sentences()
    {
        return [
            ["ciaociao", "ciao", base64_decode("MLe/PQ==")],
            ["ciaociao", base64_decode("MLe/PQ=="), "ciao"],
        ];
    }
}
