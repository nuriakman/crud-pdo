<?php
    include 'db_baglan.php';

    if(!isset($_GET['id'])){
        die("HATA: ID Değeri yok!");
    }

    // Sorgumuzu hazırlayalım
    $SORGU = $DB->prepare("SELECT * FROM rehber WHERE id = :id");
    // Düzenlenecek kayıt için ID değerini sorguda yerine koyalım
    $SORGU->bindParam(":id", $_GET['id']);
    // Sorguyu çalıştıralım
    $SORGU->execute();
    if($SORGU->rowCount() == 0){
        // Düzeltimek istenilen böyle bir kayıt yok
        die("HATA: Böyle bir kayıt bulunamadı");
    }else{
        // Kaydı getirelim
        $KAYIT = $SORGU->fetch();
    }

    if(isset($_POST['adisoyadi'])){

        $adisoyadi = $_POST['adisoyadi'];
        $telefonu  = $_POST['telefonu'];
        $birimi    = $_POST['birimi'];

        // Sorgumuzu hazırlayalım
        $SORGU = $DB->prepare("UPDATE rehber SET adisoyadi=:adisoyadi, telefonu=:telefonu, birimi=:birimi WHERE id=:id");
        // Sorgudaki parametrelerimizi yerlerine koyalım
        $SORGU->bindParam(":adisoyadi", $adisoyadi);
        $SORGU->bindParam(":telefonu", $telefonu);
        $SORGU->bindParam(":birimi", $birimi);
        $SORGU->bindParam(":id", $_GET['id']);
        // Sorguyu çalıştıralım
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
            Adı Soyadı: 
                <input required type="text" name="adisoyadi" 
                value="<?php echo $KAYIT['adisoyadi'] ?>"/> <br>
            Telefonu: 
                <input required type="text" name="telefonu"
                value="<?php echo $KAYIT['telefonu'] ?>"/> <br>
            Birimi: 
                <input required type="text" name="birimi" 
                value="<?php echo $KAYIT['birimi'] ?>"/> <br>
            <input type="submit" name="submit" value="Güncellemeleri Kaydet" />
        </form>
    </body>
</html>
