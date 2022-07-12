<?php
include("inicijalizacija.php");
$timID = $_GET['id'];
if ($timID == 0) {
  $sql = "select d.nazivTima as domacin ,g.nazivTima as gost,m.setovaDomacin,m.setovaGost,m.mecID,gr.naziv as grad from mec m join tim d on m.domacinID=d.timID join tim g on m.gostID=g.timID join grad gr on d.gradID=gr.id ";

} else {
  $sql = "select d.nazivTima as domacin ,g.nazivTima as gost,m.setovaDomacin,m.setovaGost,m.mecID,gr.naziv as grad from mec m join tim d on m.domacinID=d.timID join tim g on m.gostID=g.timID join grad gr on d.gradID=gr.id where m.domacinID=" . $timID . " OR m.gostID=" . $timID;
}

$mecevi = $db->rawQuery($sql);

echo (json_encode($mecevi));
?>
