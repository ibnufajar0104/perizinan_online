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
		$data['js'] =  'registrasi_form/js';
		$this->load->view('registrasi_form/view', $data);
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

		$arr = ['tblpemohon_nama', 'tblpemohon_alamat', 'tblpemohon_npwp', 'tblpemohon_telpon', 'tblpemohon_email', 'tblpemohon_noidentitas', 'username', 'tblpengguna_password'];
		$token = $this->jwt->get_token();

		foreach ($arr as $r) {
			$d[$r] = $this->input->post($r, true);
		}


		$response = $this->jwt->request(ip() . 'permohonan/daftar_akun', 'POST', json_encode($d), $token);
		if (isset($response['status'])) {
			$this->session->unset_userdata('cek');
			return_json($response);
		}

		fail();
	}
}