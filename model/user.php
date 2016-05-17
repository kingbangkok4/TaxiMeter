<?php
header('Content-Type: text/html; charset=utf-8');
class User {

    public $sql;

    public function read($condition = " 1=1") {
        $this->sql = "SELECT * FROM user WHERE $condition";
	mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false;
        }
    }	
    
    public function insert($username, $password) {
        $this->sql = "insert into user(userID, username, password, type) values(NULL, '$username', '$password', 'Member')";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }
    
    public function update($data, $user_ref) {
        $this->sql = "UPDATE user SET username = '{$data["username"]}', password = '{$data["password"]}' WHERE userID = {$user_ref} ";
	mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }	
    
}
