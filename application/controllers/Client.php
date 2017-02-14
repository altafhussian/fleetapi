<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller
{
	public function index()
	{
		error_reporting(E_ALL & ~E_NOTICE);
		$this->load->view('client');
	}

}