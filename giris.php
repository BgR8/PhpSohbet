<meta charset="utf-8">
<link rel="stylesheet" href="site.css">
<?php
require 'class_sohbet.php';

if(!empty($_POST['giris'])){
  $rumuz = $_POST['rumuz'];
  $sifre = $_POST['sifre'];
  if(empty($rumuz)) {
    echo 'Rumuz Boş
    <a href="javascript:history.back();">Geri Dön</a>';
  }
  elseif(empty($sifre)) {
    echo 'Şifre Giriniz
    <a href="javascript:history.back();">Geri Dön</a>';
  }
  else {
    $uye->girisYap($rumuz, $sifre);
  }
}
else {

?>
<div id="login_wrapper">
    <div id="login">

        <div class="headline">Giriş Yap</div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginform" id="loginform">
            <fieldset>
                <input type="text" name="rumuz" /><br />
                <input type="password" name="sifre" /><br />
                <input type="submit" name="giris" value="Giriş Yap" />
            </fieldset>
        </form>

        <a href="kayit.php">
            Kayıt Ol
        </a>

    </div>
</div>
<?php }
?>
