<meta charset="utf-8">
<link rel="stylesheet" href="site.css">

<?php
require 'class_sohbet.php';

if(!empty($_POST['kayit'])){
  $oda = $_POST['oda'];
  if(empty($oda)) {
    echo 'Oda İsmi Giriniz
    <a href="javascript:history.back();">Geri Dön</a>';
  }
  else {
    $uye->odaOlustur($oda);
  }
}
else {

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
<?php } ?>
