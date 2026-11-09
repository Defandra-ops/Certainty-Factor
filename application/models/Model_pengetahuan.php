<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengetahuan extends CI_Model {
	
	public function getdata()
	{
		return $this->db->get('vpengetahuan')->result();
	}
	
	public function countdata()
	{
		return $this->db->get('vpengetahuan')->num_rows();
	}
	
	public function insertdata($data)
	{
		$this->db->insert('pengetahuan', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_pengetahuan', $id);
		$this->db->delete('pengetahuan');
	}
	
	public function deletedatapenyakit($id)
	{
		$this->db->where('id_penyakit', $id);
		$this->db->delete('pengetahuan');
	}
	
	public function deletedatagejala($id)
	{
		$this->db->where('id_gejala', $id);
		$this->db->delete('pengetahuan');
	}

	public function selectdata($id)
	{
		$this->db->where('id_pengetahuan', $id);
		return $this->db->get('vpengetahuan')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_pengetahuan', $id);
		$this->db->update('pengetahuan', $data);
	}

}
