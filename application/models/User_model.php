<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* The table 'user' has these fields
  id (a unique value, auto incrementing field)
  first_name
  surname (unique values)
  password
*/

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($user){
       // $this->db->insert('users',$user);
         
         $this->load->library('My_Pdo_connector');
        
         $this->my_pdo_connector->insert($user,'users');




    }

    public function delete_user($id){
        //$this->db->where("id",$id)->delete('users');

         $this->load->library('My_Pdo_connector');
         $this->my_pdo_connector->delete('users','id = '.$id);

    }

    public function update_user($id,$user){
       // $this->db->where('id', $id)->update('users',$user);

          $this->load->library('My_Pdo_connector');

          $this->my_pdo_connector->update($user,'users','id = '.$id);
    }

    /*specify id to retrieve single*/

    public function list_users($id = null){
        $this->load->library('My_Pdo_connector');
        if(empty($id)){

        //    return $this->db->order_by("id", "asc")->get('users')->result_array();
         
          return  $this->my_pdo_connector->select(array('*'),'users', '' );
        }else{
        //    return $this->db->where('id', $id)->get('users')->row_array();
         
          return $this->my_pdo_connector->select(array('*'),'users' , 'id ='.$id);
        }
    }


}