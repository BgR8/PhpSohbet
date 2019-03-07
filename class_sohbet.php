<?php
class Sohbet{
  private $rumuz, $sifre, $oda, $zaman, $oturum = false;
   function __construct($db,$kadi,$sifre) {
    $this->link = @mysql_connect('localhost',$kadi,$sifre);
    mysql_select_db($db,$this->link);
    echo isset($this->link)? " ":"Hata var.";
   }

   // $this->result = mysql_query("INSERT INTO uye VALUES ('', '$rumuz', '$sifre', '')") or die('Hata var'. mysql_error());
   function uyeEkle($rumuz, $sifre) {

     $this->result = mysql_query("INSERT INTO uye VALUES ('', '$rumuz', '$sifre', '')") or die('Hata var'. mysql_error());
     echo 'Kaydınız başarılı şekilde oluşturuldu';

   }

   function girisYap($rumuz, $sifre) {

     $this->result = mysql_query("SELECT * FROM uye WHERE rumuz = '".$rumuz."' AND sifre = '".$sifre."'");
     $getir = mysql_fetch_array($this->result);

     if (mysql_num_rows($this->result) < 1) {
       echo 'Kayıt Bulunmamaktadır.';
     }

     if (mysql_num_rows($this->result) == 1) {

       mysql_real_escape_string($this->oturum =  md5(uniqid (rand())));
       $this->zaman = time()+60*3153600;
       setcookie ("sohbet", $this->oturum, $this->zaman);
       setcookie ("no", $getir['ID'], $zaman);

       $this->result = mysql_query("
       UPDATE uye SET oturum = '".$this->oturum."'
       WHERE ID = '".$getir['ID']."'");
       header('Location:index.php');
    }

   }

   function odaOlustur($oda) {
     $this->result = mysql_query("
      SELECT * FROM uye
       WHERE rumuz = '".$this->rumuz."'");
     $getir = mysql_fetch_array($this->result);
     $sahip = $_COOKIE['no'];


     $this->result = mysql_query("INSERT INTO oda VALUES ('', '$oda', '$sahip')");
     
     $odaid = mysql_insert_id();
     
     $this->result = mysql_query("INSERT INTO odakatilimci VALUES ('$odaid', '$sahip')");
     header('Location:index.php');

   }

   function odaKatil($odano) {
     $no = $_COOKIE['no'];


     $this->result = mysql_query("INSERT INTO odakatilimci VALUES ('$odano', '$no')");
     header('Location:index.php');

   }

   function listele($sorgu){

     /*$this->result = mysql_query($sorgu) or die('hata var:'.mysql_error());
               echo "<table border='1' width='20%' cellpadding='3' cellspacing='3'
                        style='border-collapse: collapse'>\n";
              while ($this->line = mysql_fetch_array($this->result, MYSQL_ASSOC)) {
                        echo "\t<tr>\n";
                   foreach ($this->line as $col_value) {
                         echo "\t\t<td>$col_value</td>\n";
                     }
                         echo "\t</tr>\n";
                }
                         echo "</table>\n";
                         */            

                 
   }

   function cikisYap() {
    $this->result = mysql_query("
      SELECT * FROM uye
      WHERE  oturum = '".$this->oturum."' ");
     $getir = mysql_fetch_array($this->result);

     setcookie("sohbet",$getir['oturum'],time()-7200);
     setcookie("no",$getir['ID'],time()-7200);
     mysql_query("UPDATE uye SET oturum = ''
     WHERE ID = '".$_COOKIE['no']."'");
     header('Location: index.php');
   }


   function __destruct() {

   	@mysql_free_result($this->result);
      mysql_close($this->link);

   }

}

$uye = new Sohbet('sohbet','root','');
