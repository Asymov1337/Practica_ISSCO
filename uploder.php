<?php
$updir = 'upload';    // Directorul pt. upload
$max_size = 500;      // Marimea maxima, in KiloBytes, care este permisa

// Seteaza matricea cu tipurile de fisiere permise
$allowtype = array('bmp', 'flv', 'gif', 'jpg', 'jpeg', 'mp3', 'pdf', 'png', 'rar', 'zip');

// Creaza directorul din $updir (cu CHMOD 077), daca nu exista
if(!is_dir($updir)) mkdir($updir, 0777);

/** Incarcarea imaginii pe server **/

$rezultat = array();
// Daca este primit din formular un fisier valid
if(isset ($_FILES['file_up'])){
  // Seteaza pt. upload fisierele primite (pot fi primite din mai multe campuri 'file_up')
  for($f=0; $f<count($_FILES['file_up']['name']); $f++){
    // Verifica daca fisierul are tipul de extensie permis
    $ar_ext = explode(".", strtolower($_FILES['file_up']['name'][$f]));
    $type = end($ar_ext);
    if(in_array($type, $allowtype)){
      // Verifica daca fisierul are marimea permisa
      if($_FILES['file_up']['size'][$f]<=$max_size*1000){
        // Daca nu sunt erori in procesul de copiere
        if($_FILES['file_up']['error'][$f]==0){
        // Seteaza locatia si numele pt. incarcare pe server
          $thefile = $updir . "/" . $_FILES['file_up']['name'][$f];
          // Daca fisierul nu poate fi incarcat, returneaza mesaj
          if(!move_uploaded_file ($_FILES['file_up']['tmp_name'][$f], $thefile)) $rezultat[$f] = ' Fisierul nu a putut fi copiat, incercati din nou';
          else $rezultat[$f] = '<b>'.$_FILES['file_up']['name'][$f].'</b>';  // Retine numele fisierului incarcat
        }
      }
    else { $rezultat[$f] = 'Fisierul <b>'. $_FILES['file_up']['name'][$f]. '</b> depaseste marimea permisa de maxim <i>'. $max_size. 'KB</i>'; }
    }
    else { $rezultat[$f] = 'Fisierul <b>'. $_FILES['file_up']['name'][$f]. '</b> nu are tipul de extensie permis'; }
  }

   // Returneaza rezultatul
  $rezultat2 = implode('<br> ', $rezultat);
  echo '<h4>Fisiere incarcate:</h4>'.$rezultat2;
}
