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
$crypt = new Crypt;

$encoded = $crypt->encrypt('0123456789');

$c = "1SA2eO3UokHARYWkhhKm5Q==";
$decoded = $crypt->decrypt($c);

echo "Encrypted string : " . trim($encoded) . "<br />\n";
echo "Decrypted string : " . trim($decoded) . "<br />\n";
*/
?>