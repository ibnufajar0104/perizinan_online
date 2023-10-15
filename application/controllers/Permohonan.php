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

		$this->load->model('M_jwt', 'jwt');
	}
	public function index()
	{
		$data['permohonan'] = $this->permohonan_by_id_pemohon();
		$this->load->view('permohonan/view', $data);
	}

	public function form()
	{
		$data['izin'] = $this->daftar_izin();
		$data['kecamatan'] = $this->daftar_kecamatan();


		$this->load->view('permohonan/form_page', $data);
	}

	public function detail($id)
	{

		$row = $this->permohonan_by_id($id);
		$data['r'] = $row['pendaftaran'];
		$data['log'] = $row['log'];

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
		$id = $this->input->post('id_kecamatan', true);
		$endpoint = 'perizinan/daftar_kelurahan';
		$data['id_kecamatan'] = $id;

		$row = $this->reg($endpoint, $data);
		echo json_encode($row, true);
	}

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

	public function pendaftaran()
	{

		$endpoint = 'pendaftaran/permohonan';
		$data = array();
		foreach ($this->allowedFields as $r) {
			$data[$r] = $this->input->post($r, true);
		}

		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;


		$row = $this->reg($endpoint, $data);
		echo json_encode($row, true);
	}

	public function permohonan_by_id_pemohon()
	{

		$endpoint = 'pendaftaran/get_by_pemohon';
		$data = array();


		$data['tblpemohon_id'] = $this->session->tblpemohon_id;



		$row = $this->reg($endpoint, $data);
		return $row['data'];
	}

	public function permohonan_by_id($id)
	{

		$endpoint = 'pendaftaran/get_by_id';
		$data = array();


		$data['tblizinpendaftaran_id'] = $id;

		$row = $this->reg($endpoint, $data);
		return $row['data'];
	}

	public function daftar_persyaratan()
	{


		$id = $this->input->post('id', true);
		$endpoint = 'perizinan/daftar_persyaratan';
		$data['tblizinpermohonan_id'] = $id;

		$row = $this->reg($endpoint, $data);





		$this->load->view('permohonan/persyaratan', array('row' => $row['data']));
	}

	private function reg($apiEndpoint, $postData)
	{
		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$curl = curl_init();

		$url = ip() . $apiEndpoint;

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($postData), // Convert the data to JSON

			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token['token']
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$row = json_decode($response, true);
		return $row;
	}
}
