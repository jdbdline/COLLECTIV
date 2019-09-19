<?php

abstract class Database_connector {

  abstract public function open_connection();

  abstract public function close_connection();

  abstract public function select($cols = array('*'),$table,$where,$limit);

  abstract public function update($obj,$table,$where);

  abstract public function delete($table,$where);

  abstract public function insert($objects,$table);
  

}

	