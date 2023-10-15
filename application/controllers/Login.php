<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{


		$this->load->view('login');
	}

	public	function form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('error', 'Form tidak lengkap');
			redirect('login');
		}

		$token = $this->jwt->get_token();


		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'perizinan/login_publik',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',



			CURLOPT_POSTFIELDS => '{
			
			   "username" : "' . $this->input->post('username', true) . '",
			   "password" : "' . $this->input->post('password', true) . '"
		   
	    	 }',


			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Authorization: Bearer ' . $token['token']
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response, true);
		if (isset($response['status'])) {
			if ($response['status']) {
				$newdata = array(
					'status' => $response['username'],
					'id'  => $response['id'],
					'tblpemohon_id'  => $response['tblpemohon_id'],
					'no_identitas'  => $response['no_identitas'],
					'nama'  => $response['nama'],
					'telepon'  => $response['telepon'],
					'alamat'  => $response['alamat']


				);

				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', 'Akun ditemukan');
				redirect('permohonan');
			} else {

				$this->session->set_flashdata('error', 'Password atau username salah');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Maaf terjadi kesalahan');
			redirect('registrasi/form');
		}
	}
}