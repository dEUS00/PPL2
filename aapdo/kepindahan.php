<?php
  require_once("database.php");
  require_once("database_utama.php");


if(isset($_GET['token'])){
  $tipe = verifikasiToken($_GET['token']);
  if($tipe == 'warga'){
      if (isset($_POST['nik'])) {
        if(isset($_POST['type'])) {
          if($_POST['type'] == 'datang')
            postDataDatang($_POST, $tipe);
          if($_POST['type'] == 'dalam')
            postDataDalam($_POST, $tipe);
          if($_POST['type'] == 'keluar')
            postDataKeluar($_POST, $tipe);
      }
    }
  }
}
  

  echo "<meta http-equiv='refresh' content='0;url=http://localhost:81/aapdo/index.php?token=" . $_GET['token'] . "'>";
?>