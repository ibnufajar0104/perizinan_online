<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	protected $url = 'registrasi';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{
		$data['title'] = 'Cek Pendaftaran';
		$data['js'] = $this->url . '/js';
		$this->load->view($this->url . '/view', $data);
	}



	public function form()
	{

		if (!$this->session->cek) {
			$this->session->set_flashdata('error', 'Lakukan pengecekan terlebih dahulu');
			redirect('registrasi');
		}

		$this->load->view('registrasi_form');
	}

	public function cek()
	{
		if ($this->input->post('jenis') == 1 && $this->input->post('tblpemohon_npwp') == '') {
			fail('Tolong isi NPWP');
		}

		if ($this->input->post('jenis') == 2 && $this->input->post('tblpemohon_noidentitas') == '') {
			fail('Tolong isi NIK');
		}

		$token = $this->jwt->get_token();
		$d['jenis'] = $this->input->post('jenis');
		$d['tblpemohon_noidentitas'] =  $this->input->post('tblpemohon_noidentitas');
		$d['tblpemohon_npwp'] =  $this->input->post('tblpemohon_npwp');


		$response = $this->jwt->request(ip() . 'permohonan/cek_pernah_daftar', 'POST', json_encode($d), $token);

		if (isset($response['status'])) {
			if ($response['status']) {
				$newdata = array(
					'cek' => true,
					'username'  => $response['username']
				);

				$this->session->set_userdata($newdata);
			}

			return_json($response);
		}


		$newdata = array(
			'cek' => false,
		);

		$this->session->set_userdata($newdata);
		fail();
	}


	public function daftar()
	{
		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'pendaftaran/daftar_akun',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',

			CURLOPT_POSTFIELDS => '{
				"tblpemohon_nama": "' . $this->input->post('tblpemohon_nama') . '",
				 "tblpemohon_alamat": "' . $this->input->post('tblpemohon_alamat') . '",
				 "tblpemohon_npwp": "",
				 "tblpemohon_telpon": "' . $this->input->post('tblpemohon_telpon') . '",
				 "tblpemohon_email": "' . $this->input->post('tblpemohon_email') . '",
				 "tblpemohon_noidentitas" : "' . $this->input->post('tblpemohon_noidentitas') . '",
				 "username" : "' . $this->input->post('username') . '",
				 "tblpengguna_password" : "' . $this->input->post('tblpengguna_password') . '"

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
				// $this->session->sess_destroy();
				$this->session->set_flashdata('success', 'Berhasil mendaftar, silahkan melakukan login untuk memulai sesi');
				redirect('login');
			} else {

				$this->session->set_flashdata('error', 'Maaf terjadi kesalahan');
				redirect('registrasi/form');
			}
		} else {
			$this->session->set_flashdata('error', 'Maaf terjadi kesalahan');
			redirect('registrasi/form');
		}
	}
}
