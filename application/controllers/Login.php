<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	protected $url = 'login';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{

		$data['title'] = 'Login';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/view', $data);
	}

	public	function form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {

			fail('Form tidak lengkap');
		}

		$token = $this->jwt->get_token();
		$d['username'] = $this->input->post('username');
		$d['password'] =  $this->input->post('password');


		$response = $this->jwt->request(ip() . 'permohonan/login', 'POST', json_encode($d), $token);

		if (isset($response['status'])) {
			if ($response['status']) {

				$newdata = array(
					'login' => true,
					'id' =>  $response['id'],
					'nama' =>  $response['nama'],
					'tblpemohon_id' => $response['tblpemohon_id'],
					'no_identitas' => $response['no_identitas'],
					'alamat' => $response['alamat'],
					'telepon' => $response['telepon'],
					'email' => $response['email'],
					'npwp' => $response['npwp'],
				);

				$this->session->set_userdata($newdata);
			}

			return_json($response);
		}

		fail();
	}
}