<?php

if (!function_exists('config')){
    /**
     * @param string $key
     * @return array|string|mix
     */
    function config($key)
    {
        /**
         * @var array|mixed
         */
        $config=$GLOBALS['config'];

        return $config->get($key);
    }
}

if (!function_exists('redirect')){
    function redirect($location)
    {
        if (ob_get_level()){
            ob_end_clean();
        }

        header('Location: ' . $location);
        exit();
    }
}

if (!function_exists('encrypt')) {
    function encrypt($pure_string, $encryption_key)
    {
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $pure_string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        return $encryption;
    }
}

if (!function_exists('decrypt')) {
    function decrypt($encrypted_string, $encryption_key)
    {
        $ciphering = "AES-128-CTR";
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt(
            $encrypted_string,
            $ciphering,
            $encryption_key,
            $options,
            $decryption_iv
        );

        return $decryption;
    }
}



if (!function_exists('check_login')) {
    function check_login()
    {
        return isset($_SESSION['user']) ? true : false;
    }
}


if (!function_exists('encrypt_password')) {
    function encrypt_password($password)
    {
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

if (!function_exists('password_check')) {
    function password_check($password, $password_hash)
    {
        return password_verify($password, $password_hash);
    }
}


if (!function_exists('auth')){
    /**
     * Tr??? v??? user model n???u ???? login
     * 
     * @return \App\Models\User|mixed
     */
    function auth(){
        $userSerialized=$_SESSION['user'] ?? null;
        //$userSerialized=session()->get('user');
        $user=$userSerialized ? unserialize($userSerialized) : null;
        return $user;
    }
}

if (!function_exists('session')){
    /**
     * Tr??? v??? symfony session object
     * 
     * @return \App\Http\Session\Session
     */
    function session()
    {
        /**
         * @var \App\Http\Session\Session
         */
        $session=$GLOBALS['session'];

        return $session;
    }
}

if (!function_exists('cookie')){
    /**
     * Tr??? v??? cookie ???????c browser submit k??m theo
     * 
     * @return \Symfony\Component\HttpFoundation\InputBag
     *
     */
    function cookie(){
        $cookies=request()->cookies;
        return $cookies;
    }
}

if (!function_exists('request')){
    /**
     * Tr??? v??? request handler
     * @return \App\Http\Request
     * 
     */
    function request(){
        /**
         * @var \App\Http\Request
         */
        $request=$GLOBALS['request'];
        return $request;
    }
}

class FLASH
{
    public const SUCCESS='success';
    public const WARNING='warning';
    public const INFO='info';
    public const ERROR='error';
}


