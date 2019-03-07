<meta charset="utf-8">
<?php
require 'class_sohbet.php';
if(!empty($_COOKIE['sohbet'])) {
  echo '
  <a href="oda.php">Yeni Oda Oluştur</a>
  <a href="cikis.php">Çıkış Yap</a><br />';

  echo '<br /><b><a href="index.php">Odalarım</a></b> <a href="odaliste.php">Odalara Bak</a>';

  $sor = mysql_query("SELECT * FROM oda");
  while($cek = mysql_fetch_array($sor)) {
      $odasor = mysql_query("SELECT * FROM odakatilimci WHERE uyeno = '".$_COOKIE['no']."'");
      $odacek = mysql_fetch_array($odasor);
    echo '<table border="1" width="20%" cellpadding="3" cellspacing="3" style="border-collapse: collapse">
            <tr>
              <td width="30%">'.$cek['isim'].'</td>
              <td>';
              if($cek['sahip'] != $_COOKIE['no']) {
                  if(empty($odacek['uyeno'])) :
                  echo '
              <a href="odakatil.php?id='.$cek['ID'].'">Odaya Katıl</a>';
                endif;
              }
              echo '</td>
            </tr>
          </table>';
  }
}
else {
  echo '<a href="giris.php">Giriş</a>
  <a href="kayit.php">Kayıt</a>';
}


?>
