<?php
 class Device_model extends CI_Model
 {

 	/**
	* Function to get the device information
	* @param array $obj
	* @return json array
 	*/
	public function get($obj)
	{
	 $this->load->model('session_model');
	 $status = $this->session_model->validate_credentials($obj['auth_key'],$obj['auth_secret']);
	 if($status)
	 {
	 	$sql = "SELECT device_id, device_label,	last_reported, CASE WHEN last_reported > DATE_SUB(CURDATE(), INTERVAL 1 DAY) THEN 1 WHEN last_reported < DATE_SUB(CURDATE(), INTERVAL 1 DAY) THEN 0  ELSE NULL END AS status FROM devices";
	 	
	 	$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
		{
			$res = $result;
		}
		else
		{
			$res = "No Device found";
		}
	 }
	 else
	 {
		$res['status'] = "Failure";
		$res['msg'] = "Invalid Credentials";
	 }
	 return json_encode($res);
	}
 }
?>
