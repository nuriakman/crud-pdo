<?php
    include 'db_baglan.php';

    if(isset($_GET["ara"])) {
        $ARANANAD = $_GET["ara"];
        // Çalıştırılacak sorgu
        $SORGU = $DB->prepare("SELECT * FROM rehber 
            WHERE adisoyadi LIKE '%$ARANANAD%' ");
    } else {
        // Çalıştırılacak sorgu
        $SORGU = $DB->prepare("SELECT * FROM rehber");
    }
    // Sorguyu çalıştır
    $SORGU->execute();
    // Kayıtları Getir
    $KAYITLAR = $SORGU->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Telefon Rehberi</title>
    </head>
    <body>
        <h1>Telefon Rehberi</h1>

    <p>
        <form method="GET" autocomplete="off">
            <input type="text" name="ara" placeholder="Arama yapın...">
            <input type="submit" value="Ara!">
        </form>
    </p>
        
        <p>
            <a href="create.php"><button type="button">Yeni kişi ekle</button></a>
        </p>

        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>
                    #ID
                </th>
                <th>
                    Adı Soyadı
                </th>
                <th>
                    Telefonu
                </th>
                <th>
                    Birimi
                </th>
                <th>
                    İşlem
                </th>
            </tr>
            <!-- Sorgumuza gelen cevap içindeki kayıtları listeleyelim -->
            <?php foreach ($KAYITLAR as $KAYIT): ?>
                <tr>
                    <td>
                        <?php echo $KAYIT['id'] ?>
                    </td>
                    <td>

                        
                        <?php echo $KAYIT['adisoyadi'] ?>
                    </td>
                    <td>
                        <?php echo $KAYIT['telefonu'] ?>
                    </td>
                    <td>
                        <?php echo $KAYIT['birimi'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $KAYIT['id']?>">Düzenle</a>
                        <a href="delete.php?id=<?php echo $KAYIT['id']?>" onclick="return confirm('Bu kayıt silinecek. Emin misiniz?')">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
