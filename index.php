<meta charset="utf-8">
<?php
require 'class_sohbet.php';
if(!empty($_COOKIE['sohbet'])) {
  echo '
  <a href="oda.php">Yeni Oda Oluştur</a>
  <a href="cikis.php">Çıkış Yap</a><br />';

  echo '<br /><b>Odalarım</b> <a href="odaliste.php">Odalara Bak</a>';

  //$uye->listele("SELECT * FROM oda WHERE sahip = '".$_COOKIE['no']."'");
  $sor = mysql_query("SELECT * FROM odakatilimci 
  INNER JOIN oda ON odakatilimci.odano = oda.ID
  WHERE uyeno = '".$_COOKIE['no']."' ");
  while($cek = mysql_fetch_array($sor)) {
    echo '<table border="1" width="20%" cellpadding="3" cellspacing="3" style="border-collapse: collapse">
            <tr>
              <td>'.$cek['isim'].'</td>
            </tr>
          </table>';
  }
}
else {
  echo '<a href="giris.php">Giriş</a>
  <a href="kayit.php">Kayıt</a>';
}


?>
