<?php
header('Content-Type: text/html; charset=utf-8');
class Member {

    public $sql;

    public function read($condition = " 1=1") {
         $this->sql = "SELECT * FROM member WHERE $condition ";
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
    
    public function insert($data) {
        $this->sql = "INSERT INTO member (`memberID`, `name`, `gender`, `address`, `email`, `phone`, `user_ref`) VALUES (NULL, '{$data["name"]}', '{$data["gender"]}', '{$data["address"]}', '{$data["email"]}', '{$data["phone"]}', {$data["user_ref"]}) ";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return  $this->sql;
        }
    }

    public function update($data, $user_ref) {
        $this->sql = "UPDATE member SET name = '{$data["name"]}', gender = '{$data["gender"]}', address = '{$data["address"]}', email='{$data["email"]}', phone = '{$data["phone"]}' WHERE user_ref = {$user_ref} ";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);       
        if ($query){           
            return true;
        } else {
            return false;
        }
    }

    public function delete($user_ref) {
        $this->sql = "DELETE FROM member WHERE user_ref = {$user_ref} ";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);
        if ($query) {
            $this->sql = "DELETE FROM user WHERE userID = {$user_ref} ";
            mysql_query("SET NAMES 'utf8'");
            $query = mysql_query($this->sql);          
            return true;
        } else {
            return false;
        }
    }

}
