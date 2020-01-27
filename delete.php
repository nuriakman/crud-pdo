<?php
    include 'db_baglan.php';

    if(!isset($_GET['id'])){
        die("HATA: ID Değeri yok!");
    }

    // Sorgumuzu hazırlayalım
    $SORGU = $DB->prepare("DELETE FROM rehber WHERE id=:id");
    // Silinecek kayıt için ID değerini sorguda yerine koyalım
    $SORGU->bindParam(":id", $_GET["id"]);
    // Sorguyu çalıştıralım
    $SORGU->execute();
    // İşlem tamam. Ana sayfaya yönlendirelim.
    header("location: index.php");
    die();
?>
