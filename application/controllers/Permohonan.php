<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}
	public function index()
	{
		$this->load->view('permohonan/view');
	}

	public function form()
	{
		$data['izin'] = $this->daftar_izin();


		$this->load->view('permohonan/form_page', $data);
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
}
