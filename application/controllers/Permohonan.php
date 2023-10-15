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
		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$endpoint = ip() . 'pendaftaran/permohonan';
		$data = array();
		foreach ($this->allowedFields as $r) {
			$data[$r] = $this->input->post($r, true);
		}

		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;

		$per = $this->get_persyaratan($data['tblizinpermohonan_id']);

		foreach ($per as $r) {
			$file = $this->upload($r['tblpersyaratan_id']);
			if ($file) {
				$data[$r['tblpersyaratan_id']] = new CURLFILE('tmp/' . $file);
			}
		}

		$response = $this->sendPostRequest($endpoint, $data, $token['token']);

		if (isset($response['status'])) {
			if ($response['status']) {

				$this->session->set_flashdata('success', 'Permohonan berhasil diajukan');
				redirect('permohonan');
			} else {

				$this->session->set_flashdata('error', 'Maaf terjadi kesalahan');
				redirect('permohonan');
			}
		} else {
			$this->session->set_flashdata('error', 'Maaf terjadi kesalahan');
			redirect('permohonan');
		}
	}


	private function upload($str)
	{

		$targetDirectory = "tmp/"; // Direktori penyimpanan file
		$file_name = $_FILES[$str]['name'];
		$file_tmp = $_FILES[$str]['tmp_name'];
		$file_size = $_FILES[$str]['size'];

		// Periksa apakah file ada
		if (is_uploaded_file($file_tmp)) {
			$targetFile = $targetDirectory . basename($file_name);

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
			if (move_uploaded_file($file_tmp, $targetFile)) {
				return $file_name;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function permohonan_by_id_pemohon()
	{

		$endpoint = 'pendaftaran/get_by_pemohon';
		$data = array();


		$data['tblpemohon_id'] = $this->session->tblpemohon_id;



		$row = $this->reg($endpoint, $data);

		if (isset($row['data'])) {
			return $row['data'];
		}

		return [];
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

	public function get_persyaratan($id)
	{



		$endpoint = 'perizinan/daftar_persyaratan';
		$data['tblizinpermohonan_id'] = $id;

		$row = $this->reg($endpoint, $data);

		return $row['data'];
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

	public function sendPostRequest($url, $postData, $token)
	{
		$curl = curl_init();
		$headers = array(
			'Authorization: Bearer ' . $token, // Use the dynamic token here
		);
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $postData,
			CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);

		curl_close($curl);


		$row = json_decode($response, true);
		return $row;
	}

	// private function reg2($apiEndpoint, $postData)
	// {
	// 	$token = $this->jwt->get_token();
	// 	if (!$token) {
	// 		$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
	// 		echo json_encode($res, true);
	// 		die();
	// 	}

	// 	$curl = curl_init();

	// 	$url = ip() . $apiEndpoint;

	// 	curl_setopt_array($curl, array(

	// 		CURLOPT_URL => $url,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_ENCODING => '',
	// 		CURLOPT_MAXREDIRS => 10,
	// 		CURLOPT_TIMEOUT => 0,
	// 		CURLOPT_FOLLOWLOCATION => true,
	// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 		CURLOPT_CUSTOMREQUEST => 'POST',
	// 		CURLOPT_POSTFIELDS => $postData,

	// 		CURLOPT_HTTPHEADER => array(
	// 			'Content-Type: application/json',
	// 			'Authorization: Bearer ' . $token['token']
	// 		),
	// 	));

	// 	$response = curl_exec($curl);

	// 	curl_close($curl);

	// 	$row = json_decode($response, true);
	// 	return $row;
	// }
}
