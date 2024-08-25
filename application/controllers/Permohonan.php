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
		$data = [
			'title' => 'Permohonan',
			'permohonan' => $this->permohonan_by_id_pemohon()
		];
		$this->load->view('permohonan/view', $data);
	}

	public function form()
	{
		$d['tblpengguna_id'] = $this->session->id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_pemohon', 'POST', json_encode($d), $token);

		$r = isset($response['data']) ? $response['data'] : [];

		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/js',
			'row' => $r,
			'izin' => $this->get_izin(),
			'kecamatan' => $this->get_kecamatan()
		];

		$this->load->view('permohonan/form_page', $data);
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

	private function curl_request($url, $method = 'GET', $data = null, $token = null)
	{
		$curl = curl_init();

		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
		);

		if ($method === 'POST') {
			$options[CURLOPT_POSTFIELDS] = $data;
		}

		if ($token) {
			$options[CURLOPT_HTTPHEADER] = array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token
			);
		}

		curl_setopt_array($curl, $options);

		$response = curl_exec($curl);
		curl_close($curl);

		return json_decode($response, true);
	}

	public function get_izin()
	{
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'perizinan/get_izin', 'GET', null, $token);

		return $response['data'];
	}

	public function get_kecamatan()
	{
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'perizinan/get_kecamatan', 'GET', null, $token);
		return $response['data'];
	}

	public function get_kelurahan()
	{
		$data['id_kecamatan'] = $this->input->post('id_kecamatan', true);
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'perizinan/get_kelurahan', 'POST', json_encode($data), $token);
		return_json($response);
	}

	public function get_permohonan()
	{
		$token = $this->get_token();
		$izin = $this->input->post('tblizin_id', true);

		$data = json_encode(array("tblizin_id" => $izin));
		$response = $this->curl_request(ip() . 'perizinan/get_permohonan', 'POST', $data, $token);

		echo json_encode($response);
	}



	public function pengajuan()
	{
		$data = [];
		foreach ($this->asllowedField as $field) {
			$data[$field] = $this->input->post($field, true);
		}

		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 0;

		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/pengajuan', 'POST', $data, $token);

		if (isset($response['status'])) {
			if ($response['status']) {
				success('Permohonan berhasil diajukan');
			} else {
				return_json($response);
			}
		} else {
			fail('Maaf, terjadi kesalahan');
		}
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

		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/pengajuan_update', 'POST', $data, $token);

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
		$data = [
			'id_permohonan' => $this->input->post('id', true),
			'id_pemohon' => $this->session->tblpemohon_id,
			'id_pendaftaran' => $this->input->post('id_pendaftaran', true)
		];

		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		$this->load->view('permohonan/persyaratan', ['row' => $response['data']]);
	}

	private function get_persyaratan_by_id_permohonan($id)
	{
		$data = ['id_permohonan' => $id];
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

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
		$data = ['tblpemohon_id' => $this->session->tblpemohon_id];
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/get_by_id_pemohon', 'POST', json_encode($data), $token);

		return isset($response['data']) ? $response['data'] : [];
	}

	public function permohonan_by_id($id)
	{
		$data = ['tblizinpendaftaran_id' => $id];
		$token = $this->get_token();
		$response = $this->curl_request(ip() . 'permohonan/get_by_id_pendaftaran', 'POST', json_encode($data), $token);

		return isset($response['data']) ? $response['data'] : [];
	}
}