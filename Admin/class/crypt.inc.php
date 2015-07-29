<?php

/*
 * PHP mcrypt - Class to provide 2 way encryption of data
 */

class Crypt {

    private $secretkey = 'esqesqqsfqzgeg';

    //Encrypts a string
    public function encrypt($text) {
        $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->secretkey, $text, MCRYPT_MODE_ECB, 'keee');
        return base64_encode($data);
    }

    //Decrypts a string
    public function decrypt($text) {
        $text = base64_decode($text);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->secretkey, $text, MCRYPT_MODE_ECB, 'keee');
    }

}
/*
// a new proCrypt instance
$crypt = new Crypt;

// encrypt the string
$encoded = $crypt->encrypt('0123456789');

// decrypt the string
$decoded = $crypt->decrypt($encoded);

echo "Encrypted string : " . trim($encoded) . "<br />\n";
echo "Decrypted string : " . trim($decoded) . "<br />\n";
*/
?>