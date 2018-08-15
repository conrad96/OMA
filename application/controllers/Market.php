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

    public function farmer($id,$uname){
      $data['id']=$id;
      $data['name']=$uname;
      $data['msg']="";
      $data['assets']=$this->assets();
      $this->load->view("farmer.php",$data);
    }
    public function buyer($id,$name){
      $data['id']=$id;
      $data['name']=$name;
      $data['msg']="";
      $data['assets']=$this->assets();
      $this->load->view("buyer.php",$data);
    }
    //Functionality
    public function post_product($id,$name){
      $package=array($this->input->post("title"),$this->input->post("description"),$this->input->post("price"),$id);
      $bool=$this->Tasks->post_product($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Product Posted successfully</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $this->load->view("farmer.php",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Product Not Posted .Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $this->load->view("farmer.php",$data);
      }
    }
    public function complain($id,$name){
      $package=array($this->input->post("title"),$this->input->post("body"),$id);
      $bool=$this->Tasks->post_complain($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Complaint Sent</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['news_feed']=$this->Tasks->news_feed();
        $this->load->view("farmer.php",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Complaint Not sent. Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['news_feed']=$this->Tasks->news_feed();
        $this->load->view("farmer.php",$data);
      }
    }
    public function post_status($id,$name){
      $package=array($id,$this->input->post("post_body"));
      $bool=$this->Tasks->post_status($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Status Posted</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['news_feed']=$this->Tasks->news_feed();
        $this->load->view("farmer.php",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Status Not posted. Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['news_feed']=$this->Tasks->news_feed();
        $this->load->view("farmer.php",$data);
      }
      }
    public function logout(){
      $this->index();
    }
}
?>
