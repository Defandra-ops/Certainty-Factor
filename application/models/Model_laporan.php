<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {
	
	public function getdata()
	{
		return $this->db->get('laporan')->result();
	}
	
	public function countdata()
	{
		return $this->db->get('laporan')->num_rows();
	}
	
	public function insertdata($data)
	{
		$this->db->insert_batch('laporan', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_laporan', $id);
		$this->db->delete('laporan');
	}

	public function selectdata($id)
	{
		$this->db->where('id_laporan', $id);
		return $this->db->get('laporan')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_laporan', $id);
		$this->db->update('laporan', $data);
	}

}
