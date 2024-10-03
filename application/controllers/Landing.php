<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	protected $url = 'landing';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{
		$this->load->view($this->url . '/view', []);
	}


	public function permohonan_by_no_pendaftaran()
	{
		$d = ['tblizinpendaftaran_nomor' => $this->input->post('noPendaftaran')];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/pendaftaran_by_nomor', 'POST', json_encode($d), $token);

		if (!isset($response['data'])) {
			echo '<p>Nomor pendaftaran tidak ditemukan harap periksa kembali nomor pendaftaran anda</p>';
			die();
		}

		$this->load->view('landing/statusPermohonan', ['r' => $response['data']['pendaftaran'], 'log' => $response['data']['log']]);
	}


	public function get_izin()
	{
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_izin', 'GET', null, $token);

		$data = [];
		if ($response['status']) {
			$rows = $response['data'];
			foreach ($rows as $row) {
				$data[] = [
					'key' => $row['tblizin_id'],
					'value' => $row['tblizin_nama']
				];
			}
		}

		echo json_encode($data, true);
	}

	public function get_permohonan()
	{
		$token = $this->jwt->get_token();
		$d['tblizin_id'] = $this->input->post('izin', true);
		$response = $this->jwt->request(ip() . 'perizinan/get_permohonan', 'POST', json_encode($d), $token);
		$data = [];
		if ($response['status']) {
			$rows = $response['data'];
			foreach ($rows as $row) {
				$data[] = [
					'key' => $row['tblizinpermohonan_id'],
					'value' => $row['tblizinpermohonan_nama']
				];
			}
		}

		echo json_encode($data, true);
	}
}
