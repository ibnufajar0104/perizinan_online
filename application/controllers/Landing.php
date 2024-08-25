<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	protected $url = 'landing';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_jwt', 'jwt');
	}

	public function index()
	{


		$this->load->view($this->url . '/view', []);
	}
}
