<?php if(! defined("BASEPATH"))exit("No direct script access allowed");

class Play extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		//if(!$this->session->userdata("username")){
			//redirect(base_url()."#login");
		//}
		$this->load->model("play_model");
	}
	
	public function index(){
		
		$this->load->view('play');
	}
		
	public function session_destroy(){
		$this->session->sess_destroy();
	}
	
	public function session_check(){
		echo $this->session->userdata('ID');
		echo $this->session->userdata('xpos');
		echo $this->session->userdata('ypos');
		echo $this->session->userdata('face');
	}
	
	public function robot_placer(){
		$ipaddress = $this->session->userdata('ip_address');
		$ID = $this->session->userdata('ID');
		if($ID != NULL)$this->play_model->robot_remover($ID);
		$ID = $this->play_model->robot_placer($ipaddress);
		$this->session->set_userdata('ID', $ID->ID);
	}

	public function move_log(){
		$xpos = $this->input->post("xpos");
		$ypos = $this->input->post("ypos");
		$face = $this->input->post("face");
		$this->play_model->move_log($xpos,$ypos,$face);
	}

	public function report(){	
		$xpos = $this->input->post("xpos");
		$ypos = $this->input->post("ypos");
		$face = $this->input->post("face");
		$this->session->set_userdata('xpos', $xpos);
		$this->session->set_userdata('ypos', $ypos);
		$this->session->set_userdata('face', $face);
	}
	
	public function view_report(){
		$xpos = $this->session->userdata("xpos");
		$ypos = $this->session->userdata("ypos");
		$face = $this->session->userdata("face");
		$report = array("position"=>array($xpos,$ypos),"direction"=>$face);
		$this->output->set_content_type("application/json")->set_output(json_encode($report));
	}
	
	public function print_all_session(){
		$record = $this->play_model->get_all_session();
		$data['session'] = $record;
		$this->load->view('print',$data);
	}
	
}