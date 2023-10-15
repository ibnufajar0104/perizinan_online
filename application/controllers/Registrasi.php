<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{
		$this->load->view('registrasi');
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
			$this->session->set_flashdata('error', 'Tolong isi NPWP');
			redirect('registrasi');
		}

		if ($this->input->post('jenis') == 2 && $this->input->post('tblpemohon_noidentitas') == '') {
			$this->session->set_flashdata('error', 'Tolong isi NIK');
			redirect('registrasi');
		}




		$token = $this->jwt->get_token();


		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => ip() . 'pendaftaran/pernah_daftar',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',



			CURLOPT_POSTFIELDS => '{
				"jenis" : "' . $this->input->post('jenis') . '",
			   "tblpemohon_noidentitas" : "' . $this->input->post('tblpemohon_noidentitas') . '",
			   "tblpemohon_npwp" : "' . $this->input->post('tblpemohon_npwp') . '"
		   
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
					'cek' => true,
					'username'  => $response['username']
				);

				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', $response['msg']);
				redirect('registrasi/form');
			} else {
				$newdata = array(
					'cek' => false,
				);

				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('error', $response['msg']);
				redirect('registrasi');
			}
		} else {
			$newdata = array(
				'cek' => false,
			);

			$this->session->set_userdata($newdata);
			$this->session->set_flashdata('error', 'Terjadi kesalahan');
			redirect('registrasi');
		}
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
				$this->session->sess_destroy();
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
