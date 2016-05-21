<?php
  require_once("database.php");
  require_once("database_utama.php");

if(isset($_GET['token'])){
  $tipe = verifikasiToken($_GET['token']);
  if($tipe == 'kelurahan' || $tipe == 'kecamatan' || $tipe == 'disdukcapil'){
    if (isset($_POST['id'])) {
      if(isset($_POST['agree'])) {
        if($_POST['agree'] == 'yes') {
          if(isset($_POST['type'])) {
            if($_POST['type'] == 'datang') {
              $status = getStatusDatang($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                verifikasiDatang($_POST['id'], $tipe);
            }

            if($_POST['type'] == 'dalam') {
              $status = getStatusDalam($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                verifikasiDalam($_POST['id'], $tipe);
            }
            
            if($_POST['type'] == 'keluar') {
              $status = getStatusKeluar($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                verifikasiKeluar($_POST['id'], $tipe);
            }
          }
        }
        else {
          if(isset($_POST['type'])) {
            if($_POST['type'] == 'datang') {
              $status = getStatusDatang($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                rejectDatang($_POST['id'], $tipe);
            }

            if($_POST['type'] == 'dalam') {
              $status = getStatusDalam($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                rejectDalam($_POST['id'], $tipe);
            }
            
            if($_POST['type'] == 'keluar') {
              $status = getStatusKeluar($_POST['id']);
              if(($tipe == 'kelurahan' && $status == 0) || ($tipe == 'kecamatan' && $status <= 1) || ($tipe == 'disdukcapil' && $status <= 2))
                rejectKeluar($_POST['id'], $tipe);
            }
          }
        }
      }
    }
  }
}

  echo "<meta http-equiv='refresh' content='0;url=http://localhost:81/aapdo/verifikasiKepindahan.php?token=" . $_GET['token'] . "'>";
?>