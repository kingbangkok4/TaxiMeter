<?php
header('Content-Type: text/html; charset=utf-8');
class Member {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO member (`id`, `fullname`, `mobile`, `email`, `address`, `title`, `user_ref`, `province`) VALUES (NULL, '{$data["fullname"]}', '{$data["mobile"]}', '{$data["email"]}', '{$data["address"]}', '{$data["title"]}', '{$data["user_ref"]}', '{$data["province"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_user($username, $password) {
        $this->sql = "insert into user(id, username, password, type) values(NULL, '$username', '$password',  'สมาชิก')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($data, $user_ref) {
        $this->sql = "UPDATE member SET fullname = '{$data["fullname"]}', mobile = '{$data["mobile"]}', email = '{$data["email"]}', address='{$data["address"]}', title = '{$data["title"]}' , province = '{$data["province"]}' WHERE user_ref = {$user_ref}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query){

				$this->sql = "UPDATE user SET username = '{$data["username"]}', password = '{$data["password"]}' WHERE id = {$user_ref} ";
				mysql_query("SET NAMES 'utf8'");
				$query = mysql_query($this->sql);
            
                return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM member WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1") {
         $this->sql = "SELECT e.id, e.fullname, e.mobile, e.email, e.address, e.gender, e.user_ref, u.type FROM member e left outer join user u on e.user_ref = u.id WHERE $condition";
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
	
	

    public function get_user($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM user WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            if (count($result) > 0) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
		
	 public function update_type($id, $type) {
		$this->sql = "UPDATE user SET type = '{$type}' WHERE id = {$id} ";
		mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
		
        if ($query){ 
                return true;
        } else {
            return false;
        }
    }
	
	public function get_new_employee_id($condition = " 1=1 "){
		$this->sql = "SELECT MAX(id) + 1 AS new_employee_id FROM `member` WHERE {$condition} ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
			$new_employee_id = "";
			$new_employee_row = $result[0];
			$new_employee_id = $new_employee_row["new_employee_id"];
            return $new_employee_id;
        } else {
            return "error!";
        }
	}
	
	public function read_employee() {
        $this->sql = " SELECT e.fullname FROM member e LEFT OUTER JOIN user u ON e.user_ref = u.id WHERE u.type NOT IN ('Admin', 'ไม่เป็นสมาชิกแล้ว') ORDER BY e.fullname ";
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

}
