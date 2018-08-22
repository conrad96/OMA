<?php
class Tasks extends CI_Model{
  public function post_product_farmer($array){
    $data['prod_title']=$array[0];
    $data['prod_price']=$array[2];
    $data['prod_description']=$array[1];
    $data['NINnumber']=$array[3];
    $data['prod_status']="pending";
    $data['prod_photo']=$array[4];
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
  public function post($array){
    $data['NINnumber']=$array[1];
    $data['post_body']=$array[0];
    $data['post_status']="active";
    return ($this->db->insert("posts",$data))? true:false;
  }
  public function wall(){
    $query=$this->db->query("SELECT * FROM posts LEFT JOIN farmers ON posts.NINnumber=farmers.NINnumber ")->result();
    return $query;
  }
  public function feed(){
    $query=$this->db->query("SELECT * FROM product LEFT JOIN farmers ON product.NINnumber=farmers.NINnumber WHERE product.prod_status='pending' ")->result();
    return $query;
  }
  public function count(){
    $query=$this->db->select("*")->from("product")->where("prod_status",'pending')->get()->num_rows();
    return $query;
  }
  public function edit_farmer_pwd($array){
    $query=$this->db->query("UPDATE farmers SET password='$array[0]' WHERE NINnumber='$array[1]' ");
    return ($this->db->affected_rows()>0)? true:false;
  }
  public function sold_products($id){
    return $this->db->select("*")->from("product")->where("prod_status",'sold')->where("NINnumber",$id)->get()->result();
  }
  public function edit_prod_stat($array){
    $query=$this->db->query("UPDATE product SET prod_status='$array[0]'WHERE prod_id='$array[1]' ");
    return ($this->db->affected_rows()>0)? true:false;
  }
  //register buyer
  public function register_buyer($package){
  return ($this->db->insert("buyers",$package))? true:false;
  }
  public function register_farmer($package){
    return ($this->db->insert("farmers",$package))? true:false;
  }
  public function buyers(){
    return $this->db->select("*")->from("buyers")->get()->result();
  }
  public function farmers(){
    return $this->db->select("*")->from("farmers")->get()->result();
  }
  public function addMarket($array){
      return ($this->db->insert("markets",$array))? true:false;
  }
  public function districts(){
    return $this->db->select("*")->from("districts")->get()->result();
  }
  public function markets(){
    return $this->db->select("*")->from("markets")->get()->result();
  }
  public function addProduct($array){
      return ($this->db->insert("category",$array))? true:false;
  }
  public function category(){
    return $this->db->select("*")->from("category")->get()->result();
  }
  public function profile_admin($id){
    return $this->db->select("*")->from("admin")->where("NINnumber",$id)->get()->result();
  }
  public function edit_admin_pwd($array){
    $this->db->query("UPDATE admin SET password='$array[0]' WHERE NINnumber='$array[1]' ");
    return ($this->db->affected_rows()>0)? true:false;
  }
}
?>
