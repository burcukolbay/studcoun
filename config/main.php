<?php
//php.exe yorumlayıcısına tüm hataları göster komutu veriyoruz
error_reporting(E_ALL);
//php.exe yorumlayısına hataları gösterme ayarı olarak on komutunu veriyoruz
ini_set('display_errors', 'On');


//@todo yayına girerken değiştirilecek ve test edilecek
//URL sabitleri
define('BASE_URL', 'http://localhost/studcoun');
define('ADMIN_BASE_URL', BASE_URL . '/admin');
define('MEMBER_BASE_URL', BASE_URL . '/member');

//PATH sabitleri
define('BASE_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));
define('ADMIN_BASE_PATH', BASE_PATH . '/admin');
define('MEMBER_BASE_PATH', BASE_PATH . '/member');

//DB sabitleri
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'studcoun');

