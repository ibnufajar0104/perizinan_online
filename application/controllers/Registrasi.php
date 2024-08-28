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

		$data['title'] = 'Registrasi';
		$data['js'] = 'registrasi_form/js';
		$this->load->view('registrasi_form/view', $data);
	}

	public function cek()
	{
		$jenis = $this->input->post('jenis');
		$npwp = $this->input->post('tblpemohon_npwp');
		$noidentitas = $this->input->post('tblpemohon_noidentitas');

		if ($jenis == 1 && empty($npwp)) {
			fail('Tolong isi NPWP');
		}

		if ($jenis == 2 && empty($noidentitas)) {
			fail('Tolong isi NIK');
		}


		$d = [
			'jenis' => $jenis,
			'tblpemohon_noidentitas' => $noidentitas,
			'tblpemohon_npwp' => str_replace(['.', '-'], '', $npwp)
		];

		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/cek_pernah_daftar', 'POST', json_encode($d), $token);

		if (isset($response['status'])) {
			if ($response['status']) {
				$newdata = [
					'cek' => true,
					'jenis' => $jenis,
					'username' => $response['username']
				];
				$this->session->set_userdata($newdata);
			}
			return_json($response);
		}

		$newdata = [
			'cek' => false,
		];

		$this->session->set_userdata($newdata);
		fail();
	}

	public function daftar()
	{
		$fields = [
			'tblpemohon_nama',
			'tblpemohon_alamat',
			'tblpemohon_npwp',
			'tblpemohon_telpon',
			'tblpemohon_email',
			'tblpemohon_noidentitas',
			'username',
			'tblpengguna_password'
		];

		$d = [];
		foreach ($fields as $field) {
			$d[$field] = $this->input->post($field, true);
		}

		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/daftar_akun', 'POST', json_encode($d), $token);


		if (isset($response['status'])) {
			$this->session->unset_userdata('cek');
			return_json($response);
		}

		fail();
	}
}
