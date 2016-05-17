<?php
header('Content-Type: text/html; charset=utf-8');
class Car {

    public $sql;

    public function read($condition = " 1=1") {
         $this->sql = "SELECT * FROM car WHERE $condition";
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
        $this->sql = "INSERT INTO car (`carID`, `brand`, `licensePlate`, `status`) VALUES (NULL, '{$data["brand"]}', '{$data["licensePlate"]}', '{$data["status"]}') ";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update($data, $carID) {
        $this->sql = "UPDATE car SET brand = '{$data["brand"]}', licensePlate = '{$data["licensePlate"]}', status = '{$data["status"]}' WHERE carID = {$carID} ";
	mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }	
	
    public function delete($carID) {
        $this->sql = "DELETE FROM car WHERE carID = {$carID} ";
        mysql_query("SET NAMES 'utf8'");
	$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>
