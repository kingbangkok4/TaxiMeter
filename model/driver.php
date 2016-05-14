<?php
header('Content-Type: text/html; charset=utf-8');
class Driver {

    public $sql;

    public function read($condition = " 1=1") {
         $this->sql = " SELECT * FROM driver WHERE $condition ";
		mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return FALSE;
        }
    }	
    
     public function insert($data) {
        $this->sql = "INSERT INTO driver (`driverID`, `name`, `idCard`, `gender`, `age`, `birthday`, `address`, `email`, `phone`) VALUES (NULL, '{$data["name"]}', '{$data["idCard"]}', '{$data["gender"]}', YEAR(NOW()) - YEAR('{$data["birthday"]}'), '{$data["birthday"]}', '{$data["address"]}', '{$data["email"]}', '{$data["phone"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    public function update($data) {
        $this->sql = "UPDATE driver SET `name` = '{$data["name"]}', `idCard` = '{$data["idCard"]}', `gender` = '{$data["gender"]}', `age` = YEAR(NOW()) - YEAR('{$data["birthday"]}'), `birthday` = '{$data["birthday"]}', `address` = '{$data["address"]}', `email` = '{$data["email"]}', `phone` = '{$data["phone"]}' WHERE driverID = {$data["driverID"]} ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    
     public function delete($condition) {
        $this->sql = "DELETE FROM driver WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
	
    }
      
}   
?>
