<?php
header('Content-Type: text/html; charset=utf-8');
class Rent {
    public $sql;

    public function read($condition = " 1=1") {
         $this->sql = "SELECT * FROM rent WHERE $condition";
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
        $this->sql = "INSERT INTO rent (`rentID`, `carID`, `driverID`, `rentDate`, `returnDate`, `price`, `shift`) VALUES (NULL, {$data["carID"]}, {$data["driverID"]}, '{$data["dateFrom"]}', '{$data["dateTo"]}', {$data["price"]}, '{$data["shift"]}')";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update_status($rentID) {
        $this->sql = "UPDATE rent SET status = 'คืนรถแล้ว' WHERE rentID = '{$rentID}' ";
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
