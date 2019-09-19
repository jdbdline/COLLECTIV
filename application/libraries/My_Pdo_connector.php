<?php

require_once APPPATH.'classes/Database_connector.php';

class My_Pdo_connector extends Database_connector{

	  protected $host;
	  protected $username;
	  protected $password;
	  protected $db;
	  protected $dsn;
	  protected $dbport;
	  protected $conn;

	  public function __construct()
        {
            $this->host = 'localhost';

            $this->username = 'ds';

            $this->password = '12345678';

            $this->db = 'ds';

            $this->connport = 3306;

			$this->dsn = 'mysql:host='.$this->host.';port='.$this->connport.';dbname='.$this->db;

			 $this->open_connection();
			
        }

	  public function open_connection(){
		try{
		 // create a PDO connection with the configuration data
		 $this->conn = new PDO($this->dsn, $this->username, $this->password);
		 
		 // display a message if connected to database successfully
		 if($this->conn){
		 // echo "Connected to the <strong>$this->db</strong> database successfully!";
		        }
		}catch (PDOException $e){
		 // report error message
		 echo $e->getMessage();
		}
	  }

	  public function close_connection(){

	  }

	  public function select($cols = array('*'),$table,$where = '',$limit = 0){
	  	

	  	if ($this->conn->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
	  		$cols_separated = implode(",", $cols);
			
		
			$where_clause  = '';
			if($where != ''){
				$where_clause = ' where '.$where;
			}

			if (!empty($limit)){
				$where_clause .= ' LIMIT '.$limit;
			}




						
		    $stmt = $this->conn->prepare('select '.$cols_separated.'
		    						from '.$table.' '.$where_clause .' order by id asc ',
		        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));

		    $stmt->execute();

		    $ret_val = array();

		    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		    	array_push($ret_val, $result);
		    }

			return($ret_val);

		} else {
		    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
		}
	  }


	  public function insert($objects,$table){
		if ($this->conn->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
			$cols = array();
			$vals = array();
			$cols_str = '';
			$vals_str = '';

			unset($objects['id']);


			foreach ($objects as $key => $value){
				array_push($cols,$key);
				array_push($vals,$value);			
			}

			$cols_str = implode(",", $cols);
			$vals_str = implode("','", $vals);
		    $stmt = $this->conn->prepare('insert into '.$table.' ('.$cols_str.')
		    						values (\''.$vals_str.'\')',
		        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));

		    $stmt->execute();


		} else {
		    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
		}
	  }

	  public function update($obj,$table,$where=''){
		if ($this->conn->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
			$set_list = array();

			//unset id??

			foreach ($obj as $key => $value){
				array_push($set_list,$key."='".$value."'");
			}

			$set_list_str = implode(',', $set_list);


			$where_clause  = '';
			if($where != ''){
				$where_clause = ' where '.$where;
			}

			var_dump('update '.$table.' set '.$set_list_str.'
		    						 '.$where_clause);
		    $stmt = $this->conn->prepare('update '.$table.' set '.$set_list_str.'
		    						 '.$where_clause,
		        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));

		    $stmt->execute();

		} else {
		    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
		}
	  }

	  public function delete($table,$where){
		if ($this->conn->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
			$set_list = array();

		    $stmt = $this->conn->prepare('delete from '.$table.' where '.$where,
		        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));

		    $stmt->execute();

		} else {
		    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
		}
	  }


	}