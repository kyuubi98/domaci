<?php
include('inicijalizacija.php');
$id = $_GET['id'];
$db->where("mecID", $id);
$obrisaniMec = $db->getOne('mec');
var_dump($obrisaniMec);

// prvo ide pobjeda domacina pa pobjeda gosta ( else) 
if ($obrisaniMec['setovaDomacin'] > $obrisaniMec['setovaGost']) {
  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,pobeda = pobeda - 1,setovaDatih = setovaDatih-" . $obrisaniMec['setovaDomacin'] . ",setovaPrimljenih = setovaPrimljenih - " . $obrisaniMec['setovaGost'] . " where timID=" . $obrisaniMec['domacinID']);

  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,poraza = poraza - 1,setovaDatih = setovaDatih-" . $obrisaniMec['setovaGost'] . ",setovaPrimljenih = setovaPrimljenih - " . $obrisaniMec['setovaDomacin'] . " where timID=" . $obrisaniMec['gostID']);

} else {

  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,poraza = poraza - 1,setovaDatih = setovaDatih -" . $obrisaniMec['setovaDomacin'] . ",setovaPrimljenih = setovaPrimljenih - " . $obrisaniMec['setovaGost'] . " where timID=" . $obrisaniMec['domacinID']);

  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,pobeda = pobeda - 1,setovaDatih = setovaDatih -" . $obrisaniMec['setovaGost'] . ",setovaPrimljenih = setovaPrimljenih - " . $obrisaniMec['setovaDomacin'] . " where timID=" . $obrisaniMec['gostID']);

}

$db->where("mecID", $id);//za mec sa ovim id-om brisemo 
$db->delete('mec');
header("Location: tabelaTimovi.php");//sluzi da nas vrati na stranicu
?>
