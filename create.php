<?php
    include 'db_baglan.php';

    if(isset($_POST['submit'])){
        // Sorguyu hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO rehber(adisoyadi, telefonu, birimi)
        VALUES (:adisoyadi,:telefonu,:birimi)");
        $SORGU->bindParam(":adisoyadi", $adisoyadi);
        $SORGU->bindParam(":telefonu",  $telefonu);
        $SORGU->bindParam(":birimi",    $birimi);
        // SQL Sorgumuzu çalıştıralım
        $SORGU->execute();
        // İşlem tamam. Ana sayfaya yönlendirelim.
        header("location: index.php");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Telefon Rehberi</title>
    </head>
    <body>
        <h1>Telefon Rehberi</h1>
        <form method="post">
            Adı Soyadı: <input required type="text" name="adisoyadi" placeholder="adisoyadi" /> <br>
            Telefonu: <input required type="text" name="telefonu" placeholder="telefonu" /> <br>
            Birimi: <input required type="text" name="birimi" placeholder="No birimi" /> <br>
            <input type="submit" name="submit" value="Yeni Kişiyi Kaydet" />
        </form>
    </body>
</html>
