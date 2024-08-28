<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{

	protected $allowedFields  = [
		'tblizin_id',
		'tblizinpermohonan_id',
		'tblizinpendaftaran_usaha',
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
		$data = [
			'title' => 'Permohonan',
			'permohonan' => $this->permohonan_by_id_pemohon()
		];
		$this->load->view('permohonan/view', $data);
	}



	public function riwayat()
	{
		$d['tblpemohon_id'] = $this->session->tblpemohon_id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/riwayat', 'POST', json_encode($d), $token);

		$r = isset($response['data']) ? $response['data'] : [];

		$data = [
			'riwayat' => $r,
			'title' => 'Riwayat Permohonan',
			'js' => 'permohonan/js'
		];

		$this->load->view('permohonan/riwayat', $data);
	}

	public function edit($id)
	{
		$row = $this->permohonan_by_id($id);
		$r = isset($row['pendaftaran']) ? $row['pendaftaran'] : [];

		$data = [
			'title' => 'Form Permohonan',
			'izin' => $this->get_izin(),
			'kecamatan' => $this->get_kecamatan(),
			'js' => 'permohonan/js',
			'p' => $r
		];

		$this->load->view('permohonan/form_edit', $data);
	}

	public function detail($id)
	{
		$row = $this->permohonan_by_id($id);
		$r = isset($row['pendaftaran']) ? $row['pendaftaran'] : [];
		$log = isset($row['log']) ? $row['log'] : [];

		$data = [
			'title' => 'Detail Permohonan',
			'js' => 'permohonan/js',
			'r' => $r,
			'log' => $log
		];

		$this->load->view('permohonan/detail', $data);
	}

	public function get_token()
	{
		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}
		return $token['token'];
	}



	public function get_izin()
	{
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_izin', 'GET', null, $token);
		return $response['data'];
	}

	public function get_kecamatan()
	{
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_kecamatan', 'GET', null, $token);
		return $response['data'];
	}

	public function get_kelurahan()
	{
		$d['id_kecamatan'] = $this->input->post('id_kecamatan', true);
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_kelurahan', 'POST', json_encode($d), $token);
		return_json($response);
	}

	public function get_permohonan()
	{
		$token = $this->jwt->get_token();
		$d['tblizin_id'] = $this->input->post('tblizin_id', true);


		$response = $this->jwt->request(ip() . 'perizinan/get_permohonan', 'POST', json_encode($d), $token);
		echo json_encode($response);
	}

	public function informasiUmum($idPendaftaran = null)
	{


		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/informasiUmum/js',
			'izin' => $this->get_izin(),
			'kecamatan' => $this->get_kecamatan(),
			'idPendaftaran' => $idPendaftaran,

		];

		$this->load->view('permohonan/informasiUmum/view', $data);
	}

	public function getPendaftaran()
	{

		$idPendaftaran = $this->input->get('id');
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran,
			'include_logs' => false
		];



		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/permohonan/get_by_id_pendaftaran', 'POST', json_encode($d), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		return_json($response);
	}

	public function actionsInformasiUmum()
	{

		$idPendaftaran  = $this->input->post('tblizinpendaftaran_id');
		$d['tblpengguna_id'] = $this->session->id;
		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_pemohon', 'POST', json_encode($d), $token);

		// Mengambil data dari respons
		$r = isset($response['data']) ? $response['data'] : [];

		// Membuat array PHP berdasarkan data dari API
		$data = [
			'tblpemohon_id' => isset($this->session->tblpemohon_id) ? $this->session->tblpemohon_id : '',
			'tblpengguna_id' => isset($this->session->id) ? $this->session->id : '',
			'tblizinpendaftaran_idpemohon' => isset($r['tblpemohon_noidentitas']) ? $r['tblpemohon_noidentitas'] : '',
			'tblizinpendaftaran_namapemohon' => isset($r['tblpemohon_nama']) ? $r['tblpemohon_nama'] : '',
			'tblizinpendaftaran_almtpemohon' => isset($r['tblpemohon_alamat']) ? $r['tblpemohon_alamat'] : '',
			'tblizinpendaftaran_telponpemohon' => isset($r['tblpemohon_telpon']) ? $r['tblpemohon_telpon'] : '',
			'tblizinpendaftaran_npwp' => isset($r['tblpemohon_npwp']) ? $r['tblpemohon_npwp'] : '',
		];

		// Menggabungkan data dari POST dengan data dari API
		foreach ($this->allowedFields as $field) {
			$data[$field] = $this->input->post($field, true);
		}

		// Menambahkan data tambahan
		$data['status_online'] = 5;
		$data['tblizinpendaftaran_id'] = $idPendaftaran;

		$token = $this->jwt->get_token();
		$actionUrl = $idPendaftaran ? 'updateInformasiUmum' : 'insertInformasiUmum';

		$response = $this->jwt->request(ip() . 'permohonan/' . $actionUrl, 'POST', json_encode($data), $token);
		return_json($response);
		if (isset($response['status'])) {
			return_json($response);
		} else {
			fail('Maaf, terjadi kesalahan');
		}
	}


	public function berkasPersyaratan($idPendaftaran)
	{
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran
		];

		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/permohonan/get_by_id_pendaftaran', 'POST', json_encode($d), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$data = [
			'id_permohonan' => $response['data']['pendaftaran']['tblizinpermohonan_id'],
			'id_pemohon' => $response['data']['pendaftaran']['tblpemohon_id'],
			'id_pendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}


		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/BerkasPersyaratan/js',
			'row' => $response['data'],
			'idPendaftaran' => $idPendaftaran
		];

		$this->load->view('permohonan/berkasPersyaratan/view', $data);
	}

	public function update_pengajuan()
	{
		$data = [];
		foreach ($this->allowedFields as $field) {
			$data[$field] = $this->input->post($field, true);
		}

		$data['tblizinpendaftaran_id'] = $this->input->post('tblizinpendaftaran_id');
		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;

		$persyaratan = $this->get_persyaratan_by_id_permohonan($data['tblizinpermohonan_id']);
		if (!$persyaratan) {
			die();
		}

		foreach ($persyaratan as $requirement) {
			$file = $this->upload($requirement['tblpersyaratan_id']);
			if ($file) {
				$data[$requirement['tblpersyaratan_id']] = new CURLFILE('tmp/' . $file);
			}
		}

		$token =	$token = $this->jwt->get_token();
		// $response = $this->curl_request(ip() . 'permohonan/pengajuan_update', 'POST', $data, $token);

		if (isset($response['status'])) {
			if ($response['status']) {
				success('Permohonan berhasil diajukan kembali');
			} else {
				return_json($response);
			}
		} else {
			fail('Maaf, terjadi kesalahan');
		}
	}

	public function get_persyaratan()
	{
		$d = [
			'id_permohonan' => $this->input->post('id', true),
			'id_pemohon' => $this->session->tblpemohon_id,
			'id_pendaftaran' => $this->input->post('id_pendaftaran', true)
		];

		$token = $this->jwt->get_token();

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($d), $token);

		$this->load->view('permohonan/persyaratan', ['row' => $response['data']]);
	}

	private function get_persyaratan_by_id_permohonan($id)
	{
		$data = ['id_permohonan' => $id];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		return $response['status'] ? $response['data'] : false;
	}

	private function upload($field)
	{
		$uploadDir = "tmp/"; // Direktori penyimpanan file
		$fileName = $_FILES[$field]['name'];
		$fileTmp = $_FILES[$field]['tmp_name'];
		$uploadedFileName = date('YmdHis') . '_' . $fileName;
		$uploadedFile = $uploadDir . $uploadedFileName;

		// Periksa apakah file ada
		if (is_uploaded_file($fileTmp)) {
			// Jika tidak ada kesalahan, lakukan pengunggahan file
			if (move_uploaded_file($fileTmp, $uploadedFile)) {
				return $uploadedFileName;
			}
		}

		return null;
	}

	public function permohonan_by_id_pemohon()
	{
		$d = ['tblpemohon_id' => $this->session->tblpemohon_id];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pemohon', 'POST', json_encode($d), $token);
		return isset($response['data']) ? $response['data'] : [];
	}

	public function permohonan_by_id($id)
	{
		$data = ['tblizinpendaftaran_id' => $id];
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pendaftaran', 'POST', json_encode($data), $token);
		return isset($response['data']) ? $response['data'] : [];
	}
}