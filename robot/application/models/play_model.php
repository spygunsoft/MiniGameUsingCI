<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Play_model extends CI_model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function robot_placer($ipaddress){
		$this->db->query("CALL robot_placer('$ipaddress',@ID)");
		$query = $this->db->query("SELECT @ID AS ID");
		return $query->row();
	}
	
	function robot_remover($ID){
		$this->db->query("CALL robot_remover('$ID')");
	}
	
	function move_log($xpos,$ypos,$face){
		$this->db->query("CALL move_log('$xpos','$ypos','$face')");
	}
	
	function get_all_session(){
		$query = $this->db->query("CALL get_all_session()");
		return $query->result();
	}
	

}