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
public function redirect_signup_b(){
  $data['assets']=$this->assets();
  $data['markets']=$this->Tasks->markets();
  $data['districts']=$this->Tasks->districts();
  $data['products']=$this->Tasks->category();
  $data['msg']="";
  $this->load->view("index-signup",$data);
}
public function redirect_signup_f(){
  $data['assets']=$this->assets();
  $data['markets']=$this->Tasks->markets();
  $data['districts']=$this->Tasks->districts();
    $data['products']=$this->Tasks->category();
  $data['msg']="";
  $this->load->view("index-signup-f",$data);
}
/*Register buyer nd  farmer script*/
public function add_buyer(){
if(empty($this->input->post("password") )) {
  $data['assets']=$this->assets();
  $data['msg']="<div class='row alert alert-danger'><center>Please Fill in password..please Try Again</center></div>";
  $this->load->view("index-signup-f",$data);
}else{
  $package=$this->input->post(NULL,true);
  $bool=$this->Tasks->register_farmer($package);
  if($bool){
    $data['assets']=$this->assets();
  $data['msg']="<div class='row alert alert-success'><center>Account Created Successfully. Please follow this link to  <a href='http://localhost/OMA/index.php/Market/index'>Login</a></center></div>";
    $this->load->view("index-signup-f",$data);
  }else{
    $data['assets']=$this->assets();
  $data['msg']="<div class='row alert alert-danger'><center>Account Not Created .an Error occured. please try again</center></div>";
    $this->load->view("index-signup-f",$data);
  }
}

}
public function add_farmer(){
  if(empty($this->input->post("password") )) {
    $data['assets']=$this->assets();
    $data['msg']="<div class='row alert alert-danger'><center>Please Fill in password..please Try Again</center></div>";
    $this->load->view("index-signup",$data);
  }else{
    $package=$this->input->post(NULL,true);
    $bool=$this->Tasks->register_farmer($package);
    if($bool){
      $data['assets']=$this->assets();
    $data['msg']="<div class='row alert alert-success'><center>Account Created Successfully. Please follow this link to  <a href='http://localhost/OMA/index.php/Market/index'>Login</a></center></div>";
      $this->load->view("index-signup",$data);
    }else{
      $data['assets']=$this->assets();
    $data['msg']="<div class='row alert alert-danger'><center>Account Not Created .an Error occured. please try again</center></div>";
      $this->load->view("index-signup",$data);
    }
  }
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
        $admin=$this->login_model->login_admin(array($username,$password));
        if($admin){
          foreach($admin as $r){
            $this->admin($r->NINnumber,trim($r->username));
          }
        }else{
          $data['msg']="<div class='row alert alert-danger'>
  				<span id='msg'>Incorrect password or Username</span>
  				</div>";
  				$data['assets']=$this->assets();
  				$this->load->view("index",$data);
        }
			}
		}
	}//end login

    public function farmer($id,$uname){
      $data['id']=$id;
      $data['name']=$uname;
      $data['msg']="";
      $data['assets']=$this->assets();
      $data['wall']=$this->Tasks->wall();
      $data['feed']=$this->Tasks->feed();
      $data['count']=$this->Tasks->count();
      $data['profile']=$this->Tasks->profile_farmer($id);
      $data['sold_products']=$this->Tasks->sold_products($id);
      $this->load->view("farmer",$data);
    }
    public function admin($id,$name){
      $data['id']=$id;
      $data['name']=$name;
      $data['msg']="";
      $data['assets']=$this->assets();
      $data['buyers']=$this->Tasks->buyers();
      $data['farmers']=$this->Tasks->farmers();
      $data['profile']=$this->Tasks->profile_admin($id);
      $this->load->view("admin",$data);
    }
    public function add_Market($id,$name){
      $package=$this->input->post(NULL,TRUE);
      $bool=$this->Tasks->addMarket($package);
      if($bool){
        $data['id']=$id;
        $data['name']=$name;
          $data['msg']="<div class='row alert alert-success'><center>Market Added</center></div>";
        $data['assets']=$this->assets();
        $data['buyers']=$this->Tasks->buyers();
        $data['farmers']=$this->Tasks->farmers();
        $this->load->view("admin",$data);
      }else{
        $data['id']=$id;
        $data['name']=$name;
        $data['msg']="<div class='row alert alert-danger'><center>Market Not Added</center></div>";
        $data['assets']=$this->assets();
        $data['buyers']=$this->Tasks->buyers();
        $data['farmers']=$this->Tasks->farmers();
        $this->load->view("admin",$data);
      }
    }
    public function add_product($id,$name){
      $package=$this->input->post(NULL,TRUE);
      $bool=$this->Tasks->addProduct($package);
      if($bool){
        $data['id']=$id;
        $data['name']=$name;
          $data['msg']="<div class='row alert alert-success'><center>Product category Added</center></div>";
        $data['assets']=$this->assets();
        $data['buyers']=$this->Tasks->buyers();
        $data['farmers']=$this->Tasks->farmers();
        $this->load->view("admin",$data);
      }else{
        $data['id']=$id;
        $data['name']=$name;
        $data['msg']="<div class='row alert alert-danger'><center>Product category Not Added</center></div>";
        $data['assets']=$this->assets();
        $data['buyers']=$this->Tasks->buyers();
        $data['farmers']=$this->Tasks->farmers();
        $this->load->view("admin",$data);
      }
    }
    public function buyer($id,$name){
      $data['id']=$id;
      $data['name']=$name;
      $data['msg']="";
      $data['assets']=$this->assets();
      $data['wall']=$this->Tasks->wall();
$data['feed']=$this->Tasks->feed();
  $data['count']=$this->Tasks->count();
$data['profile']=$this->Tasks->profile_farmer($id);
$data['sold_products']=$this->Tasks->sold_products($id);
      $this->load->view("buyer",$data);
    }
    //Functionality
    public function post_product($id,$uname){
      $photoname=$_FILES['photo']['name'];
      $photodata=$_FILES['photo']['tmp_name'];
      $storage=$_SERVER['DOCUMENT_ROOT'].'/OMA/assets/photos/';
      move_uploaded_file($photodata,$storage.$photoname);
      $path="http://localhost/OMA/assets/photos/".$photoname;
      $package=array($this->input->post("title"),$this->input->post("description"),$this->input->post("price"),$id,$path);
      $bool=$this->Tasks->post_product_farmer($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Product Posted successfully</center></div>";
        $data['id']=$id;
        $data['name']=$uname;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Product Not Posted .Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$uname;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
          $data['sold_products']=$this->Tasks->sold_products($id);
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
        $this->load->view("farmer",$data);
      }
    }
    public function post_broadcast($id,$name){
      $package=array($this->input->post("post"),$id);
      $bool=$this->Tasks->post($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Message broadcasted success</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Message broadcasted Fail</center></div>";
        $data['id']=$id;
        $data['name']=$uname;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer",$data);
      }
    }
    public function post_complaint($id,$name){
      $package=array($this->input->post("title"),$this->input->post("body"),$id);
      $bool=$this->Tasks->post_complain($package);
      if($bool){
        $data['msg']="<div class='row alert alert-success'><center>Complaint Sent</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer.php",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Complaint Not sent. Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer",$data);
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
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer.php",$data);
      }else{
        $data['msg']="<div class='row alert alert-danger'><center>Status Not posted. Error Occured</center></div>";
        $data['id']=$id;
        $data['name']=$name;
        $data['assets']=$this->assets();
        $data['wall']=$this->Tasks->wall();
        $data['feed']=$this->Tasks->feed();
        $data['count']=$this->Tasks->count();
        $data['profile']=$this->Tasks->profile_farmer($id);
          $data['sold_products']=$this->Tasks->sold_products($id);
        $this->load->view("farmer",$data);
      }
      }
      public function edit_pwd($id,$name){
if($this->input->post("pwd")!=$this->input->post("cpwd")){
  $data['id']=$id;
  $data['name']=$name;
  $data['msg']="<div class='row alert alert-danger'><center>Password Mismatch. please Try Again</center></div>";
  $data['assets']=$this->assets();
  $data['wall']=$this->Tasks->wall();
  $data['feed']=$this->Tasks->feed();
  $data['count']=$this->Tasks->count();
  $data['profile']=$this->Tasks->profile_farmer($id);
    $data['sold_products']=$this->Tasks->sold_products($id);
  $this->load->view("farmer",$data);
}else{
  $package=array($this->input->post("cpwd"),$id);
  $bool=$this->Tasks->edit_farmer_pwd($package);
  if($bool){
    $data['id']=$id;
    $data['name']=$name;
    $data['msg']="<div class='row alert alert-success'><center>Password Changed Successfully</center></div>";
    $data['assets']=$this->assets();
    $data['wall']=$this->Tasks->wall();
    $data['feed']=$this->Tasks->feed();
    $data['count']=$this->Tasks->count();
    $data['profile']=$this->Tasks->profile_farmer($id);
      $data['sold_products']=$this->Tasks->sold_products($id);
    $this->load->view("farmer",$data);
  }else{
    $data['id']=$id;
    $data['name']=$name;
    $data['msg']="<div class='row alert alert-danger'><center>Passsword Not Changed</center></div>";
    $data['assets']=$this->assets();
    $data['wall']=$this->Tasks->wall();
    $data['feed']=$this->Tasks->feed();
    $data['count']=$this->Tasks->count();
    $data['profile']=$this->Tasks->profile_farmer($id);
      $data['sold_products']=$this->Tasks->sold_products($id);
    $this->load->view("farmer",$data);
  }
}

      }
      public function edit_pwd_admin($id,$name){
        if($this->input->post("pwd")!=$this->input->post("cpwd")){
          $data['id']=$id;
          $data['name']=$name;
          $data['msg']="<div class='row alert alert-danger'><center>Password Mismatch. please Try Again</center></div>";
          $data['assets']=$this->assets();
          $data['buyers']=$this->Tasks->buyers();
          $data['farmers']=$this->Tasks->farmers();
          $data['profile']=$this->Tasks->profile_admin($id);
          $this->load->view("admin",$data);
        }else{
          $package=array($this->input->post("cpwd"),$id);
          $bool=$this->Tasks->edit_admin_pwd($package);
          if($bool){
            $data['id']=$id;
            $data['name']=$name;
            $data['msg']="<div class='row alert alert-success'><center>Password Changed Successfully</center></div>";
            $data['assets']=$this->assets();
            $data['buyers']=$this->Tasks->buyers();
            $data['farmers']=$this->Tasks->farmers();
            $data['profile']=$this->Tasks->profile_admin($id);
            $this->load->view("admin",$data);
          }else{
            $data['id']=$id;
            $data['name']=$name;
            $data['msg']="<div class='row alert alert-danger'><center>Passsword Not Changed</center></div>";
            $data['assets']=$this->assets();
            $data['buyers']=$this->Tasks->buyers();
            $data['farmers']=$this->Tasks->farmers();
            $data['profile']=$this->Tasks->profile_admin($id);
            $this->load->view("admin",$data);
          }
      }
    }
      public function edit_product($id,$name){
        $package=array($this->input->post("prod_status"),$this->input->post("prod_id"));
        $bool=$this->Tasks->edit_prod_stat($package);
        if($bool){
          $data['id']=$id;
          $data['name']=$name;
          $data['msg']="<div class='row alert alert-success'><center>Product Status Updated successfully</center></div>";
          $data['assets']=$this->assets();
          $data['wall']=$this->Tasks->wall();
          $data['feed']=$this->Tasks->feed();
          $data['count']=$this->Tasks->count();
          $data['profile']=$this->Tasks->profile_farmer($id);
            $data['sold_products']=$this->Tasks->sold_products($id);
          $this->load->view("farmer",$data);
        }else{
          $data['id']=$id;
          $data['name']=$name;
          $data['msg']="<div class='row alert alert-danger'><center>Product Status Not Updated</center></div>";
          $data['assets']=$this->assets();
          $data['wall']=$this->Tasks->wall();
          $data['feed']=$this->Tasks->feed();
          $data['count']=$this->Tasks->count();
          $data['profile']=$this->Tasks->profile_farmer($id);
            $data['sold_products']=$this->Tasks->sold_products($id);
          $this->load->view("farmer",$data);
        }
      }
    public function logout(){
      $this->index();
    }
}
?>
