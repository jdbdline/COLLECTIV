<?php
class My_User
{
    public $id;
    public $first_name;
    public $surname;
    public $email;
    public $username;
    public $password;

    public function __construct($parameters)
    {
        $this->set_details($parameters);
    }

    public function show_info()
    {
        return $this->first_name . " " . $this->surname. " " . $this->email. " " . $this->username. " " . $this->password;
    }

    /*
     * If an ID been set do object population from db otherwise population is done externally
     */
    public function set_details($parameters)
    {
        $CI =& get_instance();
        $CI->load->model("user_model");
        if(isset($parameters['id'])){
            $this->id           =   $parameters['id'];
            $user = $CI->user_model->list_users($parameters['id']);           
            $this->first_name   =   $user[0]['first_name'];
            $this->surname      =   $user[0]['surname'];
            $this->email        =   $user[0]['email'];
            $this->username     =   $user[0]['username'];
            $this->password     =   $user[0]['password'];
        }else{
            $this->first_name   =   $parameters['first_name'];
            $this->surname      =   $parameters['surname'];
            $this->email        =   $parameters['email'];
            $this->username     =   $parameters['username'];
            $this->password     =   $parameters['password'];
        }

    }

    public function get_details()
    {
        $result = array();
        $result['id']           =   $this->id;
        $result['first_name']   =   $this->first_name;
        $result['surname']      =   $this->surname;
        $result['email']        =   $this->email;
        $result['username']     =   $this->username;
        $result['password']     =   $this->password;
        return $result;
    }
}
