<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gejala extends CI_Model {
	
	public function getdata()
	{
		return $this->db->get('gejala')->result();
	}
	
	public function countdata()
	{
		return $this->db->get('gejala')->num_rows();
	}
	
	public function countdataby($col, $id)
	{
		$this->db->where($col, $id);
		return $this->db->get('gejala')->num_rows();
	}
	
	public function insertdata($data)
	{
		$this->db->insert('gejala', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_gejala', $id);
		$this->db->delete('gejala');
	}

	public function selectdata($id)
	{
		$this->db->where('id_gejala', $id);
		return $this->db->get('gejala')->row();
	}
	
	public function selectdataby($col, $id)
	{
		$this->db->where($col, $id);
		return $this->db->get('gejala')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_gejala', $id);
		$this->db->update('gejala', $data);
	}

}
