<?php
    include "aes.php";

    $key = "12345678901234567890123456789012";
    $aes = new AES($key);

    function encrypt($input, $aes){
        $cipherText = '';
        $blockSize = 16;

        $inputLength = strlen($input);
        $numBlocks = ceil($inputLength / $blockSize);

        for ($i = 0; $i < $numBlocks; $i++) {
            $block = substr($input, $i * $blockSize, $blockSize);

            if (strlen($block) < $blockSize) {
                $block = str_pad($block, $blockSize, "\0");
            }

            $encryptedBlock = $aes->encrypt($block);
            $cipherText .= $encryptedBlock;
        }

        return base64_encode($cipherText);
    }

    function decrypt($input, $aes) {
        $plainText = '';
        $blockSize = 16;

        $cipherText = base64_decode($input);
        $inputLength = strlen($cipherText);
        $numBlocks = ceil($inputLength / $blockSize);

        for ($i = 0; $i < $numBlocks; $i++) {
            $block = substr($cipherText, $i * $blockSize, $blockSize);

            $decryptedBlock = $aes->decrypt($block);

            $plainText .= $decryptedBlock;
        }
        $plainText = rtrim($plainText, "\0");

        return $plainText;
    }
?>