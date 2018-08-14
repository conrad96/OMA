<?php
class Market extends CI_Controller{

  public function assets(){
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['base_url']=$this->config->item("base_url");
		$data['image']=$this->config->item("image");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['css']=$this->config->item("css");
		$data['scripts']=$this->config->item("scripts");
		return $data;
	}
  public function index(){
    $data['assets']=$this->assets();
    $data['msg']="";
    $this->load->view("index",$data);
  }

  public function login(){

		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$check=$this->login_model->login_farmer(array($username,$password));
		if($check){
			foreach($check as $r){
				$this->farmer($r->NINnumber,trim($r->username));
			}
		}else{
			$emp=$this->login_model->login_buyer(array($username,$password));
			if($emp){
				foreach($emp as $r){
					$this->buyer($r->NINnumber,trim($r->username));
				}
			}else{
				$data['msg']="<div class='row alert alert-danger'>
				<span id='msg'>Incorrect password or Username</span>
				</div>";
				$data['assets']=$this->assets();
				$this->load->view("index",$data);
			}
		}
	}//end login

    public function farmer($id,$name){
      $data['id']=$id;
      $data['name']=$name;
      $data['msg']="";
      $data['assets']=$this->assets();
      $this->load->view("farmer.php",$data);
    }
    public function buyer($id,$name){

    }
}
?>
