<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{

	protected $allowedFields  = [
		'tblizin_id',
		'tblizinpermohonan_id',
		'tblizinpendaftaran_usaha',
		'tblizinpendaftaran_lokasiizin',
		'tblkecamatan_id',
		'tblkelurahan_id',
		'tblizinpendaftaran_keterangan'
	];

	public function __construct()
	{
		parent::__construct();
		login_required();
		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{
		$data = [
			'title' => 'Permohonan',
			'permohonan' => $this->permohonan_by_id_pemohon()
		];
		$this->load->view('permohonan/view', $data);
	}



	public function riwayat()
	{
		$d['tblpemohon_id'] = $this->session->tblpemohon_id;
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/riwayat', 'POST', json_encode($d), $token);

		$r = isset($response['data']) ? $response['data'] : [];

		$data = [
			'riwayat' => $r,
			'title' => 'Riwayat Permohonan',

		];

		$this->load->view('permohonan/riwayat', $data);
	}

	public function edit($id)
	{
		$row = $this->permohonan_by_id($id);
		$r = isset($row['pendaftaran']) ? $row['pendaftaran'] : [];

		$data = [
			'title' => 'Form Permohonan',
			'izin' => $this->get_izin(),
			'kecamatan' => $this->get_kecamatan(),
			'js' => 'permohonan/js',
			'p' => $r
		];

		$this->load->view('permohonan/form_edit', $data);
	}

	public function detail($id)
	{
		$row = $this->permohonan_by_id($id);
		$r = isset($row['pendaftaran']) ? $row['pendaftaran'] : [];
		$log = isset($row['log']) ? $row['log'] : [];


		if (!$r || !$log) {
			fail('Data tidak ditemukan');
		}

		$data = [
			'title' => 'Detail Permohonan',
			'r' => $r,
			'log' => $log
		];

		$this->load->view('permohonan/detail', $data);
	}

	public function get_token()
	{
		$token = $this->jwt->get_token();
		if (!$token) {
			$res = array('status' => false, 'msg' => 'Maaf, terjadi kesalahan');
			echo json_encode($res, true);
			die();
		}
		return $token['token'];
	}



	public function get_izin()
	{
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_izin', 'GET', null, $token);
		return $response['data'];
	}

	public function get_kecamatan()
	{
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_kecamatan', 'GET', null, $token);
		return $response['data'];
	}

	public function get_kelurahan()
	{
		$d['id_kecamatan'] = $this->input->post('id_kecamatan', true);
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'perizinan/get_kelurahan', 'POST', json_encode($d), $token);
		return_json($response);
	}

	public function get_permohonan()
	{
		$token = $this->jwt->get_token();
		$d['tblizin_id'] = $this->input->post('tblizin_id', true);


		$response = $this->jwt->request(ip() . 'perizinan/get_permohonan', 'POST', json_encode($d), $token);
		echo json_encode($response);
	}

	public function informasiUmum($idPendaftaran = null)
	{


		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/informasiUmum/js',
			'izin' => $this->get_izin(),
			'kecamatan' => $this->get_kecamatan(),
			'idPendaftaran' => $idPendaftaran,

		];

		$this->load->view('permohonan/informasiUmum/view', $data);
	}

	public function getPendaftaran()
	{

		$idPendaftaran = $this->input->get('id');
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran,
			'include_logs' => false
		];



		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/permohonan/get_by_id_pendaftaran', 'POST', json_encode($d), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		return_json($response);
	}

	public function actionsInformasiUmum()
	{

		$idPendaftaran  = $this->input->post('tblizinpendaftaran_id');
		$d['tblpengguna_id'] = $this->session->id;
		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_pemohon', 'POST', json_encode($d), $token);

		// Mengambil data dari respons
		$r = isset($response['data']) ? $response['data'] : [];

		// Membuat array PHP berdasarkan data dari API
		$data = [
			'tblpemohon_id' => isset($this->session->tblpemohon_id) ? $this->session->tblpemohon_id : '',
			'tblpengguna_id' => isset($this->session->id) ? $this->session->id : '',
			'tblizinpendaftaran_idpemohon' => isset($r['tblpemohon_noidentitas']) ? $r['tblpemohon_noidentitas'] : '',
			'tblizinpendaftaran_namapemohon' => isset($r['tblpemohon_nama']) ? $r['tblpemohon_nama'] : '',
			'tblizinpendaftaran_almtpemohon' => isset($r['tblpemohon_alamat']) ? $r['tblpemohon_alamat'] : '',
			'tblizinpendaftaran_telponpemohon' => isset($r['tblpemohon_telpon']) ? $r['tblpemohon_telpon'] : '',
			'tblizinpendaftaran_npwp' => isset($r['tblpemohon_npwp']) ? $r['tblpemohon_npwp'] : '',
		];

		// Menggabungkan data dari POST dengan data dari API
		foreach ($this->allowedFields as $field) {
			$data[$field] = $this->input->post($field, true);
		}

		// Menambahkan data tambahan
		// 5 adalah draf
		$data['status_online'] = 5;
		$data['tblizinpendaftaran_id'] = $idPendaftaran;

		$token = $this->jwt->get_token();
		$actionUrl = $idPendaftaran ? 'updateInformasiUmum' : 'insertInformasiUmum';

		$response = $this->jwt->request(ip() . 'permohonan/' . $actionUrl, 'POST', json_encode($data), $token);

		if (isset($response['status'])) {
			return_json($response);
		} else {
			fail('Maaf, terjadi kesalahan');
		}
	}


	public function berkasPersyaratan($idPendaftaran)
	{
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran,
			'include_logs' => false
		];

		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/permohonan/get_by_id_pendaftaran', 'POST', json_encode($d), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$idPermohonan = $response['data']['pendaftaran']['tblizinpermohonan_id'];
		$idPemohon = $response['data']['pendaftaran']['tblpemohon_id'];

		$data = [
			'id_permohonan' => $idPermohonan,
			'id_pemohon' => $idPemohon,
			'id_pendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		if (!isset($response)) {
			fail('Data tidak ditemukan');
		}

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$data = array();
		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/BerkasPersyaratan/js',
			'row' => $response['data'],
			'idPendaftaran' => $idPendaftaran,
			'idPermohonan' =>  $idPermohonan,
			'idPemohon' => $idPemohon
		];

		$this->load->view('permohonan/berkasPersyaratan/view', $data);
	}



	public function uploadPersyaratan()
	{
		// Ambil token JWT
		$token = $this->jwt->get_token();

		// Data yang akan dikirimkan
		$data = [
			'tblpemohon_id' => isset($this->session->tblpemohon_id) ? $this->session->tblpemohon_id : '',
			'tblizinpendaftaran_id' => $this->input->post('idPendaftaran', true),
			'tblpersyaratan_id' => $this->input->post('tblpersyaratan_id', true),
		];

		// Lakukan upload dan ambil hasilnya
		$response = $this->do_upload();
		$filePath = '';
		// Tambahkan nama file ke data jika upload berhasil
		if ($response['status']) {
			$data['file'] = $response['file'];

			// Eksekusi cURL jika upload berhasil
			$curl = curl_init();

			// Pastikan path file benar
			$filePath = 'tmp/fileUpload/' . $data['file'];
			if (!file_exists($filePath)) {
				return_json([
					'status' => false,
					'msg' => 'File tidak ditemukan.'
				]);
				return;
			}

			curl_setopt_array($curl, array(
				CURLOPT_URL => ip() . '/permohonan/uploadPersyaratan',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'tblizinpendaftaran_id' => $data['tblizinpendaftaran_id'],
					'tblpemohon_id' => $data['tblpemohon_id'],
					'tblpersyaratan_id' => $data['tblpersyaratan_id'],
					'file' => new CURLFILE($filePath) // Gantilah dengan path file yang sesuai
				),
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $token['token']
				),
			));

			$curlResponse = curl_exec($curl);
			$curlError = curl_error($curl); // Tangkap error cURL
			curl_close($curl);

			// Proses respons dari cURL jika diperlukan
			if ($curlError) {
				$response = [
					'status' => false,
					'msg' => 'cURL Error: ' . $curlError
				];
			} else {
				// Menguraikan JSON dari respons cURL
				$decodedResponse = json_decode($curlResponse, true);

				if (json_last_error() === JSON_ERROR_NONE) {
					// Respons berhasil di-decode
					$response = $decodedResponse;
				} else {
					// Terjadi kesalahan saat mendecode JSON
					$response = [
						'status' => false,
						'msg' => 'Gagal mendecode respons JSON dari server'
					];
				}
			}
		}

		// Hapus file sementara setelah pemrosesan selesai
		if (file_exists($filePath)) {
			unlink($filePath);
		}

		// Kembalikan respons dalam format JSON
		return_json($response);
	}


	public function afterUploadPersyaratan()
	{

		$token = $this->jwt->get_token();
		$idPendaftaran = $this->input->post('idPendaftaran', true);
		$data = [
			'id_permohonan' => $this->input->post('idPermohonan', true),
			'id_pemohon' => $this->input->post('idPemohon', true),
			'id_pendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		foreach ($response['data'] as $item) {
			if (is_null($item['file'])) {
				$res = [
					'status' => false,
					'msg' => $item['tblpersyaratan_nama'] . ' belum diupload'
				];


				return_json($res);
				break;
			}
		}

		$res = [
			'status' => true,
			'msg' => 'Berkas persyaratan disimpan',
			'id' => $idPendaftaran,
		];

		return_json($res);
	}


	public function resume($idPendaftaran)
	{
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran,
			'include_logs' => false
		];

		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . '/permohonan/get_by_id_pendaftaran', 'POST', json_encode($d), $token);

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$idPermohonan = $response['data']['pendaftaran']['tblizinpermohonan_id'];
		$idPemohon = $response['data']['pendaftaran']['tblpemohon_id'];
		$dataPermohonan =  $response['data']['pendaftaran'];
		$data = [
			'id_permohonan' => $idPermohonan,
			'id_pemohon' => $idPemohon,
			'id_pendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		if (!isset($response)) {
			fail('Data tidak ditemukan');
		}

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$data = array();
		$data = [
			'title' => 'Form Permohonan',
			'js' => 'permohonan/resume/js',
			'r' => $dataPermohonan,
			'idPendaftaran' => $idPendaftaran,
			'idPermohonan' =>  $idPermohonan,
			'idPemohon' => $idPemohon,
			'row' => $response['data'],
		];

		$this->load->view('permohonan/resume/view', $data);
	}

	public function afterResume()
	{

		$token = $this->jwt->get_token();
		$idPendaftaran = $this->input->post('idPendaftaran', true);
		$data = [
			'id_permohonan' => $this->input->post('idPermohonan', true),
			'id_pemohon' => $this->input->post('idPemohon', true),
			'id_pendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		foreach ($response['data'] as $item) {
			if (is_null($item['file'])) {
				$res = [
					'status' => false,
					'msg' => $item['tblpersyaratan_nama'] . ' belum diupload'
				];


				return_json($res);
				break;
			}
		}


		$data = array();
		$data = [
			'idPendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/pengajuan', 'POST', json_encode($data), $token);

		if (!isset($response['status'])) {
			fail('Terjadi Kesalahan');
		}

		return_json($response);
	}

	public function perbaikan($idPendaftaran)
	{
		$d = [
			'tblizinpendaftaran_id' => $idPendaftaran,
			'include_logs' => false
		];

		// Mengambil token dan data dari API
		$token = $this->jwt->get_token();

		$idPemohon =  $this->session->tblpemohon_id;
		$data = [

			'idPemohon' => $idPemohon,
			'idPendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/get_perbaikanBerkas', 'POST', json_encode($data), $token);

		if (!isset($response)) {
			fail('Data tidak ditemukan');
		}

		if (!$response['status']) {
			fail('Data tidak ditemukan');
		}

		$data = array();
		$data = [
			'title' => 'Perbaikan Persyaratan',
			'js' => 'permohonan/perbaikan/js',
			'catatan' => $response['data']['catatan'],
			'rows' => $response['data']['berkas'],
			'idPendaftaran' => $idPendaftaran,
		];

		$this->load->view('permohonan/perbaikan/view', $data);
	}


	public function afterPerbaikan()
	{

		$token = $this->jwt->get_token();
		$idPendaftaran = $this->input->post('idPendaftaran', true);
		$data = [

			'idPendaftaran' => $idPendaftaran
		];

		$response = $this->jwt->request(ip() . 'permohonan/perbaikanBerkas', 'POST', json_encode($data), $token);


		// if (isset($response['status'])) {
		// 	fail('Terjadi kesalahan');
		// }

		return_json($response);
	}

	public function do_upload()
	{
		// Ambil nama field file upload dari request, misalnya 'file'
		$field = 'file'; // Nama field di FormData

		// Pastikan ada file yang diunggah
		if (isset($_FILES[$field])) {
			$uploadDir = "tmp/fileUpload/"; // Direktori penyimpanan file
			$fileName = $_FILES[$field]['name'];
			$fileTmp = $_FILES[$field]['tmp_name'];
			$fileType = $_FILES[$field]['type']; // Tipe MIME file
			$fileSize = $_FILES[$field]['size']; // Ukuran file dalam byte
			$uploadedFileName = date('YmdHis') . '_' . $fileName;
			$uploadedFile = $uploadDir . $uploadedFileName;

			// Daftar tipe MIME yang diperbolehkan
			$allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/gif'];
			// Daftar ekstensi yang diperbolehkan
			$allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
			// Ukuran maksimum file dalam byte (800 KB)
			$maxFileSize = 800 * 1024;

			// Ambil ekstensi file
			$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
			$fileExt = strtolower($fileExt); // pastikan dalam huruf kecil

			// Validasi tipe MIME dan ekstensi
			if (in_array($fileType, $allowedMimeTypes) && in_array($fileExt, $allowedExtensions)) {
				// Validasi ukuran file
				if ($fileSize <= $maxFileSize) {
					// Periksa apakah file ada dan berhasil diunggah
					if (is_uploaded_file($fileTmp)) {
						// Pindahkan file ke direktori tujuan
						if (move_uploaded_file($fileTmp, $uploadedFile)) {
							// Jika unggahan berhasil, kembalikan nama file
							return ['status' => true, 'msg' => 'Upload berhasil', 'file' => $uploadedFileName];
						} else {
							// Jika gagal memindahkan file
							return ['status' => false, 'msg' => 'Gagal memindahkan file'];
						}
					} else {
						// Jika file tidak ada atau terjadi masalah saat pengunggahan
						return ['status' => false, 'msg' => 'File tidak ada atau gagal diunggah'];
					}
				} else {
					// Jika ukuran file melebihi batas
					return ['status' => false, 'msg' => 'Ukuran file maksimal adalah 800 KB'];
				}
			} else {
				// Jika tipe file atau ekstensi tidak diperbolehkan
				return ['status' => false, 'msg' => 'Tipe atau ekstensi file tidak diperbolehkan'];
			}
		} else {
			// Jika tidak ada file di $_FILES
			return ['status' => false, 'msg' => 'Tidak ada file yang diunggah'];
		}
	}




	public function update_pengajuan()
	{
		$data = [];
		foreach ($this->allowedFields as $field) {
			$data[$field] = $this->input->post($field, true);
		}

		$data['tblizinpendaftaran_id'] = $this->input->post('tblizinpendaftaran_id');
		$data['tblpengguna_id'] = $this->input->post('tblpengguna_id');
		$data['status_online'] = 1;

		$persyaratan = $this->get_persyaratan_by_id_permohonan($data['tblizinpermohonan_id']);
		if (!$persyaratan) {
			die();
		}

		foreach ($persyaratan as $requirement) {
			$file = $this->upload($requirement['tblpersyaratan_id']);
			if ($file) {
				$data[$requirement['tblpersyaratan_id']] = new CURLFILE('tmp/' . $file);
			}
		}

		$token =	$token = $this->jwt->get_token();
		// $response = $this->curl_request(ip() . 'permohonan/pengajuan_update', 'POST', $data, $token);

		if (isset($response['status'])) {
			if ($response['status']) {
				success('Permohonan berhasil diajukan kembali');
			} else {
				return_json($response);
			}
		} else {
			fail('Maaf, terjadi kesalahan');
		}
	}

	public function get_persyaratan()
	{
		$d = [
			'id_permohonan' => $this->input->post('id', true),
			'id_pemohon' => $this->session->tblpemohon_id,
			'id_pendaftaran' => $this->input->post('id_pendaftaran', true)
		];

		$token = $this->jwt->get_token();

		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($d), $token);

		$this->load->view('permohonan/persyaratan', ['row' => $response['data']]);
	}

	private function get_persyaratan_by_id_permohonan($id)
	{
		$data = ['id_permohonan' => $id];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_persyaratan', 'POST', json_encode($data), $token);

		return $response['status'] ? $response['data'] : false;
	}

	private function upload($field)
	{
		$uploadDir = "tmp/"; // Direktori penyimpanan file
		$fileName = $_FILES[$field]['name'];
		$fileTmp = $_FILES[$field]['tmp_name'];
		$uploadedFileName = date('YmdHis') . '_' . $fileName;
		$uploadedFile = $uploadDir . $uploadedFileName;

		// Periksa apakah file ada
		if (is_uploaded_file($fileTmp)) {
			// Jika tidak ada kesalahan, lakukan pengunggahan file
			if (move_uploaded_file($fileTmp, $uploadedFile)) {
				return $uploadedFileName;
			}
		}

		return null;
	}




	public function permohonan_by_id_pemohon()
	{
		$d = ['tblpemohon_id' => $this->session->tblpemohon_id];
		$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pemohon', 'POST', json_encode($d), $token);
		return isset($response['data']) ? $response['data'] : [];
	}

	public function permohonan_by_id($id)
	{
		$data = ['tblizinpendaftaran_id' => $id];
		$token =	$token = $this->jwt->get_token();
		$response = $this->jwt->request(ip() . 'permohonan/get_by_id_pendaftaran', 'POST', json_encode($data), $token);
		return isset($response['data']) ? $response['data'] : [];
	}
}