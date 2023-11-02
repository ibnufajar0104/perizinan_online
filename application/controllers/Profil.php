<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    protected $url = 'profil';
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_jwt', 'jwt');
    }

    public function index()
    {
        $d['tblpengguna_id'] = $this->session->id;

        $token = $this->jwt->get_token();
        $response = $this->jwt->request(ip() . 'permohonan/get_pemohon', 'POST', json_encode($d), $token);

        $r = [];
        if (isset($response)) {
            if ($response['data']) {
                $r = $response['data'];
            }
        }


        $data['title'] = 'Profil';
        $data['js'] = $this->url . '/js';
        $data['row'] = $r;
        $this->load->view($this->url . '/view', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function update()
    {
        $arr  = [
            'tblpemohon_id',
            'tblpemohon_nama',
            'tblpemohon_alamat',
            'tblpemohon_noidentitas',
            'tblpemohon_npwp',
            'tblpemohon_telpon',
            'tblpemohon_email',
        ];

        $data = array();
        foreach ($arr as $r) {
            $data[$r] = $this->input->post($r, true);
        }

        $token = $this->jwt->get_token();
        $response = $this->jwt->pos_request(ip() . 'permohonan/update_pemohon', $data, $token);

        if (isset($response['status'])) {

            return_json($response);
        }

        fail('Maaf, terjadi kesalahan');
    }
}
