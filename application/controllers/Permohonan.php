<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{

	protected $allowedFields  = [
		'tblizin_id',
		'tblpemohon_id',
		'tblizinpermohonan_id',
		'tblizinpendaftaran_namapemohon',
		'tblizinpendaftaran_usaha',
		'tblizinpendaftaran_idpemohon',
		'tblizinpendaftaran_npwp',
		'tblizinpendaftaran_almtpemohon',
		'tblizinpendaftaran_telponpemohon',
		'tblizinpendaftaran_lokasiizin',
		'tblkecamatan_id',
		'tblkelurahan_id',
		'tblizinpendaftaran_keterangan'
	];

	public function __construct()
	{
		parent::__construct();
		login_required();
		$this->load->model('M_jwt', 'jwt');
	}
	public function index()
	{
		$data['title'] = 'Permohonan';
		$data['permohonan'] = $this->permohonan_by_id_pemohon();
		$this->load->view('permohonan/view', $data);
	}

	public function form()
	{
		$d['tblpengguna_id'] = $this->session->id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_pemohon', 'POST', json_encode($d), $token);

		$r = [];
		if (isset($response)) {
			if ($response['data']) {
				$r = $response['data'];
			}
		}

		$data['title'] = 'Form Permohonan';
		$data['js'] =  'permohonan/js';
		$data['row'] = $r;
		$data['izin'] = $this->daftar_izin();
		$data['kecamatan'] = $this->daftar_kecamatan();


		$this->load->view('permohonan/form_page', $data);
	}

	public function riwayat()
	{


		$d['tblpemohon_id'] = $this->session->tblpemohon_id;

		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/riwayat', 'POST', json_encode($d), $token);



		$r = [];
		if (isset($response['data'])) {
			$r = $response['data'];
		}
		$data['riwayat'] = $r;
		$data['title'] = 'Riwayat Permohonan';
		$data['js'] =  'permohonan/js';
		$this->load->view('permohonan/riwayat', $data);
	}




	public function edit($id)
	{
		$row =  $this->permohonan_by_id($id);
		$r = [];

		if ($row) {
			$r = $row['pendaftaran'];
		}
		$data['title'] = 'Form Permohonan';
		$data['izin'] = $this->daftar_izin();
		$data['kecamatan'] = $this->daftar_kecamatan();
		$data['js'] =  'permohonan/js';
		$data['p'] = $r;
		$this->load->view('permohonan/form_edit', $data);
	}

	public function detail($id)
	{
		$row = $this->permohonan_by_id($id);
		$r = [];
		$log = [];

		if ($row) {
			$r = $row['pendaftaran'];
			$log = $row['log'];
		}

		$data['title'] = 'Detail Permohonan';
		$data['js'] =  'permohonan/js';
		$data['r'] = $r;
		$data['log'] = $log;

		$this->load->view('permohonan/detail', $data);
	}

	public function daftar_izin()
	{



		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'perizinan/daftar_izin',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token['token']
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$row =  json_decode($response, true);
		return $row['data'];
	}

	public function daftar_kecamatan()
	{



		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'perizinan/daftar_kecamatan',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token['token']
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$row =  json_decode($response, true);
		return $row['data'];
	}


	public function daftar_kelurahan()
	{

		$data['id_kecamatan'] = $this->input->post('id_kecamatan', true);

		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/daftar_kelurahan', 'POST', json_encode($data), $token);

		return_json($response);
	}

	// daftar jenis permohonan
	public function daftar_permohonan()
	{



		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$izin = $this->input->post('tblizin_id', true);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'perizinan/daftar_permohonan',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',

			CURLOPT_POSTFIELDS => '{
            "tblizin_id" : "' . $izin . '"
            }',


			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token['token']
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$row =  json_decode($response, true);
		echo json_encode($row);
	}

	public function pengajuan()
	{

		$data = array();
		foreach ($this->allowedFields as $r) {
			$data[$r] = $this->input->post($r, true);
		}

		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;

		$persyaratan = $this->get_persyaratan_by_id_permohonan($data['tblizinpermohonan_id']);
		if (!$persyaratan) {
			die();
		}

		foreach ($persyaratan as $r) {
			$file = $this->upload($r['tblpersyaratan_id']);
			if ($file) {
				$data[$r['tblpersyaratan_id']] = new CURLFILE('tmp/' . $file);
			}
		}

		$token = $this->jwt->get_token();
		$response = $this->jwt->pos_request(ip() . 'permohonan/pengajuan', $data, $token);

		if (isset($response['status'])) {

			if ($response['status']) {
				success('Permohonan berhasil diajukan');
			} else {
				return_json($response);
			}
		}

		fail('Maaf, terjadi kesalahan');
	}

	public function update_pengajuan()
	{

		$data = array();
		foreach ($this->allowedFields as $r) {
			$data[$r] = $this->input->post($r, true);
		}

		$data['tblizinpendaftaran_id'] = $this->input->post('tblizinpendaftaran_id');
		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;

		$persyaratan = $this->get_persyaratan_by_id_permohonan($data['tblizinpermohonan_id']);
		if (!$persyaratan) {
			die();
		}

		foreach ($persyaratan as $r) {
			$file = $this->upload($r['tblpersyaratan_id']);
			if ($file) {
				$data[$r['tblpersyaratan_id']] = new CURLFILE('tmp/' . $file);
			}
		}

		$token = $this->jwt->get_token();
		$response = $this->jwt->pos_request(ip() . 'permohonan/pengajuan_update', $data, $token);

		if (isset($response['status'])) {

			if ($response['status']) {
				success('Permohonan berhasil diajukan kembali');
			} else {
				return_json($response);
			}
		}

		fail('Maaf, terjadi kesalahan');
	}

	public function get_persyaratan()
	{

		$d['id_permohonan'] = $this->input->post('id', true);
		$d['id_pemohon'] = $this->session->tblpemohon_id;
		$d['id_pendaftaran'] = $this->input->post('id_pendaftaran', true);

		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($d), $token);

		$this->load->view('permohonan/persyaratan', array('row' => $response['data']));
	}

	private function get_persyaratan_by_id_permohonan($id)
	{
		$d['id_permohonan'] = $id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($d), $token);

		if ($response['status']) {
			return $response['data'];
		}

		return false;
	}

	private function upload($str)
	{

		$uploadDir = "tmp/"; // Direktori penyimpanan file
		$file_name = $_FILES[$str]['name'];
		$file_tmp = $_FILES[$str]['tmp_name'];
		$uploadedFileName = date('YmdHis') . '_' . $_FILES[$str]['name'];
		$file_size = $_FILES[$str]['size'];

		// Periksa apakah file ada
		if (is_uploaded_file($file_tmp)) {
			$uploadedFile = $uploadDir . $uploadedFileName;

			// // Batasi jenis file yang diizinkan
			// $allowedExtensions = array("jpg", "jpeg", "png", "gif");
			// $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

			// if (!in_array($fileExtension, $allowedExtensions)) {
			// 	echo "Maaf, hanya file dengan ekstensi JPG, JPEG, PNG, atau GIF yang diizinkan.";
			// }

			// // Periksa ukuran file
			// if ($file_size > 5000000) {
			// 	echo "Maaf, ukuran file terlalu besar. Maksimum 5 MB.";
			// }

			// Jika tidak ada kesalahan, lakukan pengunggahan file
			if (move_uploaded_file($file_tmp, $uploadedFile)) {
				return  $uploadedFileName;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function permohonan_by_id_pemohon()
	{

		$d['tblpemohon_id'] = $this->session->tblpemohon_id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pemohon', 'POST', json_encode($d), $token);

		if (isset($response['data'])) {
			return $response['data'];
		}

		return [];
	}

	public function permohonan_by_id($id)
	{
		$data = array();
		$data['tblizinpendaftaran_id'] = $id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pendaftaran', 'POST', json_encode($data), $token);

		if (isset($response['data'])) {
			return $response['data'];
		}

		return [];
	}
}