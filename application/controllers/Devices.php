<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Devices extends CI_Controller
{
  public function Devices()
  {
	parent :: __construct();
	$this->load->model('device_model');
  }

  public function get_devices()
  {
	$auth_key = $this->input->server('HTTP_AUTH_KEY');
	$auth_secret = $this->input->server('HTTP_AUTH_SECRET');

	log_message('info', 'Get Devices');
	$res =  $this->device_model->get(array('auth_key'=>$auth_key,'auth_secret'=>$auth_secret));
	log_message('info', 'OUTPUT :'.$res);
	echo $res;
  }
}
?>
