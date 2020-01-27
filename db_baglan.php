<?php
    // Veritabanı Bağlantı ayarları
    $host     = "localhost";
    $DBname   = "TELEFON_REHBERI";
    $username = "root";
    $password = "root";

    try {
        // Veritabanına bağlan
        $DB = new PDO("mysql:host={$host};dbname={$DBname}", $username, $password);
        // Hata Modunu Ayarla
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception){
        die("Veritabanına bağlantı kurulamadı: " . $exception->getMessage());
    }
?>
