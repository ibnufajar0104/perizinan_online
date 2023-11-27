<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{

	protected $url = 'lupa_password';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{

		$data['title'] = 'Form lupa password';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/view', $data);
	}

	public function otp()
	{


		if (!$this->session->number) {
			redirect('lupa_password');
		}

		$data['title'] = 'Kode OTP';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/otp', $data);
	}


	public function ganti_password()
	{
		if (!$this->session->otp) {
			redirect('lupa_password');
		}

		$data['title'] = 'Ganti Password';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/password', $data);
	}

	public function kirim_otp()
	{
		$arr = ['tblpemohon_telpon'];
		$token = $this->jwt->get_token();

		foreach ($arr as $r) {
			$d[$r] = $this->input->post($r, true);
		}


		$response = $this->jwt->request(ip() . 'permohonan/kirim_otp', 'POST', json_encode($d), $token);
		if (isset($response['status'])) {

			$newdata = array(
				'tblpengguna_id' => $response['tblpengguna_id'],
				'number' =>  $this->input->post('tblpemohon_telpon', true),
			);

			$this->session->set_userdata($newdata);
			return_json($response);
		}

		fail();
	}

	public function verifikasi_otp()
	{
		$arr = ['number', 'otp'];
		$token = $this->jwt->get_token();

		foreach ($arr as $r) {
			$d[$r] = $this->input->post($r, true);
		}


		$response = $this->jwt->request(ip() . 'permohonan/verifikasi_otp', 'POST', json_encode($d), $token);
		if (isset($response['status'])) {
			$newdata = array(
				'otp' =>  $this->input->post('otp', true),
			);

			$this->session->set_userdata($newdata);

			if (isset($response['status'])) {
				$this->session->unset_userdata('number');
			}

			return_json($response);
		}

		fail();
	}

	public function ganti_password_form()
	{
		$arr = ['password', 'konfirmasi', 'tblpengguna_id'];
		$token = $this->jwt->get_token();

		foreach ($arr as $r) {
			$d[$r] = $this->input->post($r, true);
		}


		$response = $this->jwt->request(ip() . 'permohonan/ganti_password', 'POST', json_encode($d), $token);
		if (isset($response['status'])) {

			if ($response['status']) {
				$this->session->unset_userdata('otp');
			}
			return_json($response);
		}

		fail();
	}
}
