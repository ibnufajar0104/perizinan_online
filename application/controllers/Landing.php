<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	protected $url = 'landing';
	private $recaptcha_secret;


	public function __construct()
	{
		parent::__construct();

		// Set secret key reCAPTCHA
		$this->recaptcha_secret = '6LfrUFkqAAAAAJfH8Rk_WAL7RcZobt9ssqGweLU5'; // Ganti dengan secret key reCAPTCHA Anda
		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{
		$this->load->view($this->url . '/view', []);
	}





	// Fungsi untuk memverifikasi token reCAPTCHA
	private function verify_recaptcha($recaptcha_response)
	{
		// Jika pengembangan di localhost, skip verifikasi reCAPTCHA

		// Mengirimkan permintaan verifikasi ke API Google reCAPTCHA
		$verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$this->recaptcha_secret}&response=$recaptcha_response");
		return json_decode($verify_response);
	}

	public function get_izin()
	{
		// Mendapatkan token reCAPTCHA dari permintaan POST
		$recaptcha_response = $this->input->get('g-recaptcha-response');

		// Verifikasi reCAPTCHA
		$response_data = $this->verify_recaptcha($recaptcha_response);

		// Cek apakah verifikasi reCAPTCHA berhasil
		if ($response_data->success && $response_data->score >= 0.5) {
			// Jika reCAPTCHA valid, lanjutkan proses mendapatkan data izin
			$token = $this->jwt->get_token();

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

			// Mengembalikan data izin dalam format JSON
			echo json_encode($data, true);
		} else {
			// Jika verifikasi reCAPTCHA gagal
			echo json_encode(['error' => 'Verifikasi reCAPTCHA gagal.']);
		}
	}

	public function get_permohonan()
	{
		// Mendapatkan token reCAPTCHA dari permintaan POST
		$recaptcha_response = $this->input->post('g-recaptcha-response');

		// Verifikasi reCAPTCHA
		$response_data = $this->verify_recaptcha($recaptcha_response);

		// Cek apakah verifikasi reCAPTCHA berhasil
		if ($response_data->success && $response_data->score >= 0.5) {
			// Jika reCAPTCHA valid, lanjutkan proses untuk mendapatkan permohonan
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

			// Mengembalikan data permohonan dalam format JSON
			echo json_encode($data, true);
		} else {
			// Jika verifikasi reCAPTCHA gagal
			echo json_encode(['error' => 'Verifikasi reCAPTCHA gagal.']);
		}
	}

	public function get_persyaratan()
	{
		// Ambil token reCAPTCHA dari form
		$recaptchaResponse = $this->input->post('g-recaptcha-response');

		// Validasi reCAPTCHA dengan Google API menggunakan $this->recaptcha_secret
		$secretKey = $this->recaptcha_secret;
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
		$responseKeys = json_decode($response, true);

		// Tentukan threshold score minimal (contoh: 0.5)
		$threshold = 0.5;

		// Periksa apakah validasi reCAPTCHA berhasil dan score memenuhi threshold
		if (!$responseKeys['success'] || $responseKeys['score'] < $threshold) {
			echo '<p>reCAPTCHA gagal divalidasi atau dianggap mencurigakan. Harap coba lagi.</p>';
			die();
		}

		// Jika reCAPTCHA valid dan score cukup tinggi, lanjutkan ke logika permohonan
		$d = ['tblizinpermohonan_id' => $this->input->post('permohonan')];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/perizinan/get_persyaratan', 'POST', json_encode($d), $token);

		if (!isset($response['data'])) {
			echo '<p>Persyaratan belum di set untuk permohonan tersebut</p>';
			die();
		}

		$this->load->view('landing/persyaratan', ['rows' => $response['data']]);
	}

	public function permohonan_by_no_pendaftaran()
	{
		// Ambil token reCAPTCHA dari form
		$recaptchaResponse = $this->input->post('g-recaptcha-response');

		// Validasi reCAPTCHA dengan Google API menggunakan $this->recaptcha_secret
		$secretKey = $this->recaptcha_secret;
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
		$responseKeys = json_decode($response, true);

		// Tentukan threshold score minimal (contoh: 0.5)
		$threshold = 0.5;

		// Periksa apakah validasi reCAPTCHA berhasil dan score memenuhi threshold
		if (!$responseKeys['success'] || $responseKeys['score'] < $threshold) {
			echo '<p>reCAPTCHA gagal divalidasi atau dianggap mencurigakan. Harap coba lagi.</p>';
			die();
		}

		// Jika reCAPTCHA valid dan score cukup tinggi, lanjutkan ke logika permohonan
		$d = ['tblizinpendaftaran_nomor' => $this->input->post('noPendaftaran')];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/pendaftaran_by_nomor', 'POST', json_encode($d), $token);

		if (!isset($response['data'])) {
			echo '<p>Nomor pendaftaran tidak ditemukan harap periksa kembali nomor pendaftaran anda</p>';
			die();
		}

		$this->load->view('landing/statusPermohonan', ['r' => $response['data']['pendaftaran'], 'log' => $response['data']['log']]);
	}
}
