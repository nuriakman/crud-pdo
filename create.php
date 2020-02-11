<?php
    include 'db_baglan.php';

    if(isset($_POST['submit'])){
        // Sorguyu hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO rehber(adisoyadi, telefonu, birimi)
        VALUES (:adisoyadi,:telefonu,:birimi)");
        $SORGU->bindParam(":adisoyadi", $_POST["adisoyadi"]);
        $SORGU->bindParam(":telefonu",  $_POST["telefonu"]);
        $SORGU->bindParam(":birimi",    $_POST["birimi"]);
        // SQL Sorgumuzu çalıştıralım
        $SORGU->execute();
        
        // Son eklenen kaydın kayıt numarasını alalım
        $YeniKayitID = $DB->lastInsertId();

        echo "<h1>Yeni Kayıt Başarılı</h1>";
        echo "<p>Bu kişi rehbere <b>$YeniKayitID kayıt numarası</b> ile eklendi</p>";

        echo "<br><br><br>";
        echo "<p>3 saniye içinde Ana Sayfaya yönleneceksiniz...</p>";
        
        // İşlem tamam. 3sn bekleyip, Ana sayfaya yönlendirelim.
        header("Refresh:3; url=index.php");
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
