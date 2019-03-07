<meta charset="utf-8">
<link rel="stylesheet" href="site.css">

<?php
require 'class_sohbet.php';

$odano = $_GET['id'];   
$uye->odaKatil($odano);


?>

<div id="login_wrapper">
    <div id="login">

        <div class="headline">Yeni Oda Oluştur</div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="odaform" id="odaform">
            <fieldset>
                <input type="text" name="oda" /><br />
                <input type="submit" name="kayit" value="Kaydet" />
            </fieldset>
        </form>

        <a href="index.php">
            Anasayfaya Dön
        </a>

    </div>
</div>
