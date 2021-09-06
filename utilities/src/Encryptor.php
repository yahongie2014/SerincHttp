<?php

namespace SerincHttp;

class Encryptor
{
    private $key;
    private $cipher;
    private $iv;

    /**
     * Encrypt constructor.
     */
    function __construct()
    {
        $this->key = "9ba6c9946e098a0d1b55";
        $this->cipher = "AES-128-CBC";
        $this->iv = hex2bin("09a182a0648cd75fbbe13522cb3d6ec2");
    }

    /**
     * @param $text
     * @return string
     */
    public function encrypt($text)
    {
        return openssl_encrypt($text, $this->cipher, $this->key, 0, $this->iv);

    }

    /**
     * @param $encrypted
     * @return string
     */
    public function decrypt($encrypted)
    {
        return openssl_decrypt($encrypted, $this->cipher, $this->key, 0, $this->iv);
    }

}
