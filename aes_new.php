<?php

class AES256 {
    private $key;
    private $blockSize = 16; // AES block size is 16 bytes

    public function __construct($key) {
        // Kunci harus panjangnya 32 byte untuk AES-256
        if (strlen($key) !== 32) {
            echo '<p>Kunci harus panjangnya 32 byte untuk AES-256.</p>';
            // throw new Exception('Kunci harus panjangnya 32 byte untuk AES-256.');
        }
        $this->key = $key;
    }

    private function pad($data) {
        $padLength = $this->blockSize - (strlen($data) % $this->blockSize);
        return $data . str_repeat(chr($padLength), $padLength);
    }

    private function unpad($data) {
        $padLength = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padLength);
    }

    public function encrypt($data) {
        $data = $this->pad($data);
        $iv = openssl_random_pseudo_bytes($this->blockSize);
        $encrypted = $iv;
        for ($i = 0; $i < strlen($data); $i += $this->blockSize) {
            $block = substr($data, $i, $this->blockSize);
            $encryptedBlock = $this->encryptBlock($block, $iv);
            $encrypted .= $encryptedBlock;
            $iv = $encryptedBlock;
        }
        return base64_encode($encrypted);
    }

    public function decrypt($data) {
        $data = base64_decode($data);
        $iv = substr($data, 0, $this->blockSize);
        $encrypted = substr($data, $this->blockSize);
        $decrypted = '';
        for ($i = 0; $i < strlen($encrypted); $i += $this->blockSize) {
            $block = substr($encrypted, $i, $this->blockSize);
            $decryptedBlock = $this->decryptBlock($block, $iv);
            $decrypted .= $decryptedBlock;
            $iv = $block;
        }
        return $this->unpad($decrypted);
    }

    private function encryptBlock($block, $iv) {
        return $this->xorBlocks($block, $iv); // Placeholder for actual AES block encryption
    }

    private function decryptBlock($block, $iv) {
        return $this->xorBlocks($block, $iv); // Placeholder for actual AES block decryption
    }

    private function xorBlocks($block1, $block2) {
        $result = '';
        for ($i = 0; $i < strlen($block1); $i++) {
            $result .= chr(ord($block1[$i]) ^ ord($block2[$i]));
        }
        return $result;
    }
}

$key = '1234567890123456789012345678901'; // Panjang kunci harus 32 byte untuk AES-256
$data = 'Lexsi';

$aes = new AES256($key);

$encrypted_data = $aes->encrypt($data);
echo '<p> Data terenkripsi: ' . $encrypted_data . "\n </p>";

$decrypted_data = $aes->decrypt($encrypted_data);
echo '<p> Data terdekripsi: ' . $decrypted_data . "\n </p>";

?>