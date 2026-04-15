<?php
require_once '../../vendor/autoload.php';

$server = new nusoap_server();

// Konfigurasi WSDL
$server->configureWSDL('kalkulator_service', 'urn:kalkulator');

// ================== FUNCTION ==================

function tambah($a, $b) {
    return $a + $b;
}

function kurang($a, $b) {
    return $a - $b;
}

function kali($a, $b) {
    return $a * $b;
}

function bagi($a, $b) {
    if ($b == 0) {
        return "Tidak bisa dibagi 0";
    }
    return $a / $b;
}

// ================== REGISTER ==================

$server->register('tambah',
    ['a' => 'xsd:int', 'b' => 'xsd:int'],
    ['return' => 'xsd:int'],
    'urn:kalkulator',
    'urn:kalkulator#tambah',
    'rpc',
    'encoded',
    'Penjumlahan dua angka'
);

$server->register('kurang',
    ['a' => 'xsd:int', 'b' => 'xsd:int'],
    ['return' => 'xsd:int'],
    'urn:kalkulator',
    'urn:kalkulator#kurang',
    'rpc',
    'encoded',
    'Pengurangan dua angka'
);

$server->register('kali',
    ['a' => 'xsd:int', 'b' => 'xsd:int'],
    ['return' => 'xsd:int'],
    'urn:kalkulator',
    'urn:kalkulator#kali',
    'rpc',
    'encoded',
    'Perkalian dua angka'
);

$server->register('bagi',
    ['a' => 'xsd:int', 'b' => 'xsd:int'],
    ['return' => 'xsd:string'], 
    'urn:kalkulator',
    'urn:kalkulator#bagi',
    'rpc',
    'encoded',
    'Pembagian dua angka'
);


$server->service(file_get_contents("php://input"));
exit;