<?php

class Mec
{

	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function unesiMec()
	{
		if (!isset($_POST['domacin']) || !isset($_POST['gost']) || !isset($_POST['setDom']) || !isset($_POST['setGost'])) {
			return false;

		}
		if ($_POST['domacin'] == '' || $_POST['gost'] == '' || $_POST['setDom'] == '' || $_POST['setGost'] == '') {
			return false;
		}

		$data = array(
			"domacinID" => trim($_POST['domacin']),
			"gostID" => trim($_POST['gost']),
			"setovaDomacin" => trim($_POST['setDom']),
			"setovaGost" => trim($_POST['setGost'])
		);

		$sacuvano = $this->db->insert('mec', $data);

		if ($_POST['setDom'] > $_POST['setGost']) {//isti upiti kao i za brisanje samo sada dodajemo (+ a ne  -)
			$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,pobeda = pobeda + 1,setovaDatih = setovaDatih+" . $_POST['setDom'] . ", setovaPrimljenih = setovaPrimljenih + " . $_POST['setGost'] . "  where timID=" . $_POST['domacin']);

			$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,poraza = poraza + 1,setovaDatih = setovaDatih+" . $_POST['setGost'] . ", setovaPrimljenih = setovaPrimljenih + " . $_POST['setDom'] . " where timID=" . $_POST['gost']);

		} else {

			$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,poraza = poraza + 1,setovaDatih = setovaDatih +" . $_POST['setDom'] . ", setovaPrimljenih = setovaPrimljenih + " . $_POST['setGost'] . " where timID=" . $_POST['domacin']);

			$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,pobeda = pobeda + 1,setovaDatih = setovaDatih +" . $_POST['setGost'] . ", setovaPrimljenih = setovaPrimljenih + " . $_POST['setDom'] . "  where timID=" . $_POST['gost']);

		}

		if ($sacuvano) {
			return true;

		} else {
			return false;
		}
	}

	public function izmeniNaziv()
	{
		if (!isset($_POST['tim']) || !isset($_POST['naziv'])) {
			return false;

		}
		if ($_POST['tim'] == '' || $_POST['naziv'] == '') {
			return false;

		}

		$data = array(
			trim($_POST['naziv']),
			trim($_POST['tim'])

		);
		$sacuvano = $this->db->rawQuery("Update tim set nazivTima = ? where timID= ?", $data);
		

		return true;

	}


}

?>
