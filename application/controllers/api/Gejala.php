<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('model_gejala');
		$this->load->model('model_penyakit');
	}

	public function index()
	{
		$data['error'] = false;
		$data['message'] = 'Berhasil mendapatkan data gejala';
		$data['semuagejala'] = $this->model_gejala->getdata();
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
	}

    public function detail()
    {
        $id = $this->uri->segment(4);
        if ($this->model_gejala->countdataby('id_gejala', $id) == 0) {
            $data["error"] = true;
            $data["message"] = "Belum menambahkan gejala";
        } else {
            $data['error'] = false;
            $data['message'] = 'Berhasil mendapatkan data gejala';
            $data['gejala'] = $this->model_gejala->selectdataby('id_gejala',$id);
        }
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

	public function cf_old() {
		// $sql = "999,10,7,12,3,14,15,16";
		$sql = $this->input->post('sql');
		$minta = $this->db->get('gejala')->result();
		$sqll = str_replace("'", "", $sql);
		$expsql = explode(",",$sqll);
		$sql1 = '';
		$data['proses'] = '';
		$i = 0;
		//mengecek semua chekbox gejala
		foreach ($minta as $hs)
		{
			foreach ($expsql as $xs) {
				if ($hs->id_gejala==$xs) {
					$sql1.=$hs->nama_gejala.",";
				}
			}
		}
		
		// $data['proses'] .= $sql1;

		empty($daftar_penyakit);
		empty($daftar_cf);

		if ($sql != '')
		{
			//mencari id_penyakit di tabel pengetahuan yang gejalanya dipilih
			$perintah = "SELECT id_penyakit FROM pengetahuan WHERE id_gejala IN ($sql) GROUP BY id_penyakit ORDER BY id_penyakit";
			$minta = $this->db->query($perintah)->result();
			$id_penyakit_terbesar = '';
			$nama_penyakit_terbesar = '';
			$deskripsi_penyakit ='';
			$solusi_penyakit = '';
			$c = 0;
			foreach ($minta as $hs)
			{
				//memProses id penyakit satu persatu
				$id_penyakit = $hs->id_penyakit;
				$qry = "SELECT * FROM penyakit WHERE id_penyakit = '$id_penyakit'";
				$dt = $this->db->query($qry)->row();
				$nama_penyakit = $dt->nama_penyakit;
				$deskripsi_penyakit = $dt->deskripsi;
				$solusi_penyakit = $dt->solusi;
				$daftar_penyakit[$c] = $hs->id_penyakit;
				$data['proses'] .= "\nProses Penyakit ".$daftar_penyakit[$c].". ".$nama_penyakit."\n==================";
				//mencari gejala yang mempunyai id penyakit tersebut, agar bisa menghitung CF dari MB dan MD nya
				$p = "SELECT id_penyakit, mb, md, id_gejala FROM pengetahuan WHERE id_gejala IN ($sql) AND id_penyakit = '$id_penyakit'";
				$m = $this->db->query($p);
				//mencari jumlah gejala yang ditemukan
				$jml = $m->num_rows();
				//jika gejalanya 1 langsung ketemu CF nya
				$data['proses'] .= "Jumlah Gejala = ".$jml."\n==================";
				if ($jml == 1)
				{
					$h = $m->row();
					$mb = $h->mb;
					$md = $h->md;
					$cf = $mb - $md;
					$daftar_cf[$c] = $cf;
					//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
					if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
					{
						$cf_terbesar = $cf;
						$id_penyakit_terbesar = $id_penyakit;
						$nama_penyakit_terbesar = $nama_penyakit;
						$deskripsi_penyakit_terbesar = $deskripsi_penyakit;
						$solusi_penyakit_terbesar = $solusi_penyakit;
					}
					$data['proses'] .= "\nProses 1\n==================";
					$data['proses'] .= "mb = ".$mb."\n";
					$data['proses'] .= "md = ".$md."\n";
					$data['proses'] .= "cf = mb - md = ".$mb." - ".$md." = ".$cf."\n\n\n";
				}
				//jika gejala lebih dari satu harus diProses semua gejala
				else if ($jml > 1)
				{
					$i = 1;
					//Proses gejala satu persatu
					foreach($m->result() as $h)
					{
						$data['proses'] .= "\nProses ".$i."\n==================";
						//pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
						if ($i == 1)
						{
							$mblama = $h->mb;
							$mdlama = $h->md;
							$data['proses'] .= "mblama = ".$mblama."\n";
							$data['proses'] .= "mdlama = ".$mdlama."\n";
						}
						//pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
						else if ($i == 2)
						{
							$mbbaru = $h->mb;
							$mdbaru = $h->md;
							$data['proses'] .= "mbbaru = ".$mbbaru."\n";
							$data['proses'] .= "mdbaru = ".$mdbaru."\n";
							$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
							$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
							$data['proses'] .= "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."\n";
							$data['proses'] .= "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."\n";
							//jika jumlah gejala cuma dua maka CF ketemu
							if ($jml == 2)
							{
								$mb = $mbsementara;
								$md = $mdsementara;
								$cf = $mb - $md;
								$data['proses'] .= "mb = mbsementara = ".$mb."\n";
								$data['proses'] .= "md = mdsementara = ".$md."\n";
								$data['proses'] .= "cf = mb - md = ".$mb." - ".$md." = ".$cf."\n\n\n";
								$daftar_cf[$c] = $cf;
								//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
								if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
								{
									$cf_terbesar = $cf;
									$id_penyakit_terbesar = $id_penyakit;
									$nama_penyakit_terbesar = $nama_penyakit;
									$deskripsi_penyakit_terbesar = $deskripsi_penyakit;
									$solusi_penyakit_terbesar = $solusi_penyakit;
								}
							}
						}
						//pada gejala yang ke 3 dst Proses MBsementara dan MDsementara menjadi MBlama dan MDlama
						//MB dan MD menjadi MBbaru dan MDbaru
						//hitung MBsementara dan MD sementara yg sekarang
						else if ($i >= 3)
						{
							$mblama = $mbsementara;
							$mdlama = $mdsementara;
							$data['proses'] .= "mblama = mbsementara = ".$mblama."\n";
							$data['proses'] .= "mdlama = mdsementara = ".$mdlama."\n";
							$mbbaru = $h->mb;
							$mdbaru = $h->md;
							$data['proses'] .= "mbbaru = ".$mbbaru."\n";
							$data['proses'] .= "mdbaru = ".$mdbaru."\n";
							$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
							$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
							$data['proses'] .= "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."\n";
							$data['proses'] .= "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."\n";
							//jika ini adalah gejala terakhir berarti CF ketemu
							if ($jml == $i)
							{
								$mb = $mbsementara;
								$md = $mdsementara;
								$cf = $mb - $md;
								$data['proses'] .= "mb = mbsementara = ".$mb."\n";
								$data['proses'] .= "md = mdsementara = ".$md."\n";
								$data['proses'] .= "cf = mb - md = ".$mb." - ".$md." = ".$cf."\n\n\n";
								$daftar_cf[$c] = $cf;
								//cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
								if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
								{
									$cf_terbesar = $cf;
									$id_penyakit_terbesar = $id_penyakit;
									$nama_penyakit_terbesar = $nama_penyakit;
									$deskripsi_penyakit_terbesar = $deskripsi_penyakit;
									$solusi_penyakit_terbesar = $solusi_penyakit;
								}
							}
						}
						$i++;
					}
				}
				$c++;
			}
		}
		
		//urutkan daftar gejala berdasarkan besar CF
		for ($i = 0; $i < count($daftar_penyakit); $i++)
		{
			for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
			{
				if ($daftar_cf[$j] > $daftar_cf[$i])
				{
					$t = $daftar_cf[$i];
					$daftar_cf[$i] = $daftar_cf[$j];
					$daftar_cf[$j] = $t;
					
					$t = $daftar_penyakit[$i];
					$daftar_penyakit[$i] = $daftar_penyakit[$j];
					$daftar_penyakit[$j] = $t;
				}
			}
		}

		$data['error'] = false;
		$data['message'] = 'Berhasil mendapatkan data gejala';
		$data['proses'] .= "Penyakit dengan nilai CF terbesar = ".$nama_penyakit_terbesar."\n==================";
		$data['gejala'] = $sql1;
		$data['penyakit'] = $nama_penyakit_terbesar;
		$data['deskripsi'] = $deskripsi_penyakit_terbesar;
		$data['solusi'] = $solusi_penyakit_terbesar;
		$data['nilaicf'] = $cf_terbesar;

		$data_to_post = array(
			'user'=>$this->input->post('user'),
			'gejala'=>$sql1,
			'penyakit'=>$nama_penyakit_terbesar,
			'nilaicf'=>$cf_terbesar,
		);
		$this->load->model('model_konsultasi');
		$this->model_konsultasi->insertdata($data_to_post);
		
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
	}

	public function cf() {
		error_reporting(0);
		$inputgejala = $this->input->post('sql');
		// $inputgejala = "1_3,2_6,3_1";
		$output = explode(",",$inputgejala);
		// $output = ['1_3','2_6','3_1'];
		// parse_str($inputgejala, $output);

		$data['proses'] = '';

		$arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
		$argejala = array();
		$arkondisi = array();
		for ($i = 0; $i < count($output); $i++) {
			$arkondisi = explode("_", $output[$i]);
			if (strlen($output[$i]) > 1) {
			$argejala += array($arkondisi[0] => $arkondisi[1]);
			}
		}

		$sqlkondisi = $this->db->query("SELECT * FROM kondisi ORDER BY id+0");
		$arkondisitext = array();
		foreach ($sqlkondisi->result() as $rkondisi) {
			$arkondisitext[$rkondisi->id] = $rkondisi->kondisi;
		}

		$sqlpkt = $this->db->query("SELECT * FROM penyakit ORDER BY id_penyakit+0");
		foreach ($sqlpkt->result() as $rpkt) {
			$arpkt[$rpkt->id_penyakit] = $rpkt->nama_penyakit;
			$ardpkt[$rpkt->id_penyakit] = $rpkt->deskripsi;
			$arspkt[$rpkt->id_penyakit] = $rpkt->solusi;
		}

		//print_r($arkondisitext);
		// -------- perhitungan certainty factor (CF) ---------
		// --------------------- START ------------------------
		$sqlpenyakit = $this->db->query("SELECT * FROM penyakit ORDER BY id_penyakit");
		$arpenyakit = array();
		foreach ($sqlpenyakit->result() as $rpenyakit) {
			$cftotal_temp = 0;
			$cf = 0;
			$sqlgejala = $this->db->query("SELECT * FROM pengetahuan WHERE id_penyakit=$rpenyakit->id_penyakit");
			$cflama = 0;
			foreach ($sqlgejala->result() as $rgejala) {
				$arkondisi = explode("_", $output[0]);
				$gejala = $arkondisi[0];

				for ($i = 0; $i < count($output); $i++) {
					$arkondisi = explode("_", $output[$i]);
					$gejala = $arkondisi[0];
					if ($rgejala->id_gejala == $gejala) {
						$cf = ($rgejala->mb - $rgejala->md) * $arbobot[$arkondisi[1]];
						if (($cf >= 0) && ($cf * $cflama >= 0)) {
							$cflama = $cflama + ($cf * (1 - $cflama));
						}
						if ($cf * $cflama < 0) {
							// $cflama = ($cflama + $cf) / (1 - Min(abs($cflama), abs($cf)));
							$cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
						}
						if (($cf < 0) && ($cf * $cflama >= 0)) {
							$cflama = $cflama + ($cf * (1 + $cflama));
						}
					}
				}
			}
			if ($cflama > 0) {
				$arpenyakit += array($rpenyakit->id_penyakit => number_format($cflama, 4));
			}
		}

		arsort($arpenyakit);

		$np1 = 0;
		foreach ($arpenyakit as $key1 => $value1) {
			$np1++;
			$idpkt1[$np1] = $key1;
			$vlpkt1[$np1] = $value1;
		}
		// --------------------- END -------------------------

		$data['proses'] .= "Hasil Diagnosis\nGejala yang dialami (keluhan)\n";
		$ig = 0;
		$argejalan = array();
		foreach ($argejala as $key => $value) {
			$kondisi = $value;
			$ig++;
			$gejala = $key;
			$sql4 = $this->db->query("SELECT * FROM gejala where id_gejala = '$key'");
			$r4 = $sql4->row();
			$data['proses'] .= '' . $r4->nama_gejala. "\n";
			$data['proses'] .= '' . $arkondisitext[$kondisi] . "\n";
			
			$argejalan[]=$r4->nama_gejala;
		}
		$np = 0;
		foreach ($arpenyakit as $key => $value) {
			$np++;
			$idpkt[$np] = $key;
			$nmpkt[$np] = $arpkt[$key];
			$vlpkt[$np] = $value;
		}
		$data['proses'] .= "\nHasil Diagnosa\n";
		$data['proses'] .= "Jenis penyakit yang diderita adalah" . $nmpkt[1] . " / " . round($vlpkt[1], 2) . " % (" . $vlpkt[1] . ")\n";
		$data['proses'] .= "Detail\n";
		$data['proses'] .= $ardpkt[$idpkt[1]];
		$data['proses'] .= "Saran\n";
		$data['proses'] .= $arspkt[$idpkt[1]];
		$data['proses'] .= "Kemungkinan lain:\n";
		for ($ipl = 2; $ipl < count($idpkt); $ipl++) {
			$data['proses'] .= "" . $nmpkt[$ipl] . " / " . round($vlpkt[$ipl], 2) . " % (" . $vlpkt[$ipl] . ")\n\n";
		}

		// str_replace("'", "", implode(",",$argejalan));
		// $nmpkt[1];$vlpkt[1];
		
		$data['error'] = false;
		$data['message'] = 'Berhasil mendapatkan data gejala';
		$data['proses'] .= "Penyakit dengan nilai CF terbesar = ".$nmpkt[1]."\n==================";
		$data['gejala'] = str_replace("'", "", implode(",",$argejalan));
		$data['penyakit'] = $nmpkt[1];
		$data['deskripsi'] = $ardpkt[$idpkt[1]];
		$data['solusi'] = $arspkt[$idpkt[1]];
		$data['nilaicf'] = $vlpkt[1];
		// $data['ps'] = $output;

		$data_to_post = array(
			'user'=>$this->input->post('user'),
			'gejala'=>str_replace("'", "", implode(",",$argejalan)),
			'penyakit'=>$nmpkt[1],
			'nilaicf'=>$vlpkt[1],
		);
		$this->load->model('model_konsultasi');
		$this->model_konsultasi->insertdata($data_to_post);
		
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
		
	}
    
}
