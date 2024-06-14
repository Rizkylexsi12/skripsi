<?php
    $key = "12345678901234567890123456789012";

    function encryptAES256($data, $key) {
        $method = 'aes-256-cbc';
        $iv_length = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($iv_length);

        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);

        // Combine IV and encrypted data
        $encrypted_data = base64_encode($iv . $encrypted);

        return $encrypted_data;
    }

    function decryptAES256($data, $key) {
        $method = 'aes-256-cbc';
        $data = base64_decode($data);
        $iv_length = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $iv_length);
        $encrypted = substr($data, $iv_length);

        $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);

        return $decrypted;
    }
?>