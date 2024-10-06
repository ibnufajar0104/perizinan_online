<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	protected $url = 'login';
	private $recaptcha_secret;
	public function __construct()
	{
		parent::__construct();
		$this->recaptcha_secret = '6LfrUFkqAAAAAJfH8Rk_WAL7RcZobt9ssqGweLU5'; // Ganti dengan secret key reCAPTCHA Anda
		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{

		if ($this->session->logged) {
			redirect('permohonan');
		}

		$data['title'] = 'Login';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/view', $data);
	}

	public function form()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			fail('Form tidak lengkap');
		}

		// Ambil token reCAPTCHA dari form
		$recaptchaResponse = $this->input->post('g-recaptcha-response');

		// Validasi reCAPTCHA dengan Google API menggunakan $this->recaptcha_secret
		$secretKey = $this->recaptcha_secret;
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
		$responseKeys = json_decode($response, true);

		// Tentukan threshold score minimal (misalnya: 0.5)
		$threshold = 0.5;

		// Periksa apakah validasi reCAPTCHA berhasil dan score memenuhi threshold
		if (!$responseKeys['success'] || $responseKeys['score'] < $threshold) {
			fail('Validasi reCAPTCHA gagal atau dianggap mencurigakan. Harap coba lagi.');
		}

		// Jika reCAPTCHA valid, lanjutkan ke logika form login
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];

		$token = $this->jwt->get_token();

		$response = $this->jwt->request(ip() . 'permohonan/login', 'POST', json_encode($data), $token);

		if (!$response['status']) {
			fail();
		}

		$newdata = array(
			'logged' => true,
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
		return_json($response);
	}
}
