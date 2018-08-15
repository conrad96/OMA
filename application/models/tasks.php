<?php
class Tasks extends CI_Model{
  public function post_product($array){
    $data['prod_title']=$array[0];
    $data['prod_price']=$array[2];
    $data['prod_description']=$array[1];
    $data['NINnumber']=$array[3];
    $data['prod_status']="pending";
    return ($this->db->insert("product",$data))? true:false;
  }
  public function post_complain($array){
    $data['comp_title']=$array[0];
    $data['comp_body']=$array[1];
    $data['NINnumber']=$array[2];
    return ($this->db->insert("complaints",$data))? true:false;
  }
  public function profile_farmer($id){
    return $this->db->select("*")->from("farmers")->where("NINnumber",$id)->get()->result();
  }
  public function news_feed(){
    $query=$this->db->select("*")->from("product")->get()->result();
    return ($query)? $query:array();
  }
  public function post_status($array){
    $data['NINnumber']=$array[0];
    $data['post_body']=$array[1];
    $data['post_status']="broadcast";
    return ($this->db->insert("posts",$data))? true:false;
  }
}
?>
