<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	public function index()
	{
		$this->load->view('v_default');
	}

	public function utama()
	{


		$data = array(

			'transportasi' => $this->m_model->data_transportasi(),

		);
		$this->load->view('utama', $data, FALSE);
	}
}
