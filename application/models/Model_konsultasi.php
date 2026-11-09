<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konsultasi extends CI_Model {
	
	public function getdata()
	{
		return $this->db->get('konsultasi')->result();
	}
	
	public function filterdataby($col, $id)
	{
		$this->db->where($col, $id);
		$this->db->order_by('waktu', 'DESC');
		return $this->db->get('konsultasi')->result();
	}
	
	public function countdata()
	{
		return $this->db->get('konsultasi')->num_rows();
	}
	
	public function countdataby($col, $id)
	{
		$this->db->where($col, $id);
		return $this->db->get('konsultasi')->num_rows();
	}
	
	public function insertdata($data)
	{
		$this->db->insert('konsultasi', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_konsultasi', $id);
		$this->db->delete('konsultasi');
	}

	public function selectdata($id)
	{
		$this->db->where('id_konsultasi', $id);
		return $this->db->get('konsultasi')->row();
	}
	
	public function selectdataby($col, $id)
	{
		$this->db->where($col, $id);
		return $this->db->get('konsultasi')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_konsultasi', $id);
		$this->db->update('konsultasi', $data);
	}

}
